<?php
/**
 * Created by PhpStorm.
 * User: win
 * Date: 1/7/15
 * Time: 9:35 PM
 */

use Parse\ParseClient;
use Parse\ParseSessionStorage;
use Parse\ParseUser;
use Parse\ParseException;
use Parse\ParseObject;
use Parse\ParseQuery;

class Mattendance extends CI_Model {



    public function __construct()
    {
        parent::__construct();

    }


    public static function checkAttendanceForActivity(
        $attendDate,
        $activity_id,
        $attendance)
    {

        try {



            //delete all old saved
            $query = new ParseQuery("Attendance");
            $query->equalTo("attendDate", new DateTime($attendDate));
            $query->equalTo("activity_id", $activity_id);
            $result = $query->find();
            for($i=0;$i<count($result);$i++) {
                $attend_obj = $result[$i];
                $attend_obj->destroy();
            }


            //Get School_id of the activity
            $query = new ParseQuery("SchoolActivities");
            $query->equalTo("activity_id", $activity_id);
            $result = $query->find();
            if(count($result) > 0) {
                $school_id = $result[0]->get("school_id");
            } else {
                $school_id = "";
            }

            //Add again
            $query = new ParseQuery("Student");
            $query->equalTo("activity", $activity_id);
            $result = $query->find();

            for($i=0;$i<count($result);$i++) {

                $student_id = $result[$i]->getObjectId();

                $attend_obj = new ParseObject("Attendance");
                $attend_obj->set("school_id", $school_id);
                $attend_obj->set("activity_id", $activity_id);
                $attend_obj->set("student_id", $student_id);
                $attend_obj->set("attendDate", new DateTime($attendDate));

                if(in_array($student_id, $attendance)) {
                    $attend_obj->set("status", true);
                } else {
                    $attend_obj->set("status", false);
                }

                $attend_obj->save();

            }

            return true;

        } catch(ParseException $ex) {

            return false;

        }

    }


    public static function checkAttendanceForStudent(
        $attendDate,
        $activity_id,
        $student_id,
        $attendance)
    {

        try {


            //Get School_id of the activity
            $query = new ParseQuery("SchoolActivity");
            $query->equalTo("activity_id", $activity_id);
            $result = $query->find();
            if(count($result) > 0) {
                $school_id = $result[0]->get("school_id");
            } else {
                $school_id = "";
            }


            $query = new ParseQuery("Attendance");
            $query->equalTo("activity_id", $activity_id);
            $query->equalTo("student_id", $student_id);
            $query->equalTo("attendDate", new DateTime($attendDate));
            $result = $query->find();

            if(count($result) > 0) {

                $attend_obj = $result[0];
                $attend_obj->set("status", self::string_boolean($attendance));

                $attend_obj->save();
            } else {

                $attend_obj = new ParseObject("Attendance");
                $attend_obj->set("school_id", $school_id);
                $attend_obj->set("activity_id", $activity_id);
                $attend_obj->set("student_id", $student_id);
                $attend_obj->set("attendDate", new DateTime($attendDate));
                $attend_obj->set("status", self::string_boolean($attendance));

                $attend_obj->save();
            }

            return true;

        } catch(ParseException $ex) {

            return false;

        }

    }

    public static function filterAttend(
        $startDate,
        $endDate,
        $school,
        $activity,
        $student)
    {

        try {

            $query = new ParseQuery("Attendance");

            if($startDate) {
                $query->greaterThanOrEqualTo("attendDate", new DateTime($startDate));
            }
            if($endDate) {
                $query->lessThanOrEqualTo("attendDate", new DateTime($endDate));
            }
            if($school) {
                $query->containedIn("school_id", $school);
            }
            if($activity) {
                $query->containedIn("activity_id", $activity);
            }
            if($student) {
                $query->containedIn("student_id", $student);
            }

            $result = $query->find();

            $list = array();
            $school_list = array();
            $activity_list = array();

            for($i=0;$i<count($result);$i++) {

                $object = $result[$i];

                $school_id = $object->get("school_id");
                $activity_id = $object->get("activity_id");
                $student_id = $object->get("student_id");
                $attendance = $object->get("status");
                $attendDate = $object->get("attendDate");


                if($school_list[$school_id]) {
                    $schoolName = $school_list[$school_id];
                } else {
                    $query2 = new ParseQuery("School");
                    $school_obj = $query2->get($school_id);
                    $schoolName = $school_obj->get("schoolName");
                    $school_list[$school_id] = $schoolName;
                }

                if($activity_list[$activity_id]) {
                    $activityName = $activity_list[$activity_id];
                } else {
                    $query2 = new ParseQuery("Activity");
                    $activity_obj = $query2->get($activity_id);
                    $activityName = $activity_obj->get("sessionName");
                    $activity_list[$activity_id] = $activityName;
                }

                $query2 = new ParseQuery("Student");
                $student_obj = $query2->get($student_id);
                $studentFirstName = $student_obj->get("firstName");
                $studentMiddleInitial = $student_obj->get("middleInitial");
                $studentLastName = $student_obj->get("lastName");
                $studentName = $studentFirstName;
                if($studentMiddleInitial) $studentName .= ' '. $studentMiddleInitial;
                $studentName .= ' '. $studentLastName;

                $item_one["school"] = $schoolName;
                $item_one["activity"] = $activityName;
                $item_one["student"] = $studentName;
                $item_one["attendance"] = $attendance;
                $item_one["attendDate"] = $attendDate;


                $list[] = $item_one;
            }

            return $list;

        } catch(ParseException $ex) {

            return null;

        }

    }

    public static function string_boolean($string){
        return ( mb_strtoupper( trim( $string)) === mb_strtoupper ("true")) ? true : false;
    }
}