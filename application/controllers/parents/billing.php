<?php
/**
 * Created by PhpStorm.
 * User: win
 * Date: 1/9/15
 * Time: 5:37 PM
 */

require PARSE_SDK_INC;
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

class Billing extends CI_Controller{

    public function __construct(){

        parent::__construct();
        //TODO:  Add extra constructor Code
        session_start();
        if(!gf_isLoginParents()) redirect('/');

        $this->load->model('parsewrapper');
        $this->load->model('muser');
        $this->load->model('mcategory');
        $this->load->model('mschool');
        $this->load->model('mactivity');
        $this->load->model('mstudent');
        $this->load->model('mdiscount');
        $this->load->model('mbilling');
        $this->load->library('stripewrapper');
    }

    public function index(){
        //TODO:  called when method name is requested.
        $this->listview();
    }
    public function listview($data = array()){

        $data['list'] = $this->mstudent->getStudentlistForBilling(gf_cu_id());

        $this->load->view('parents/billing/list_billing', $data);

    }

    public function checkout($data = array()) {


        $sel_id = $_REQUEST["sel_id"];

        $data['sel_id'] = $sel_id;
        $data['list'] = $this->mstudent->getStudentlistForCheckout(gf_cu_id(), $sel_id);
        $data['registration_fee'] = $this->_getRegistrationFee();
        $data['invoice_code'] = $this->_getNewInvoiceCode(gf_cu_id());
        $data['arr_state'] = $this->mcategory->getCategoryList("State");
        $data['PUBLISH_API_KEY'] = $this->stripewrapper->getPubicApiKey();

        if(count($data['list']) > 0) {

            $this->load->view('parents/billing/checkout', $data);

        } else{

            $data['message']['style'] = 'success';
            $data['message']['title'] = 'Checkout';
            $data['message']['text'] = 'No items to checkout!';
            $this->listview($data);
        }
    }

    public function invoice($data = array()) {


        $sel_id = $_REQUEST["sel_id"];

        $data['list'] = $this->mstudent->getStudentlistForInvoice($sel_id);
        $data['invoice'] = $this->mbilling->getInvoice($sel_id);

        $this->load->view('parents/billing/invoice', $data);
    }

    public function pay() {

        $parent_id = gf_cu_id();

        $payWithCash = $_REQUEST["PayWithCash"];

        $items = $_REQUEST["Item"];
        $billingAddress1 = $_REQUEST["BillingAddress1"];
        $billingAddress2 = $_REQUEST["BillingAddress2"];
        $billingCity = $_REQUEST["BillingCity"];
        $billingState = $_REQUEST["BillingState"];
        $billingZipCode = $_REQUEST["BillingZipCode"];
        $billingPhoneNumber = $_REQUEST["BillingPhoneNumber"];
        $address1 = $_REQUEST["Address1"];
        $address2 = $_REQUEST["Address2"];
        $city = $_REQUEST["City"];
        $state = $_REQUEST["State"];
        $zipCode = $_REQUEST["ZipCode"];
        $phoneNumber = $_REQUEST["PhoneNumber"];
        $invoiceCode = $_REQUEST["InvoiceCode"];
        $discountCode = $_REQUEST["DiscountCode"];
        $discountAmount = $_REQUEST["DiscountAmount"];
        $subtotalAmount = $_REQUEST["SubtotalAmount"];
        $totalAmount = $_REQUEST["TotalAmount"];
        $card_id = $_REQUEST["Token"];


        //make invoice
        $invoice_fees = array();
        foreach($items as $item) {
            //item fee
            $fee_param_name = "Item_" . $item;
            $fee_id = $_REQUEST[$fee_param_name];
            $invoice_fee['student_id'] = $item;
            $invoice_fee['fee_id'] = $fee_id;
            $invoice_fee['reg_fee'] = $this->_getRegistrationFee();
            $invoice_fees[] = $invoice_fee;
        }



        $error = "";

        if($payWithCash) {



            $invoice_id = $this->mbilling->createInvoice(
                $payWithCash,
                $invoice_fees,
                $billingAddress1,
                $billingAddress2,
                $billingCity,
                $billingState,
                $billingZipCode,
                $billingPhoneNumber,
                $address1,
                $address2,
                $city,
                $state,
                $zipCode,
                $phoneNumber,
                $invoiceCode,
                $discountCode,
                $discountAmount,
                $subtotalAmount,
                $totalAmount,
                $card_id,
                "Pending"
            );

            if($invoice_id){

                $_REQUEST['sel_id'] = $invoice_id;
                $this->invoice();

            } else {
                $data['error'] = "Failed to pay!";
                $this->checkout($data);
            }



        } else {


            $customer_id = $this->muser->getStripeCustomerID($parent_id);

            if(!$customer_id) {

                $customer_id = $this->stripewrapper->createCustomer($parent_id, gf_cu_email(), gf_cu_fullName());

                if($customer_id) {

                    $this->muser->updateStripeCustomerID($parent_id, $customer_id);

                } else {

                    $error = "Failed to create customer on Stripe!";
                }
            }

            if($customer_id) {

                if($this->stripewrapper->customer_addCard($customer_id, $card_id)) {


                    $ret_discount = true;

                    if($discountCode) {

                        $ret_discount = $this->stripewrapper->customer_addDiscount($customer_id, $discountCode);

                    }

                    if($ret_discount) {

                        $ret_payment = true;

                        foreach($items as $item) {

                            //registration fee
                            $amount = 100 * $this->_getRegistrationFee();
                            $ret_payment = $this->stripewrapper->customer_addPayment($customer_id, $amount, "Registration Fee");
                            if(!$ret_payment) {
                                break;
                            }

                            //item fee

                            $fee_param_name = "Item_".$item;
                            $fee_id = $_REQUEST[$fee_param_name];
                            $fee = $this->mactivity->getActFee($fee_id);


                            if($fee['kind'] == "Weekly") {

                                $plan_id = $fee['id'];
                                $plan_name = $fee['name'];
                                $plan_price = 100 * $fee["price"];

                                if(!$this->stripewrapper->getPlan($plan_id)) {
                                    $ret_payment = $this->stripewrapper->createPlan($plan_id, $plan_name, $plan_price);
                                }

                                if(!$ret_payment) {
                                    break;
                                }

                                $ret_payment = $this->stripewrapper->customer_addSubscription($customer_id, $plan_id);

                                if (!$ret_payment) {
                                    break;
                                }


                            } else {

                                $amount = 100 * $fee["price"];

                                $ret_payment = $this->stripewrapper->customer_addPayment($customer_id, $amount, $item);

                                if (!$ret_payment) {
                                    break;
                                }
                            }

                        }

                        if($ret_payment) {


                            $invoice_id = $this->mbilling->createInvoice(
                                $payWithCash,
                                $invoice_fees,
                                $billingAddress1,
                                $billingAddress2,
                                $billingCity,
                                $billingState,
                                $billingZipCode,
                                $billingPhoneNumber,
                                $address1,
                                $address2,
                                $city,
                                $state,
                                $zipCode,
                                $phoneNumber,
                                $invoiceCode,
                                $discountCode,
                                $discountAmount,
                                $subtotalAmount,
                                $totalAmount,
                                $card_id,
                                "Paid"
                            );

                            $_REQUEST['sel_id'] = $invoice_id;
                            $this->invoice();

                            return;

                        } else {

                            $error = "Failed to add payment on Stripe!";
                        }

                    } else {

                        $error = "Failed to add discount on Stripe!";
                    }

                } else {

                    $error = "Failed to add card on Stripe!";
                }

            }

            $data["error"] = $error;

            $this->checkout($data);
        }

    }

    public function verifyDiscount() {


        $code = $_REQUEST["code"];

        $obj = $this->mdiscount->getDiscountByCode($code);

        if($obj) {
            $ret = array("result"=>true, "type"=>$obj->type, "amount"=>$obj->amount);
        } else {
            $ret = array("result"=>false);
        }

        echo json_encode($ret);
    }

    public function _getRegistrationFee() {
        return 25;
    }

    public function _getNewInvoiceCode($user_id) {
        return "#".strtoupper(substr($user_id,0,3)).'-'.mktime();
    }
/*
    public function gotoAddSchool() {

        $data['list'] = $this->mschool->getSchoollist();
        $data['schooltype_list'] = $this->mcategory->getCategoryList("SchoolType");
        $data['state_list'] = $this->mcategory->getCategoryList("State");
        $data['activity_list'] = $this->mactivity->getActivityNamelist();

        $this->load->view('schools/addschool', $data);
    }

    public function gotoAddSchoolWithError($error) {

        $data['list'] = $this->mschool->getSchoollist();
        $data['schooltype_list'] = $this->mcategory->getCategoryList("SchoolType");
        $data['state_list'] = $this->mcategory->getCategoryList("State");
        $data['activity_list'] = $this->mactivity->getActivityNamelist();
        $data['error'] = $error;

        $this->load->view('schools/addschool', $data);

    }

    public function gotoEditSchool() {

        $school_id = $_REQUEST['school_id'];

        $data['list'] = $this->mschool->getSchoollist();
        $data['schooltype_list'] = $this->mcategory->getCategoryList("SchoolType");
        $data['state_list'] = $this->mcategory->getCategoryList("State");
        $data['activity_list'] = $this->mactivity->getActivityNamelist();
        $data['selected'] = $this->mschool->getSchool($school_id);

        $this->load->view('schools/editschool', $data);
    }

    public function gotoEditSchoolWithError($error) {

        $school_id = $_REQUEST['school_id'];

        $data['list'] = $this->mschool->getSchoollist();
        $data['schooltype_list'] = $this->mcategory->getCategoryList("SchoolType");
        $data['state_list'] = $this->mcategory->getCategoryList("State");
        $data['activity_list'] = $this->mactivity->getActivityNamelist();
        $data['selected'] = $this->mschool->getSchool($school_id);
        $data['error'] = $error;

        $this->load->view('schools/editschool', $data);

    }

    public function addSchool() {


        $this->form_validation->set_rules('SchoolName', 'SchoolName', 'required');
        $this->form_validation->set_rules('SchoolType', 'SchoolType', 'required');
        $this->form_validation->set_rules('ParentSchool', 'ParentSchool', 'required');
        $this->form_validation->set_rules('Principal', 'Principal', 'required');
        $this->form_validation->set_rules('BuildingCoordinator', 'BuildingCoordinator', 'required');
        $this->form_validation->set_rules('SchoolCode', 'SchoolCode', 'required');
        $this->form_validation->set_rules('SchoolEnrollment', 'SchoolEnrollment', 'required');
        $this->form_validation->set_rules('PhoneNumber', 'PhoneNumber', 'required');
        $this->form_validation->set_rules('FaxNumber', 'FaxNumber', 'required');
        $this->form_validation->set_rules('Address1', 'Address1', 'required');
        $this->form_validation->set_rules('Address2', 'Address2', 'trim');
        $this->form_validation->set_rules('City', 'City', 'required');
        $this->form_validation->set_rules('State', 'State', 'required');
        $this->form_validation->set_rules('ZipCode', 'ZipCode', 'required');

        if($this->form_validation->run() == FALSE) {

            $this->gotoAddSchool();

        } else {


            $schoolName = $this->input->post('SchoolName');
            $schoolType = $this->input->post('SchoolType');
            $parentSchool = $this->input->post('ParentSchool');
            $principal = $this->input->post('Principal');
            $buildingCoordinator = $this->input->post('BuildingCoordinator');
            $schoolCode = $this->input->post('SchoolCode');
            $schoolEnrollment = $this->input->post('SchoolEnrollment');
            $phoneNumber = $this->input->post('PhoneNumber');
            $faxNumber = $this->input->post('FaxNumber');
            $address1 = $this->input->post('Address1');
            $address2 = $this->input->post('Address2');
            $city = $this->input->post('City');
            $state = $this->input->post('State');
            $zipCode = $this->input->post('ZipCode');
            $attachingActivities = $this->input->post('AttachingActivities');


            if($this->mschool->findAccount($schoolName)) {

                $this->gotoAddSchoolWithError('The school name already exists!');

            } else {

                $school_id = $this->mschool->insertSchool(
                    $schoolName,
                    $schoolType,
                    $parentSchool,
                    $principal,
                    $buildingCoordinator,
                    $schoolCode,
                    $schoolEnrollment,
                    $phoneNumber,
                    $faxNumber,
                    $address1,
                    $address2,
                    $city,
                    $state,
                    $zipCode,
                    $attachingActivities
                );

                if($school_id) {

                    $this->gotoSchoollist();


                } else {

                    $this->gotoAddSchoolWithError('Failed to add!');
                }

            }

        }

    }

    public function editSchool() {


        $school_id = $_REQUEST['school_id'];

        $this->form_validation->set_rules('SchoolName', 'SchoolName', 'required');
        $this->form_validation->set_rules('SchoolType', 'SchoolType', 'required');
        $this->form_validation->set_rules('ParentSchool', 'ParentSchool', 'required');
        $this->form_validation->set_rules('Principal', 'Principal', 'required');
        $this->form_validation->set_rules('BuildingCoordinator', 'BuildingCoordinator', 'required');
        $this->form_validation->set_rules('SchoolCode', 'SchoolCode', 'required');
        $this->form_validation->set_rules('SchoolEnrollment', 'SchoolEnrollment', 'required');
        $this->form_validation->set_rules('PhoneNumber', 'PhoneNumber', 'required');
        $this->form_validation->set_rules('FaxNumber', 'FaxNumber', 'required');
        $this->form_validation->set_rules('Address1', 'Address1', 'required');
        $this->form_validation->set_rules('Address2', 'Address2', 'trim');
        $this->form_validation->set_rules('City', 'City', 'required');
        $this->form_validation->set_rules('State', 'State', 'required');
        $this->form_validation->set_rules('ZipCode', 'ZipCode', 'required');


        if($this->form_validation->run() == FALSE) {

            $this->gotoEditSchool();

        } else {

            $schoolName = $this->input->post('SchoolName');
            $schoolType = $this->input->post('SchoolType');
            $parentSchool = $this->input->post('ParentSchool');
            $principal = $this->input->post('Principal');
            $buildingCoordinator = $this->input->post('BuildingCoordinator');
            $schoolCode = $this->input->post('SchoolCode');
            $schoolEnrollment = $this->input->post('SchoolEnrollment');
            $phoneNumber = $this->input->post('PhoneNumber');
            $faxNumber = $this->input->post('FaxNumber');
            $address1 = $this->input->post('Address1');
            $address2 = $this->input->post('Address2');
            $city = $this->input->post('City');
            $state = $this->input->post('State');
            $zipCode = $this->input->post('ZipCode');
            $attachingActivities = $this->input->post('AttachingActivities');

            if($this->mschool->checkToChangeName($school_id, $schoolName)) {

                if($this->mschool->editSchool(
                    $school_id,
                    $schoolName,
                    $schoolType,
                    $parentSchool,
                    $principal,
                    $buildingCoordinator,
                    $schoolCode,
                    $schoolEnrollment,
                    $phoneNumber,
                    $faxNumber,
                    $address1,
                    $address2,
                    $city,
                    $state,
                    $zipCode,
                    $attachingActivities
                )) {


                    $this->gotoSchoollist();

                } else {

                    $this->gotoEditSchoolWithError('Failed to edit!');
                }

            } else {

                $this->gotoEditSchoolWithError('Could not change school name, The school name already exists!');

            }

        }

    }
    public function deleteSchool()
    {
        $school_id = $_REQUEST['school_id'];

        $this->mschool->deleteSchool($school_id);

        $this->gotoSchoollist();

    }
*/
}