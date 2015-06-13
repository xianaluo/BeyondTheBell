<?php
/**
 * Created by PhpStorm.
 * User: win
 * Date: 1/9/15
 * Time: 5:37 PM
 */

require PARSE_SDK_INC;

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

define('ROWS_PER_PAGE_DEFAULT', 10);

class Discount extends CI_Controller{

    public function __construct(){

        parent::__construct();
        //TODO:  Add extra constructor Code
        session_start();
        if(!gf_isLogin()) redirect('/');

        $this->load->model('parsewrapper');
        $this->load->model('mcategory');
        $this->load->model('muser');
        $this->load->model('mactivity');
        $this->load->model('mdiscount');
        $this->load->library('stripewrapper');
    }

    public function index(){
        //TODO:  called when method name is requested.
        $this->listview();
    }

    public function listview() {

        $data['list'] = $this->mdiscount->getDiscountlist();

        $this->load->view('discount/list_discount', $data);
    }

    public function listview2() {


        $PageNum = ($_REQUEST['PageNum'])?$_REQUEST['PageNum']:1;
        $RowsPerPage = ($_REQUEST['RowsPerPage'])?$_REQUEST['RowsPerPage']:ROWS_PER_PAGE_DEFAULT;

        $search_value = trim($_REQUEST['search_value']);
        $data['search_value'] = $search_value;

        $ret = $this->mdiscount->getDiscountlist2($PageNum, $RowsPerPage, $search_value);
        $data['PageNum'] = $ret['PageNum'];
        $data['Pages'] = $ret['Pages'];
        $data['RowsPerPage'] = $ret['RowsPerPage'];
        $data['list'] = $ret['list'];

        $this->load->view('discount/list_discount', $data);

    }

    public function editview($data = array()) {

        $discount_id = $_REQUEST['sel_id'];

        $data['user_list'] = $this->muser->getUserNamelist();
        $data['activity_list'] = $this->mactivity->getActivityNamelist();
        $data['tier_list'] = $this->mcategory->getCategoryList("DiscountTier");
        $data['selected'] = $this->mdiscount->getDiscount($discount_id);
        $this->load->view('discount/edit_discount', $data);
    }

    public function addview($data = array()) {

        $data['user_list'] = $this->muser->getUserNamelist();
        $data['activity_list'] = $this->mactivity->getActivityNamelist();
        $data['tier_list'] = $this->mcategory->getCategoryList("DiscountTier");
        $this->load->view('discount/add_discount', $data);

    }

    public function insert() {

        if(!gf_cu_rightsDiscountAdd()) redirect('/error');

        $this->form_validation->set_rules('DiscountName', 'Discount Name', 'required');
        $this->form_validation->set_rules('DiscountCode', 'Discount Code', 'required');
        $this->form_validation->set_rules('NoLimit', 'No Limit', 'trim');
        if($_REQUEST['NoLimit']) {
            $this->form_validation->set_rules('DiscountLimit', 'Limit', 'trim');
        } else {
            $this->form_validation->set_rules('DiscountLimit', 'Limit', 'required|integer');
        }
        $this->form_validation->set_rules('DiscountDesc', 'Discount Description', 'trim');
        $this->form_validation->set_rules('AmountPercent', 'AmountPercent', 'required');
        $this->form_validation->set_rules('TakeOff', 'Take', 'required');
        $this->form_validation->set_rules('OffFor', 'Off for', 'required');

        if($_REQUEST['OffFor'] == "ForSpecificUsers")
            $this->form_validation->set_rules('ForSpecificUsers', 'ForSpecificUsers', 'required');
        else
            $this->form_validation->set_rules('ForSpecificUsers', 'ForSpecificUsers', 'trim');

        if($_REQUEST['OffFor'] == "ForSpecificTiers")
            $this->form_validation->set_rules('ForSpecificTiers', 'ForSpecificTiers', 'required');
        else
            $this->form_validation->set_rules('ForSpecificTiers', 'ForSpecificTiers', 'trim');

        if($_REQUEST['OffFor'] == "ForMultipleChild")
            $this->form_validation->set_rules('ForMultipleChild', 'ForMultipleChild', 'required|integer');
        else
            $this->form_validation->set_rules('ForMultipleChild', 'ForMultipleChild', 'trim');

        if($_REQUEST['OffFor'] == "ForSpecificActivities")
            $this->form_validation->set_rules('ForSpecificActivities', 'ForSpecificActivities', 'required');
        else
            $this->form_validation->set_rules('ForSpecificActivities', 'ForSpecificActivities', 'trim');

        $this->form_validation->set_rules('StartDate', 'Discount begins', 'required');
        $this->form_validation->set_rules('NeverExpires', 'Never Expires', 'trim');

        if($_REQUEST['NeverExpires']) {
            $this->form_validation->set_rules('ExpireDate', 'Discount expires', 'trim');
        } else {
            $this->form_validation->set_rules('ExpireDate', 'Discount expires', 'required');
        }


        $this->form_validation->set_rules('Status', 'Status', 'required');



        if($this->form_validation->run() == FALSE) {

            $this->addview();

        } else {

            $name = $_REQUEST["DiscountName"];
            $code = $_REQUEST["DiscountCode"];
            $noLimit = $_REQUEST["NoLimit"];
            $limit = $_REQUEST["DiscountLimit"];
            $desc = $_REQUEST["DiscountDesc"];
            $type = $_REQUEST["AmountPercent"];
            $amount = $_REQUEST["TakeOff"];
            $offFor = $_REQUEST["OffFor"];
            $forSpecificUsers = ($_REQUEST["ForSpecificUsers"])?$_REQUEST["ForSpecificUsers"]:array();
            $forSpecificTiers = ($_REQUEST["ForSpecificTiers"])?$_REQUEST["ForSpecificTiers"]:array();
            $forMultipleChild = ($_REQUEST["ForMultipleChild"])?$_REQUEST["ForMultipleChild"]:0;
            $forSpecificActivities = ($_REQUEST["ForSpecificActivities"])?$_REQUEST["ForSpecificActivities"]:array();
            $startDate = $_REQUEST["StartDate"];
            $neverExpires = $_REQUEST["NeverExpires"];
            $expireDate = $_REQUEST["ExpireDate"];
            $status = $_REQUEST["Status"];


            if($this->mdiscount->findDiscount($code)) {

                $data["error"] = 'Failed to add! The Discount Code exists already!';
                $this->addview($data);

            } else {


                $discount_id = $this->mdiscount->insertDiscount(
                    $name,
                    $code,
                    $noLimit,
                    $limit,
                    $desc,
                    $type,
                    $amount,
                    $offFor,
                    $forSpecificUsers,
                    $forSpecificTiers,
                    $forMultipleChild,
                    $forSpecificActivities,
                    $startDate,
                    $neverExpires,
                    $expireDate,
                    $status
                );

                if ($discount_id) {


                    if($type == "Percent") {
                        $percent_off = intval($amount);
                        $amount_off = null;
                    } else {
                        $percent_off = null;
                        $amount_off = intval(floatval($amount)*100);
                    }


                    if($this->stripewrapper->createCoupon($code, $percent_off, $amount_off, "forever", null)) {

                        $this->listview();

                    } else {

                        $this->mdiscount->deleteDiscount($discount_id);

                        $data["error"] = 'Failed to create coupon in Stripe!';
                        $this->addview($data);

                    }


                } else {

                    $data["error"] = 'Failed to add!';
                    $this->addview($data);
                }
            }

        }

    }

    public function update() {

        if(!gf_cu_rightsDiscountEdit()) redirect('/error');

        $this->form_validation->set_rules('DiscountName', 'Discount Name', 'required');
        $this->form_validation->set_rules('NoLimit', 'No Limit', 'trim');
        if($_REQUEST['NoLimit']) {
            $this->form_validation->set_rules('DiscountLimit', 'Limit', 'trim');
        } else {
            $this->form_validation->set_rules('DiscountLimit', 'Limit', 'required|integer');
        }
        $this->form_validation->set_rules('DiscountDesc', 'Discount Description', 'trim');
        $this->form_validation->set_rules('AmountPercent', 'AmountPercent', 'required');
        $this->form_validation->set_rules('TakeOff', 'Take', 'required');
        $this->form_validation->set_rules('OffFor', 'Off for', 'required');

        if($_REQUEST['OffFor'] == "ForSpecificUsers")
            $this->form_validation->set_rules('ForSpecificUsers', 'ForSpecificUsers', 'required');
        else
            $this->form_validation->set_rules('ForSpecificUsers', 'ForSpecificUsers', 'trim');

        if($_REQUEST['OffFor'] == "ForSpecificTiers")
            $this->form_validation->set_rules('ForSpecificTiers', 'ForSpecificTiers', 'required');
        else
            $this->form_validation->set_rules('ForSpecificTiers', 'ForSpecificTiers', 'trim');

        if($_REQUEST['OffFor'] == "ForMultipleChild")
            $this->form_validation->set_rules('ForMultipleChild', 'ForMultipleChild', 'required|integer');
        else
            $this->form_validation->set_rules('ForMultipleChild', 'ForMultipleChild', 'trim');

        if($_REQUEST['OffFor'] == "ForSpecificActivities")
            $this->form_validation->set_rules('ForSpecificActivities', 'ForSpecificActivities', 'required');
        else
            $this->form_validation->set_rules('ForSpecificActivities', 'ForSpecificActivities', 'trim');

        $this->form_validation->set_rules('StartDate', 'Discount begins', 'required');
        $this->form_validation->set_rules('NeverExpires', 'Never Expires', 'trim');

        if($_REQUEST['NeverExpires']) {
            $this->form_validation->set_rules('ExpireDate', 'Discount expires', 'trim');
        } else {
            $this->form_validation->set_rules('ExpireDate', 'Discount expires', 'required');
        }


        $this->form_validation->set_rules('Status', 'Status', 'required');


        if($this->form_validation->run() == FALSE) {

            $this->editview();

        } else {

            $sel_id = $_REQUEST["sel_id"];

            $name = $_REQUEST["DiscountName"];
            $noLimit = $_REQUEST["NoLimit"];
            $limit = $_REQUEST["DiscountLimit"];
            $desc = $_REQUEST["DiscountDesc"];
            $type = $_REQUEST["AmountPercent"];
            $amount = $_REQUEST["TakeOff"];
            $offFor = $_REQUEST["OffFor"];
            $forSpecificUsers = ($_REQUEST["ForSpecificUsers"])?$_REQUEST["ForSpecificUsers"]:array();
            $forSpecificTiers = ($_REQUEST["ForSpecificTiers"])?$_REQUEST["ForSpecificTiers"]:array();
            $forMultipleChild = ($_REQUEST["ForMultipleChild"])?$_REQUEST["ForMultipleChild"]:0;
            $forSpecificActivities = ($_REQUEST["ForSpecificActivities"])?$_REQUEST["ForSpecificActivities"]:array();
            $startDate = $_REQUEST["StartDate"];
            $neverExpires = $_REQUEST["NeverExpires"];
            $expireDate = $_REQUEST["ExpireDate"];
            $status = $_REQUEST["Status"];

            $ret = $this->mdiscount->updateDiscount(
                $sel_id,
                $name,
                $noLimit,
                $limit,
                $desc,
                $type,
                $amount,
                $offFor,
                $forSpecificUsers,
                $forSpecificTiers,
                $forMultipleChild,
                $forSpecificActivities,
                $startDate,
                $neverExpires,
                $expireDate,
                $status
            );

            if ($ret) {

                $code = $this->mdiscount->getDiscount($sel_id)->code;

                if($this->stripewrapper->deleteCoupon($code)) {

                    if($type == "Percent") {
                        $percent_off = intval($amount);
                        $amount_off = null;
                    } else {
                        $percent_off = null;
                        $amount_off = intval(floatval($amount)*100);
                    }

                    if ($this->stripewrapper->createCoupon($code, $percent_off, $amount_off, "forever", null)) {

                        $this->listview();

                        return;

                    } else {
                        $data["error"] = 'Failed to re-create coupon on Stripe!';
                    }

                } else {
                    $data["error"] = 'Failed to delete coupon for updating!';
                }

            } else {

                $data["error"] = 'Failed to update!';
            }

            $this->editview($data);

        }

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