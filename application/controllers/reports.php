<?php
/**
 * Created by PhpStorm.
 * User: win
 * Date: 1/9/15
 * Time: 5:37 PM
 */

require PARSE_SDK_INC;

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

class Reports extends CI_Controller{

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
        $this->load->model('mstudent');
        $this->load->model('mattendance');
        $this->load->library('pdfwrapper');
    }

    public function index(){
        //TODO:  called when method name is requested.
        $this->reports();
    }

    public function reports(){


        $this->load->view('reports/reports');
    }

    public function attendance($data = array()){

        $data['StartDate'] = $_REQUEST['StartDate'];
        $data['EndDate'] = $_REQUEST['EndDate'];
        $data['School'] = $_REQUEST['School'];
        $data['Activity'] = $_REQUEST['Activity'];
        $data['Student'] = $_REQUEST['Student'];

        $data['school_list'] = $this->mschool->getSchoolNamelist();
        $data['activity_list'] = $this->mactivity->getActivityNamelist();
        $data['student_list'] = $this->mstudent->getStudentNamelist();

        $this->load->view('reports/report_attendance', $data);
    }

    public function filterAttend() {


        $startDate = $_REQUEST['StartDate'];
        $endDate = $_REQUEST['EndDate'];
        $school = $_REQUEST['School'];
        $activity = $_REQUEST['Activity'];
        $student = $_REQUEST['Student'];

        $data['list'] = $this->mattendance->filterAttend($startDate, $endDate, $school, $activity, $student);

        $this->attendance($data);
    }

    public function downloadpdf() {

        $startDate = $_REQUEST['StartDate'];
        $endDate = $_REQUEST['EndDate'];
        $school = $_REQUEST['School'];
        $activity = $_REQUEST['Activity'];
        $student = $_REQUEST['Student'];

        $data['startDate'] = $startDate;
        $data['endDate'] = $endDate;
        $data['list'] = $this->mattendance->filterAttend($startDate, $endDate, $school, $activity, $student);

        $this->pdfwrapper->reportAttend($data);

    }

    public function downloadcsv() {

        $startDate = $_REQUEST['StartDate'];
        $endDate = $_REQUEST['EndDate'];
        $school = $_REQUEST['School'];
        $activity = $_REQUEST['Activity'];
        $student = $_REQUEST['Student'];

        $data['startDate'] = $startDate;
        $data['endDate'] = $endDate;
        $data['list'] = $this->mattendance->filterAttend($startDate, $endDate, $school, $activity, $student);

        // output headers so that the file is downloaded rather than displayed
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=AttendanceReport.csv');

// create a file pointer connected to the output stream
        $output = fopen('php://output', 'w');

// output the column headings
        fputcsv($output, array('Student Name', 'School', 'Activity', 'Date', 'Attendance'));

// loop over the rows, outputting them
        for($i=0;$i<count($data['list']);$i++) {

            $item = $data['list'][$i];
            $attendDate = date_format($item['attendDate'], "m/d/Y");
            if($item['attendance']) $attendance = "Y";
            else $attendance = "N";
            $row = array($item["student"], $item["school"],$item["activity"], $attendDate, $attendance);

            fputcsv($output, $row);
        }

        fclose($output);
    }

    public function income(){

        $this->load->view('reports/report_income');
    }



/*
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
*/
}