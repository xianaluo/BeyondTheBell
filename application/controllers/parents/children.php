<?php
/**
 * Created by PhpStorm.
 * User: win
 * Date: 1/9/15
 * Time: 5:37 PM
 */

require PARSE_SDK_INC;
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

class Children extends CI_Controller{

    public function __construct(){

        parent::__construct();
        //TODO:  Add extra constructor Code
        session_start();
        if(!gf_isLoginParents()) redirect('/');

        $this->load->model('parsewrapper');
        $this->load->model('mcategory');
        $this->load->model('mschool');
        $this->load->model('mactivity');
        $this->load->model('mstudent');
        $this->load->helper('download');
    }

    public function index(){
        //TODO:  called when method name is requested.
        $this->listview();
    }

    public function listview($data = array()){

        $data['list'] = $this->mstudent->getStudentlist(gf_cu_id());

        $this->load->view('parents/children/list_child', $data);
    }

    public function addview($data = array()) {

        $data['activity_list'] = $this->mactivity->getActivityNamelist();
        $data['state_list'] = $this->mcategory->getCategoryList("State");
        $data['grade_list'] = $this->mcategory->getCategoryList("StudentGrade");
        $this->load->view('parents/children/add_child', $data);
    }

    public function editview($data = array()) {

        $student_id = $_REQUEST['sel_id'];

        $data['activity_list'] = $this->mactivity->getActivityNamelist();
        $data['state_list'] = $this->mcategory->getCategoryList("State");
        $data['grade_list'] = $this->mcategory->getCategoryList("StudentGrade");
        $data['selected'] = $this->mstudent->getStudent($student_id);

        $this->load->view('parents/children/add_child', $data);
    }

    public function download() {

        $student_id = $_REQUEST['id'];
        $attach = $_REQUEST['attach'];

        $url = gf_attach_url().'student/'.$student_id.'_'.$attach;

        force_download($attach, $url);
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
        $this->form_validation->set_rules('SignDate', '', 'required');

        if($this->form_validation->run() == FALSE) {

            $this->addview();

        } else {


            $parent_id = gf_cu_id();

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
                STUD_STATUS_NOTAPPROVED
            );


            if($student_id) {




                $data['registered'] = true;
                $this->listview($data);

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
        $this->form_validation->set_rules('SignDate', '', 'required');

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
                STUD_STATUS_NOTAPPROVED
            );


            if($ret) {

                $this->listview();

            } else {

                $data['error'] = 'Failed to register!';
                $this->editview($data);

            }
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