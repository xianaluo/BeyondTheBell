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

class Mschool extends CI_Model {

    var $school_id;
    var $schoolName;
    var $schoolType;
    var $parentSchool;
    var $principal;
    var $buildingCoordinator;
    var $schoolCode;
    var $schoolEnrollment;
    var $phoneNumber;
    var $faxNumber;
    var $address1;
    var $address2;
    var $city;
    var $state;
    var $zipCode;
    var $schoolStatus;
    var $attachingActivities;

    public function __construct()
    {
        parent::__construct();

    }

    public static function insertSchool(
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
        $attachingActivities)
    {



        try {

            $school = new ParseObject("School");

            $school->set("schoolName", $schoolName);
            $school->set("schoolType", $schoolType);
            $school->set("parentSchool", $parentSchool);
            $school->set("principal", $principal);
            $school->set("buildingCoordinator", $buildingCoordinator);
            $school->set("schoolCode", $schoolCode);
            $school->set("schoolEnrollment", $schoolEnrollment);
            $school->set("phoneNumber", $phoneNumber);
            $school->set("faxNumber", $faxNumber);
            $school->set("address1", $address1);
            $school->set("address2" , $address2);
            $school->set("city", $city);
            $school->set("state", $state);
            $school->set("zipCode", $zipCode);
            $school->set("schoolStatus", "APPROVED");

            $school->save();

            $school_id = $school->getObjectId();

            foreach($attachingActivities as $value) {

                $school_activity = new ParseObject("SchoolActivities");
                $school_activity->set("school_id", $school_id);
                $school_activity->set("activity_id", $value);

                $school_activity->save();
            }


            return $school_id;

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return null;
        }
    }

    public static function getSchoollist()
    {
        try {
            $query = new ParseQuery("School");

            $result = $query->find();

            $list = array();

            for ($i = 0; $i < count($result); $i++) {

                $object = $result[$i];

                $school_one = new Mschool();


                $school_one->school_id = $object->getObjectId();
                $school_one->schoolName = $object->get("schoolName");
                $school_one->schoolType = $object->get("schoolType");
                $school_one->parentSchool = $object->get("parentSchool");
                $school_one->principal = $object->get("principal");
                $school_one->buildingCoordinator = $object->get("buildingCoordinator");
                $school_one->schoolCode = $object->get("schoolCode");
                $school_one->schoolEnrollment = $object->get("schoolEnrollment");
                $school_one->phoneNumber = $object->get("phoneNumber");
                $school_one->faxNumber = $object->get("faxNumber");
                $school_one->address1 = $object->get("address1");
                $school_one->address2 = $object->get("address2");
                $school_one->city = $object->get("city");
                $school_one->state = $object->get("state");
                $school_one->zipCode = $object->get("zipCode");
                $school_one->schoolStatus = $object->get("schoolStatus");

                $list[] = $school_one;

            }

            return $list;
        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return null;
        }
    }

    public static function getSchoolNamelist()
    {
        try {
            $query = new ParseQuery("School");

            $result = $query->find();

            $list = array();

            for ($i = 0; $i < count($result); $i++) {

                $object = $result[$i];

                $school_one = new Mschool();


                $school_one->school_id = $object->getObjectId();
                $school_one->schoolName = $object->get("schoolName");

                $list[] = $school_one;

            }

            return $list;
        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return null;
        }
    }

    public static function getSchool($school_id)
    {
        try {
            $query = new ParseQuery("School");
            $object = $query->get($school_id);

            $school_one = new Mschool();

            $school_one->school_id = $object->getObjectId();
            $school_one->schoolName = $object->get("schoolName");
            $school_one->schoolType = $object->get("schoolType");
            $school_one->parentSchool = $object->get("parentSchool");
            $school_one->principal = $object->get("principal");
            $school_one->buildingCoordinator = $object->get("buildingCoordinator");
            $school_one->schoolCode = $object->get("schoolCode");
            $school_one->schoolEnrollment = $object->get("schoolEnrollment");
            $school_one->phoneNumber = $object->get("phoneNumber");
            $school_one->faxNumber = $object->get("faxNumber");
            $school_one->address1 = $object->get("address1");
            $school_one->address2 = $object->get("address2");
            $school_one->city = $object->get("city");
            $school_one->state = $object->get("state");
            $school_one->zipCode = $object->get("zipCode");
            $school_one->schoolStatus = $object->get("schoolStatus");


            $query_schoolActivities = new ParseQuery("SchoolActivities");
            $query_schoolActivities->equalTo("school_id", $school_one->school_id);
            $result_schoolActivities = $query_schoolActivities->find();

            $school_one->attachingActivities = array();

            for ($s = 0; $s < count($result_schoolActivities); $s++) {

                $activity_id = $result_schoolActivities[$s]->get("activity_id");

                $activity_query = new ParseQuery("Activity");
                $activity_obj = $activity_query->get($activity_id);
                $activity_name = $activity_obj->get("sessionName");

                $school_one->attachingActivities[$activity_id] = $activity_name;
            }

            return $school_one;

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return null;
        }

    }

    public static function editSchool(
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
        $attachingActivities)
    {

        try {

            $query = new ParseQuery("School");

            $school = $query->get($school_id);

            $school->set("schoolName", $schoolName);
            $school->set("schoolType", $schoolType);
            $school->set("parentSchool", $parentSchool);
            $school->set("principal", $principal);
            $school->set("buildingCoordinator", $buildingCoordinator);
            $school->set("schoolCode", $schoolCode);
            $school->set("schoolEnrollment", $schoolEnrollment);
            $school->set("phoneNumber", $phoneNumber);
            $school->set("faxNumber", $faxNumber);
            $school->set("address1", $address1);
            $school->set("address2" , $address2);
            $school->set("city", $city);
            $school->set("state", $state);
            $school->set("zipCode", $zipCode);

            $school->save();

            //delete old
            $query = new ParseQuery("SchoolActivities");
            $query->equalTo("school_id", $school_id);
            $result = $query->find();

            foreach($result as $obj) {

                $obj->destroy();

            }

            //add new

            foreach($attachingActivities as $value) {

                $school_activity = new ParseObject("SchoolActivities");
                $school_activity->set("school_id", $school_id);
                $school_activity->set("activity_id", $value);

                $school_activity->save();
            }

            return true;

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return false;
        }
    }

    public static function deleteSchool($school_id)
    {
        try {
            $query = new ParseQuery("School");

            $school_one = $query->get($school_id);

            $school_one->destroy();


            //delete attached activities
            $query = new ParseQuery("SchoolActivities");
            $query->equalTo("school_id", $school_id);
            $result = $query->find();

            foreach($result as $obj) {

                $obj->destroy();

            }

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
        }

    }

    public static function findAccount($schoolName)
    {
        try {

            $query = new ParseQuery("School");
            $query->equalTo("schoolName", $schoolName);
            $results = $query->find();

            if (count($results) > 0) {

                return true;
            }

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
        }

        return false;

    }

    public static function checkToChangeName($school_id, $new_schoolName)
    {
        try {

            $query = new ParseQuery("School");
            $object = $query->get($school_id);

            if($object->get("schoolName") != $new_schoolName) {

                $query = new ParseQuery("School");
                $query->equalTo("schoolName", $new_schoolName);
                $results = $query->find();

                if(count($results) > 0)
                    return false;
            }

            return true;

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return false;
        }
    }
}