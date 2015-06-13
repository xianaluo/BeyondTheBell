<?php
/**
 * Created by PhpStorm.
 * User: win
 * Date: 1/9/15
 * Time: 5:37 PM
 */

require PARSE_SDK_INC;
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

class Schools extends CI_Controller{

    public function __construct(){

        parent::__construct();
        //TODO:  Add extra constructor Code
        session_start();
        if(!gf_isLogin()) redirect('/');

        $this->load->model('parsewrapper');
        $this->load->model('mcategory');
        $this->load->model('mschool');
        $this->load->model('mactivity');
    }

    public function index(){
        //TODO:  called when method name is requested.
        $this->gotoSchoollist();
    }
    public function gotoSchoollist(){

        $data['list'] = $this->mschool->getSchoollist();

        $this->load->view('schools/schoollist', $data);

    }

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

        if(!gf_cu_rightsSchoolAdd()) redirect('/error');

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

        if(!gf_cu_rightsEdit()) redirect('/error');

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

        if(!gf_cu_rightsSchoolDelete()) redirect('/error');

        $school_id = $_REQUEST['school_id'];

        $this->mschool->deleteSchool($school_id);

        $this->gotoSchoollist();

    }
}