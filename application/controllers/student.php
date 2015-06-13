<?php
/**
 * Created by PhpStorm.
 * User: win
 * Date: 1/9/15
 * Time: 5:37 PM
 */

require PARSE_SDK_INC;
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

class Student extends CI_Controller{

    public function __construct(){

        parent::__construct();
        //TODO:  Add extra constructor Code
        session_start();
        if(!gf_isLogin()) redirect('/');

        $this->load->model('parsewrapper');
        $this->load->model('muser');
        $this->load->model('mcategory');
        $this->load->model('mschool');
        $this->load->model('mactivity');
        $this->load->model('mbilling');
        $this->load->model('mstudent');
        $this->load->model('mattachment');
        $this->load->model('mdiscount');
        $this->load->helper('download');
        $this->load->library('stripewrapper');
    }

    public function index(){
        //TODO:  called when method name is requested.
        $this->listview();
    }

    public function listview($data = array()){

        $data['list'] = $this->mstudent->getStudentlist();

        $this->load->view('student/list_student', $data);
    }

    public function addview($data = array()) {

        $data['parent_list'] = $this->muser->getParentNamelist();
        $data['status_list'] = $this->mstudent->getStatuslist();
        $data['activity_list'] = $this->mactivity->getActivityNamelist();
        $data['state_list'] = $this->mcategory->getCategoryList("State");
        $data['grade_list'] = $this->mcategory->getCategoryList("StudentGrade");

        $this->load->view('student/add_student', $data);
    }

    public function editview($data = array()) {

        $student_id = $_REQUEST['sel_id'];

        $data['parent_list'] = $this->muser->getParentNamelist();
        $data['status_list'] = $this->mstudent->getStatuslist();
        $data['activity_list'] = $this->mactivity->getActivityNamelist();
        $data['state_list'] = $this->mcategory->getCategoryList("State");
        $data['grade_list'] = $this->mcategory->getCategoryList("StudentGrade");
        $data['selected'] = $this->mstudent->getStudent($student_id);

        $this->load->view('student/add_student', $data);
    }

    public function register() {


        $this->form_validation->set_rules('SchoolYear', 'School Year', 'required');
        $this->form_validation->set_rules('Activity', 'Activity', 'required');
        $this->form_validation->set_rules('FirstName', 'First Name', 'required');
        $this->form_validation->set_rules('MiddleInitial', 'Middle Initial', 'trim');
        $this->form_validation->set_rules('LastName', 'Last Name', 'required');
        $this->form_validation->set_rules('Birthday', 'Birthday', 'required');
        $this->form_validation->set_rules('MF', 'Male / Female', 'required');
        $this->form_validation->set_rules('GradeFall', 'Grade in the Fall', 'required');
        $this->form_validation->set_rules('Address1', 'Address1', 'required');
        $this->form_validation->set_rules('Address2', 'Address2', 'trim');
        $this->form_validation->set_rules('City', 'City', 'required');
        $this->form_validation->set_rules('State', 'State', 'required');
        $this->form_validation->set_rules('ZipCode', 'ZipCode', 'required');
        $this->form_validation->set_rules('PrimaryPhone', 'PrimaryPhone', 'required');

        $this->form_validation->set_rules('MotherGaurdian', 'MotherGaurdian', 'trim');
        $this->form_validation->set_rules('MotherEmployer', 'MotherEmployer', 'trim');
        $this->form_validation->set_rules('MotherWorkPhone', 'MotherWorkPhone', 'trim');
        $this->form_validation->set_rules('MotherAltPhone', 'MotherAltPhone', 'trim');

        $this->form_validation->set_rules('FatherGaurdian', 'FatherGaurdian', 'trim');
        $this->form_validation->set_rules('FatherEmployer', 'FatherEmployer', 'trim');
        $this->form_validation->set_rules('FatherWorkPhone', 'FatherWorkPhone', 'trim');
        $this->form_validation->set_rules('FatherAltPhone', 'FatherAltPhone', 'trim');

        $this->form_validation->set_rules('OtherGaurdian', 'OtherGaurdian', 'trim');
        $this->form_validation->set_rules('OtherEmployer', 'OtherEmployer', 'trim');
        $this->form_validation->set_rules('OtherWorkPhone', 'OtherWorkPhone', 'trim');
        $this->form_validation->set_rules('OtherAltPhone', 'OtherAltPhone', 'trim');

        $this->form_validation->set_rules('Ethnicity[]', 'Ethnicity', 'trim');

        $this->form_validation->set_rules('ConsentPhoto', '', 'trim');

        $this->form_validation->set_rules('ConsentGrade', '', 'trim');

        $this->form_validation->set_rules('ConsentPerson', '', 'trim');

        $this->form_validation->set_rules('EmergenciesDoctor', '', 'trim');
        $this->form_validation->set_rules('DoctorPhone', '', 'trim');
        $this->form_validation->set_rules('EmergenciesHospital', '', 'trim');
        $this->form_validation->set_rules('EmergenciesDentist', '', 'trim');
        $this->form_validation->set_rules('DentistPhone', '', 'trim');
        $this->form_validation->set_rules('Medication', '', 'trim');
        $this->form_validation->set_rules('MedicationYN', '', 'trim');
        $this->form_validation->set_rules('AllergiesNeeds', '', 'trim');
        $this->form_validation->set_rules('EmergenciesContactPerson', '', 'trim');
        $this->form_validation->set_rules('EmergenciesContactNumber', '', 'trim');
        $this->form_validation->set_rules('sig_base64', 'Parent Signature', 'required');
        $this->form_validation->set_rules('SignDate', 'Sign Date', 'required');
        $this->form_validation->set_rules('Parent', 'Parent', 'required');
        $this->form_validation->set_rules('Status', 'Status', 'required');

        if($this->form_validation->run() == FALSE) {

            $this->addview();

        } else {

            $parent_id = $this->input->post('Parent');

            $SchoolYear = $this->input->post('SchoolYear');
            $Activity = $this->input->post('Activity');
            $FirstName = $this->input->post('FirstName');
            $MiddleInitial = $this->input->post('MiddleInitial');
            $LastName = $this->input->post('LastName');
            $Birthday = $this->input->post('Birthday');
            $MF = $this->input->post('MF');
            $GradeFall = $this->input->post('GradeFall');
            $Address1 = $this->input->post('Address1');
            $Address2 = $this->input->post('Address2');
            $City = $this->input->post('City');
            $State = $this->input->post('State');
            $ZipCode = $this->input->post('ZipCode');
            $PrimaryPhone = $this->input->post('PrimaryPhone');

            $MotherGaurdian = $this->input->post('MotherGaurdian');
            $MotherEmployer = $this->input->post('MotherEmployer');
            $MotherWorkPhone = $this->input->post('MotherWorkPhone');
            $MotherAltPhone = $this->input->post('MotherAltPhone');

            $FatherGaurdian = $this->input->post('FatherGaurdian');
            $FatherEmployer = $this->input->post('FatherEmployer');
            $FatherWorkPhone = $this->input->post('FatherWorkPhone');
            $FatherAltPhone = $this->input->post('FatherAltPhone');

            $OtherGaurdian = $this->input->post('OtherGaurdian');
            $OtherEmployer = $this->input->post('OtherEmployer');
            $OtherWorkPhone = $this->input->post('OtherWorkPhone');
            $OtherAltPhone = $this->input->post('OtherAltPhone');

            $Ethnicity = $this->input->post('Ethnicity');
            if(!$Ethnicity) $Ethnicity = array();

            $ConsentPhoto = $this->input->post('ConsentPhoto');

            $ConsentGrade = $this->input->post('ConsentGrade');

            $ConsentPerson = $this->input->post('ConsentPerson');

            $EmergenciesDoctor = $this->input->post('EmergenciesDoctor');
            $DoctorPhone = $this->input->post('DoctorPhone');
            $EmergenciesHospital = $this->input->post('EmergenciesHospital');
            $EmergenciesDentist = $this->input->post('EmergenciesDentist');
            $DentistPhone = $this->input->post('DentistPhone');
            $Medication = $this->input->post('Medication');
            $MedicationYN = $this->input->post('MedicationYN');
            $AllergiesNeeds = $this->input->post('AllergiesNeeds');
            $EmergenciesContactPerson = $this->input->post('EmergenciesContactPerson');
            $EmergenciesContactNumber = $this->input->post('EmergenciesContactNumber');
            $sig_base64 = $this->input->post('sig_base64');
            $SignDate = $this->input->post('SignDate');
            $Status = $this->input->post('Status');


            $student_id = $this->mstudent->insertStudent(
                $parent_id,
                $SchoolYear,
                $Activity,
                $FirstName,
                $MiddleInitial,
                $LastName,
                $Birthday,
                $MF,
                $GradeFall,
                $Address1,
                $Address2,
                $City,
                $State,
                $ZipCode,
                $PrimaryPhone,
                $MotherGaurdian,
                $MotherEmployer,
                $MotherWorkPhone,
                $MotherAltPhone,
                $FatherGaurdian,
                $FatherEmployer,
                $FatherWorkPhone,
                $FatherAltPhone,
                $OtherGaurdian,
                $OtherEmployer,
                $OtherWorkPhone,
                $OtherAltPhone,
                $Ethnicity,
                $ConsentPhoto,
                $ConsentGrade,
                $ConsentPerson,
                $EmergenciesDoctor,
                $DoctorPhone,
                $EmergenciesHospital,
                $EmergenciesDentist,
                $DentistPhone,
                $Medication,
                $MedicationYN,
                $AllergiesNeeds,
                $EmergenciesContactPerson,
                $EmergenciesContactNumber,
                $sig_base64,
                $SignDate,
                $Status
            );


            if($student_id) {

                $this->listview();

            } else {

                $data['error'] = 'Failed to register!';
                $this->addview($data);

            }
        }

    }

    public function update() {

        $this->form_validation->set_rules('SchoolYear', 'School Year', 'required');
        $this->form_validation->set_rules('Activity', 'Activity', 'required');
        $this->form_validation->set_rules('FirstName', 'First Name', 'required');
        $this->form_validation->set_rules('MiddleInitial', 'Middle Initial', 'trim');
        $this->form_validation->set_rules('LastName', 'Last Name', 'required');
        $this->form_validation->set_rules('Birthday', 'Birthday', 'required');
        $this->form_validation->set_rules('MF', 'Male / Female', 'required');
        $this->form_validation->set_rules('GradeFall', 'Grade in the Fall', 'required');
        $this->form_validation->set_rules('Address1', 'Address1', 'required');
        $this->form_validation->set_rules('Address2', 'Address2', 'trim');
        $this->form_validation->set_rules('City', 'City', 'required');
        $this->form_validation->set_rules('State', 'State', 'required');
        $this->form_validation->set_rules('ZipCode', 'ZipCode', 'required');
        $this->form_validation->set_rules('PrimaryPhone', 'PrimaryPhone', 'required');

        $this->form_validation->set_rules('MotherGaurdian', 'MotherGaurdian', 'trim');
        $this->form_validation->set_rules('MotherEmployer', 'MotherEmployer', 'trim');
        $this->form_validation->set_rules('MotherWorkPhone', 'MotherWorkPhone', 'trim');
        $this->form_validation->set_rules('MotherAltPhone', 'MotherAltPhone', 'trim');

        $this->form_validation->set_rules('FatherGaurdian', 'FatherGaurdian', 'trim');
        $this->form_validation->set_rules('FatherEmployer', 'FatherEmployer', 'trim');
        $this->form_validation->set_rules('FatherWorkPhone', 'FatherWorkPhone', 'trim');
        $this->form_validation->set_rules('FatherAltPhone', 'FatherAltPhone', 'trim');

        $this->form_validation->set_rules('OtherGaurdian', 'OtherGaurdian', 'trim');
        $this->form_validation->set_rules('OtherEmployer', 'OtherEmployer', 'trim');
        $this->form_validation->set_rules('OtherWorkPhone', 'OtherWorkPhone', 'trim');
        $this->form_validation->set_rules('OtherAltPhone', 'OtherAltPhone', 'trim');

        $this->form_validation->set_rules('Ethnicity[]', 'Ethnicity', 'trim');

        $this->form_validation->set_rules('ConsentPhoto', '', 'trim');

        $this->form_validation->set_rules('ConsentGrade', '', 'trim');

        $this->form_validation->set_rules('ConsentPerson', '', 'trim');

        $this->form_validation->set_rules('EmergenciesDoctor', '', 'trim');
        $this->form_validation->set_rules('DoctorPhone', '', 'trim');
        $this->form_validation->set_rules('EmergenciesHospital', '', 'trim');
        $this->form_validation->set_rules('EmergenciesDentist', '', 'trim');
        $this->form_validation->set_rules('DentistPhone', '', 'trim');
        $this->form_validation->set_rules('Medication', '', 'trim');
        $this->form_validation->set_rules('MedicationYN', '', 'trim');
        $this->form_validation->set_rules('AllergiesNeeds', '', 'trim');
        $this->form_validation->set_rules('EmergenciesContactPerson', '', 'trim');
        $this->form_validation->set_rules('EmergenciesContactNumber', '', 'trim');
        $this->form_validation->set_rules('SignDate', 'Sign Date', 'required');
        $this->form_validation->set_rules('Status', 'Status', 'required');

        if($this->form_validation->run() == FALSE) {

            $this->editview();

        } else {


            $student_id = $this->input->post('sel_id');

            $SchoolYear = $this->input->post('SchoolYear');
            $Activity = $this->input->post('Activity');
            $FirstName = $this->input->post('FirstName');
            $MiddleInitial = $this->input->post('MiddleInitial');
            $LastName = $this->input->post('LastName');
            $Birthday = $this->input->post('Birthday');
            $MF = $this->input->post('MF');
            $GradeFall = $this->input->post('GradeFall');
            $Address1 = $this->input->post('Address1');
            $Address2 = $this->input->post('Address2');
            $City = $this->input->post('City');
            $State = $this->input->post('State');
            $ZipCode = $this->input->post('ZipCode');
            $PrimaryPhone = $this->input->post('PrimaryPhone');

            $MotherGaurdian = $this->input->post('MotherGaurdian');
            $MotherEmployer = $this->input->post('MotherEmployer');
            $MotherWorkPhone = $this->input->post('MotherWorkPhone');
            $MotherAltPhone = $this->input->post('MotherAltPhone');

            $FatherGaurdian = $this->input->post('FatherGaurdian');
            $FatherEmployer = $this->input->post('FatherEmployer');
            $FatherWorkPhone = $this->input->post('FatherWorkPhone');
            $FatherAltPhone = $this->input->post('FatherAltPhone');

            $OtherGaurdian = $this->input->post('OtherGaurdian');
            $OtherEmployer = $this->input->post('OtherEmployer');
            $OtherWorkPhone = $this->input->post('OtherWorkPhone');
            $OtherAltPhone = $this->input->post('OtherAltPhone');

            $Ethnicity = $this->input->post('Ethnicity');
            if(!$Ethnicity) $Ethnicity = array();

            $ConsentPhoto = $this->input->post('ConsentPhoto');

            $ConsentGrade = $this->input->post('ConsentGrade');

            $ConsentPerson = $this->input->post('ConsentPerson');

            $EmergenciesDoctor = $this->input->post('EmergenciesDoctor');
            $DoctorPhone = $this->input->post('DoctorPhone');
            $EmergenciesHospital = $this->input->post('EmergenciesHospital');
            $EmergenciesDentist = $this->input->post('EmergenciesDentist');
            $DentistPhone = $this->input->post('DentistPhone');
            $Medication = $this->input->post('Medication');
            $MedicationYN = $this->input->post('MedicationYN');
            $AllergiesNeeds = $this->input->post('AllergiesNeeds');
            $EmergenciesContactPerson = $this->input->post('EmergenciesContactPerson');
            $EmergenciesContactNumber = $this->input->post('EmergenciesContactNumber');
            $SignDate = $this->input->post('SignDate');
            $Status = $this->input->post('Status');


            $ret = $this->mstudent->updateStudent(
                $student_id,
                $SchoolYear,
                $Activity,
                $FirstName,
                $MiddleInitial,
                $LastName,
                $Birthday,
                $MF,
                $GradeFall,
                $Address1,
                $Address2,
                $City,
                $State,
                $ZipCode,
                $PrimaryPhone,
                $MotherGaurdian,
                $MotherEmployer,
                $MotherWorkPhone,
                $MotherAltPhone,
                $FatherGaurdian,
                $FatherEmployer,
                $FatherWorkPhone,
                $FatherAltPhone,
                $OtherGaurdian,
                $OtherEmployer,
                $OtherWorkPhone,
                $OtherAltPhone,
                $Ethnicity,
                $ConsentPhoto,
                $ConsentGrade,
                $ConsentPerson,
                $EmergenciesDoctor,
                $DoctorPhone,
                $EmergenciesHospital,
                $EmergenciesDentist,
                $DentistPhone,
                $Medication,
                $MedicationYN,
                $AllergiesNeeds,
                $EmergenciesContactPerson,
                $EmergenciesContactNumber,
                $SignDate,
                $Status
            );


            if($ret) {


                $this->listview();

            } else {

                $data['error'] = 'Failed to register!';
                $this->editview($data);

            }
        }
    }



    //-------------------Payment--------------it should be changed when changed parents/billing----------------


    public function checkout($data = array()) {


        $sel_id = $_REQUEST["sel_id"];
        $parent_id = $_REQUEST["parent_id"];

        $data['sel_id'] = $sel_id;
        $data['list'] = $this->mstudent->getStudentlistForCheckout($parent_id, $sel_id);
        $data['registration_fee'] = $this->_getRegistrationFee();
        $data['invoice_code'] = $this->_getNewInvoiceCode($parent_id);
        $data['arr_state'] = $this->mcategory->getCategoryList("State");
        $data['parent'] = $this->muser->getUser($parent_id);
        $data['PUBLISH_API_KEY'] = $this->stripewrapper->getPubicApiKey();

        if(count($data['list']) > 0) {

            $this->load->view('student/billing/checkout', $data);

        } else{

            $data['error'] = 'No items to checkout!';
            $this->listview($data);
        }
    }

    public function invoice($data = array()) {

        $sel_id = $_REQUEST["sel_id"];
        $parent_id = $_REQUEST["parent_id"];

        $data['list'] = $this->mstudent->getStudentlistForInvoice($sel_id);
        $data['invoice'] = $this->mbilling->getInvoice($sel_id);
        $data['parent'] = $this->muser->getUser($parent_id);

        $this->load->view('student/billing/invoice', $data);
    }

    public function pay() {

        $sel_id = $_REQUEST["sel_id"];
        $parent_id = $_REQUEST["parent_id"];

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

    public function completePending() {

        $parent_id = $_REQUEST['parent_id'];
        $invoice_id = $_REQUEST['sel_id'];

        if($this->mbilling->completePending($invoice_id)) {

            $this->invoice();

        } else {

            $data['error'] = 'Failed to complete payment!';
            $this->invoice($data);
        }

    }


    public function updateAddress()
    {

        $parent_id = $this->input->get('parent_id');
        $phoneNumber = $this->input->get('phoneNumber');
        $address1 = $this->input->get('address1');
        $address2 = $this->input->get('address2');
        $city = $this->input->get('city');
        $state = $this->input->get('state');
        $zipCode = $this->input->get('zipCode');

        if($this->muser->updateAddress(
            $parent_id,
            $phoneNumber,
            $address1,
            $address2,
            $city,
            $state,
            $zipCode
        )) {


        }
    }


}