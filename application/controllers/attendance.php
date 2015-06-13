<?php
/**
 * Created by PhpStorm.
 * User: win
 * Date: 1/9/15
 * Time: 5:37 PM
 */

require PARSE_SDK_INC;
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

class Attendance extends CI_Controller{

    public function __construct(){

        parent::__construct();
        //TODO:  Add extra constructor Code
        session_start();
        if(!gf_isLogin()) redirect('/');

        $this->load->model('parsewrapper');
        $this->load->model('mcategory');
        $this->load->model('mactivity');
        $this->load->model('mschool');
        $this->load->model('mstudent');
        $this->load->model('mattendance');
    }

    public function index(){
        //TODO:  called when method name is requested.
        $this->listview();
    }
    public function listview(){

        $data['list'] = $this->mactivity->getActivitylistForAttendance();

        $this->load->view('attendance/list_attendance', $data);

    }

    public function recordview($data = array()) {

        $activity_id = $_REQUEST['activity_id'];

        $data['activity_id'] = $activity_id;
        $data['attendDate'] = date("m/d/Y");
        $data['activityName'] = $this->mactivity->getActivityName($activity_id);
        $data['list'] = $this->mstudent->getStudentlistForAttendance($activity_id, $data['attendDate']);

        $this->load->view('attendance/list_record', $data);

    }

    public function record() {

        $activity_id = $this->input->post('activity_id');
        $attendDate = $this->input->post('attendDate');
        $attendance = $this->input->post('Attendance');

        if($this->mattendance->checkAttendanceForActivity(
            $attendDate,
            $activity_id,
            $attendance))
        {

            $this->recordview();

        } else {

            $data['error'] = 'Failed to save!';
            $this->recordview($data);
        }



    }

    public function checkAttendance() {

        $attendDate = $_REQUEST['attendDate'];
        $activity_id = $_REQUEST['activity_id'];
        $student_id = $_REQUEST['student_id'];
        $attendance = $_REQUEST['attendance'];

        $result = $this->mattendance->checkAttendanceForStudent(
            $attendDate,
            $activity_id,
            $student_id,
            $attendance);

        $ret = json_encode(array($result));

        echo $ret;

    }
/*
    public function addview($error = '') {


        $data['act_room_list'] = $this->mcategory->getCategoryList("ActRoom");
        $data['act_goal_list'] = $this->mcategory->getCategoryList("ActGoal");
        $data['act_coreServiceArea_list'] = $this->mcategory->getCategoryList("ActCoreServiceArea");
        $data['act_academicSubject_list'] = $this->mcategory->getCategoryList("ActAcademicSubject");
        $data['act_aprCategoryType_list'] = $this->mcategory->getCategoryList("ActAprCategoryType");
        $data['act_focus_list'] = $this->mcategory->getCategoryList("ActFocus");
        $data['act_fee_list'] = $this->mcategory->getCategoryList("ActFeeTempl");
        $data['act_fundingSources_list'] = $this->mschool->getSchoolNamelist();
        if($error) $data['error'] = $error;

        $this->load->view('activity/addactivity', $data);
    }

    public function editview($error = '') {

        $activity_id = $_REQUEST['activity_id'];

        $data['act_room_list'] = $this->mcategory->getCategoryList("ActRoom");
        $data['act_goal_list'] = $this->mcategory->getCategoryList("ActGoal");
        $data['act_coreServiceArea_list'] = $this->mcategory->getCategoryList("ActCoreServiceArea");
        $data['act_academicSubject_list'] = $this->mcategory->getCategoryList("ActAcademicSubject");
        $data['act_aprCategoryType_list'] = $this->mcategory->getCategoryList("ActAprCategoryType");
        $data['act_focus_list'] = $this->mcategory->getCategoryList("ActFocus");
        $data['act_fee_list'] = $this->mcategory->getCategoryList("ActFeeTempl");
        $data['act_fundingSources_list'] = $this->mschool->getSchoolNamelist();

        $data['selected'] = $this->mactivity->getActivity($activity_id);
        $data['error'] = $error;

        $this->load->view('activity/editactivity', $data);
    }

    public function addActivity() {

        if(!gf_cu_rightsAdd()) redirect('/error');

        $this->form_validation->set_rules('SessionName', 'Session Name', 'trim|required');
        $this->form_validation->set_rules('DaysOfferedDesc', 'Days Offered Description', 'trim|required');
        $this->form_validation->set_rules('TimeBased', 'Time-based', 'required');
        $this->form_validation->set_rules('AlignedWithDay', 'Aligned With Day School Curriculum', 'required');
        $this->form_validation->set_rules('MaxEnrollment', 'Maximum Enrollment', 'trim|required');
        $this->form_validation->set_rules('RoomID', 'Room', 'required');
        $this->form_validation->set_rules('GoalID', 'Goal', 'required');
        $this->form_validation->set_rules('CoreServiceAreaID', 'Core Service Area', 'required');
        $this->form_validation->set_rules('AcademicSubjectID', 'Academic Subject', 'required');
        $this->form_validation->set_rules('AprCategoryTypeID', 'APR Category Type', 'required');
        $this->form_validation->set_rules('FocusID', 'Focus', 'required');
        $this->form_validation->set_rules('StartDate', 'Start Date', 'trim|trim');
        $this->form_validation->set_rules('StartTime', 'Start Date', 'trim|trim');
        $this->form_validation->set_rules('EndDate', 'End Date', 'trim|required');
        $this->form_validation->set_rules('EndTime', 'End Date', 'trim|required');
        $this->form_validation->set_rules('Repeats', 'Repeats', 'trim');
        $this->form_validation->set_rules('AverageHoursSessionDay', 'Average hours/session/day', 'trim|required');
        $this->form_validation->set_rules('Shareable', 'Shareable', 'required');
        $this->form_validation->set_rules('FundingSourcesIDs', 'Funding Sources', 'required');
        $this->form_validation->set_rules('FeeName[]', 'Fee Name', 'trim|required');
        $this->form_validation->set_rules('FeePrice[]', 'Price', 'required|numeric');
        $this->form_validation->set_rules('FeeKind[]', 'Weekly/Once', 'trim');
        $this->form_validation->set_rules('FeeWeeks[]', 'Weeks', 'trim');

        if($this->form_validation->run() == FALSE) {

            $this->gotoAddActivity();

        } else {

            $sessionName = $this->input->post('SessionName');
            $daysOfferedDesc = $this->input->post('DaysOfferedDesc');
            $timeBased = $this->input->post('TimeBased');
            $alignedWithDay = $this->input->post('AlignedWithDay');
            $maxEnrollment = $this->input->post('MaxEnrollment');
            $roomID = $this->input->post('RoomID');
            $goalID = $this->input->post('GoalID');
            $coreServiceAreaID = $this->input->post('CoreServiceAreaID');
            $academicSubjectID = $this->input->post('AcademicSubjectID');
            $aprCategoryTypeID = $this->input->post('AprCategoryTypeID');
            $focusID = $this->input->post('FocusID');
            $startDate = $this->input->post('StartDate');
            $startTime = $this->input->post('StartTime');
            $endDate = $this->input->post('EndDate');
            $endTime = $this->input->post('EndTime');
            $repeats = $this->input->post('Repeats');
            $averageHoursSessionDay = $this->input->post('AverageHoursSessionDay');
            $shareable = $this->input->post('Shareable');
            $fundingSourcesIDs = $this->input->post('FundingSourcesIDs');
            $feeName = $this->input->post('FeeName');
            $feePrice = $this->input->post('FeePrice');
            $feeWeeks = $this->input->post('FeeWeeks');
            $feeKindCheckNum = $this->input->post('FeeKind');

            for($i=0;$i<count($feeName);$i++) {
                if(in_array($i, $feeKindCheckNum))
                    $feeKind[$i] = "Weekly";
                else
                    $feeKind[$i] = "Once";
            }

            if($repeats) {
                $repeats_by = $this->input->post('RepeatsModal_Repeats');
                $repeats_every = $this->input->post('RepeatsModal_RepeatEvery');
                $repeats_startsOn = $this->input->post('RepeatsModal_StartsOn');
                $repeats_ends = $this->input->post('RepeatsModal_Ends');
                $repeats_endsAfter = $this->input->post('RepeatsModal_EndsAfter_Occ');
                $repeats_endsOn = $this->input->post('RepeatsModal_EndsOn_Date');
                $repeats_weekOn =
                    $this->input->post('RepeatsModal_WeekOn1').'|'.
                    $this->input->post('RepeatsModal_WeekOn2').'|'.
                    $this->input->post('RepeatsModal_WeekOn3').'|'.
                    $this->input->post('RepeatsModal_WeekOn4').'|'.
                    $this->input->post('RepeatsModal_WeekOn5').'|'.
                    $this->input->post('RepeatsModal_WeekOn6').'|'.
                    $this->input->post('RepeatsModal_WeekOn7');
            } else {
                $repeats_by = "";
                $repeats_every = "";
                $repeats_startsOn = "";
                $repeats_ends = "";
                $repeats_endsAfter = "";
                $repeats_endsOn = "";
                $repeats_weekOn = "";
            }

            //if($this->mschool->findAccount($schoolName)) {

            //    $this->gotoAddSchoolWithError('The school name already exists!');

            //} else {

                $activity_id = $this->mactivity->insertActivity(
                    $sessionName,
                    $daysOfferedDesc,
                    $timeBased,
                    $alignedWithDay,
                    $maxEnrollment,
                    $roomID,
                    $goalID,
                    $coreServiceAreaID,
                    $academicSubjectID,
                    $aprCategoryTypeID,
                    $focusID,
                    $startDate,
                    $startTime,
                    $endDate,
                    $endTime,
                    $repeats,
                    $averageHoursSessionDay,
                    $shareable,
                    $fundingSourcesIDs,
                    $repeats_by,
                    $repeats_every,
                    $repeats_startsOn,
                    $repeats_ends,
                    $repeats_endsAfter,
                    $repeats_endsOn,
                    $repeats_weekOn,
                    $feeName,
                    $feePrice,
                    $feeKind,
                    $feeWeeks
                );

                if($activity_id) {


                    $activity = $this->mactivity->getActivity($activity_id);


                    //Create Plan on Stripe for Weekly Fee.

                    //_createStripePlans($activity->fee, $activity->activity_id);


                    $this->gotoActivitylist();


                } else {

                    $this->gotoAddActivity('Failed to add!');//$this->gotoAddActivityWithError('Failed to add!');
                }

            //}

        }

    }

    public function _createStripePlans($fee_list, $activity_id) {

        foreach($fee_list as $fee) {

            if($fee['kind'] == "Weekly") {

                $this->stripewrapper->createPlan($fee['id'], $fee['name'], 100*$fee['price'], $activity_id);

            }
        }

    }

    public function editActivity() {

        if(!gf_cu_rightsEdit()) redirect('/error');

        $activity_id = $_REQUEST['activity_id'];

        $this->form_validation->set_rules('SessionName', 'Session Name', 'trim|required');
        $this->form_validation->set_rules('DaysOfferedDesc', 'Days Offered Description', 'trim|required');
        $this->form_validation->set_rules('TimeBased', 'Time-based', 'required');
        $this->form_validation->set_rules('AlignedWithDay', 'Aligned With Day School Curriculum', 'required');
        $this->form_validation->set_rules('MaxEnrollment', 'Maximum Enrollment', 'trim|required');
        $this->form_validation->set_rules('RoomID', 'Room', 'required');
        $this->form_validation->set_rules('GoalID', 'Goal', 'required');
        $this->form_validation->set_rules('CoreServiceAreaID', 'Core Service Area', 'required');
        $this->form_validation->set_rules('AcademicSubjectID', 'Academic Subject', 'required');
        $this->form_validation->set_rules('AprCategoryTypeID', 'APR Category Type', 'required');
        $this->form_validation->set_rules('FocusID', 'Focus', 'required');
        $this->form_validation->set_rules('StartDate', 'Start Date', 'trim|trim');
        $this->form_validation->set_rules('StartTime', 'Start Date', 'trim|trim');
        $this->form_validation->set_rules('EndDate', 'End Date', 'trim|required');
        $this->form_validation->set_rules('EndTime', 'End Date', 'trim|required');
        $this->form_validation->set_rules('Repeats', 'Repeats', 'trim');
        $this->form_validation->set_rules('AverageHoursSessionDay', 'Average hours/session/day', 'trim|required');
        $this->form_validation->set_rules('Shareable', 'Shareable', 'required');
        $this->form_validation->set_rules('FundingSourcesIDs', 'Funding Sources', 'required');
        $this->form_validation->set_rules('FeeName[]', 'Fee Name', 'trim|required');
        $this->form_validation->set_rules('FeePrice[]', 'Price', 'required|numeric');
        $this->form_validation->set_rules('FeeKind[]', 'Weekly/Once', 'trim');
        $this->form_validation->set_rules('FeeWeeks[]', 'Weeks', 'trim');

        if($this->form_validation->run() == FALSE) {

            $this->gotoEditActivity();

        } else {

            $sessionName = $this->input->post('SessionName');
            $daysOfferedDesc = $this->input->post('DaysOfferedDesc');
            $timeBased = $this->input->post('TimeBased');
            $alignedWithDay = $this->input->post('AlignedWithDay');
            $maxEnrollment = $this->input->post('MaxEnrollment');
            $roomID = $this->input->post('RoomID');
            $goalID = $this->input->post('GoalID');
            $coreServiceAreaID = $this->input->post('CoreServiceAreaID');
            $academicSubjectID = $this->input->post('AcademicSubjectID');
            $aprCategoryTypeID = $this->input->post('AprCategoryTypeID');
            $focusID = $this->input->post('FocusID');
            $startDate = $this->input->post('StartDate');
            $startTime = $this->input->post('StartTime');
            $endDate = $this->input->post('EndDate');
            $endTime = $this->input->post('EndTime');
            $repeats = $this->input->post('Repeats');
            $averageHoursSessionDay = $this->input->post('AverageHoursSessionDay');
            $shareable = $this->input->post('Shareable');
            $fundingSourcesIDs = $this->input->post('FundingSourcesIDs');
            $feeName = $this->input->post('FeeName');
            $feePrice = $this->input->post('FeePrice');
            $feeWeeks = $this->input->post('FeeWeeks');
            $feeKindCheckNum = $this->input->post('FeeKind');

            for($i=0;$i<count($feeName);$i++) {
                if(in_array($i, $feeKindCheckNum))
                    $feeKind[$i] = "Weekly";
                else
                    $feeKind[$i] = "Once";
            }

            if($repeats) {
                $repeats_by = $this->input->post('RepeatsModal_Repeats');
                $repeats_every = $this->input->post('RepeatsModal_RepeatEvery');
                $repeats_startsOn = $this->input->post('RepeatsModal_StartsOn');
                $repeats_ends = $this->input->post('RepeatsModal_Ends');
                $repeats_endsAfter = $this->input->post('RepeatsModal_EndsAfter_Occ');
                $repeats_endsOn = $this->input->post('RepeatsModal_EndsOn_Date');
                $repeats_weekOn =
                    $this->input->post('RepeatsModal_WeekOn1').'|'.
                    $this->input->post('RepeatsModal_WeekOn2').'|'.
                    $this->input->post('RepeatsModal_WeekOn3').'|'.
                    $this->input->post('RepeatsModal_WeekOn4').'|'.
                    $this->input->post('RepeatsModal_WeekOn5').'|'.
                    $this->input->post('RepeatsModal_WeekOn6').'|'.
                    $this->input->post('RepeatsModal_WeekOn7');
            } else {
                $repeats_by = "";
                $repeats_every = "";
                $repeats_startsOn = "";
                $repeats_ends = "";
                $repeats_endsAfter = "";
                $repeats_endsOn = "";
                $repeats_weekOn = "";
            }

            //if($this->mschool->checkToChangeName($school_id, $schoolName)) {

                if($this->mactivity->editActivity(
                    $activity_id,
                    $sessionName,
                    $daysOfferedDesc,
                    $timeBased,
                    $alignedWithDay,
                    $maxEnrollment,
                    $roomID,
                    $goalID,
                    $coreServiceAreaID,
                    $academicSubjectID,
                    $aprCategoryTypeID,
                    $focusID,
                    $startDate,
                    $startTime,
                    $endDate,
                    $endTime,
                    $repeats,
                    $averageHoursSessionDay,
                    $shareable,
                    $fundingSourcesIDs,
                    $repeats_by,
                    $repeats_every,
                    $repeats_startsOn,
                    $repeats_ends,
                    $repeats_endsAfter,
                    $repeats_endsOn,
                    $repeats_weekOn,
                    $feeName,
                    $feePrice,
                    $feeKind,
                    $feeWeeks
                )) {


                    $activity = $this->mactivity->getActivity($activity_id);

                    //Create Plan on Stripe for Weekly Fee.

                    //_createStripePlans($activity->fee, $activity->activity_id);


                    $this->gotoActivitylist();

                } else {

                    $this->gotoEditActivity('Failed to edit!');//$this->gotoEditActivityWithError('Failed to edit!');
                }

            //} else {

            //    $this->gotoEditActivityWithError('Could not change school name, The school name already exists!');

            //}

        }

    }
    public function deleteActivity()
    {

        if(!gf_cu_rightsDelete()) redirect('/error');

        $activity_id = $_REQUEST['activity_id'];

        $this->mactivity->deleteActivity($activity_id);

        $this->gotoActivitylist();

    }
*/
}