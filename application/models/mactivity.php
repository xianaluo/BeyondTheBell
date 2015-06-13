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

class Mactivity extends CI_Model {

    var $activity_id;
    var $sessionName;
    var $daysOfferedDesc;
    var $timeBased;
    var $alignedWithDay;
    var $maxEnrollment;
    var $roomID;
    var $goalID;
    var $coreServiceAreaID;
    var $academicSubjectID;
    var $aprCategoryTypeID;
    var $focusID;
    var $startDate;
    var $endDate;
    var $repeats;
    var $averageHoursSessionDay;
    var $shareable;
    var $fundingSourcesIDs;
    var $school_id;
    var $schoolName;
    var $fee;
    var $repeats_by;
    var $repeats_every;
    var $repeats_startsOn;
    var $repeats_ends;
    var $repeats_endsAfter;
    var $repeats_endsOn;
    var $repeats_weekOn;

    public function __construct()
    {
        parent::__construct();

    }

    public static function insertActivity(
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
        $school_id,
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
        $feeWeeks)
    {



        try {

            $activity = new ParseObject("Activity");

            $activity->set("sessionName", $sessionName);
            $activity->set("daysOfferedDesc", $daysOfferedDesc);
            $activity->set("timeBased", self::string_boolean($timeBased));
            $activity->set("alignedWithDay", self::string_boolean($alignedWithDay));
            $activity->set("maxEnrollment", $maxEnrollment);
            $activity->set("roomID", $roomID);
            $activity->set("goalID", $goalID);
            $activity->set("coreServiceAreaID", $coreServiceAreaID);
            $activity->set("academicSubjectID", $academicSubjectID);
            $activity->set("aprCategoryTypeID", $aprCategoryTypeID);
            $activity->set("focusID", $focusID);
            $activity->set("startDate" , DateTime::createFromFormat('m/d/Y H:i A', $startDate.' '.$startTime));
            $activity->set("endDate", DateTime::createFromFormat('m/d/Y H:i A', $endDate.' '.$endTime));
            $activity->set("repeats", (bool)$repeats);
            $activity->set("averageHoursSessionDay", $averageHoursSessionDay);
            $activity->set("shareable", self::string_boolean($shareable));
            if($fundingSourcesIDs) {
                $activity->setArray("fundingSources", $fundingSourcesIDs);
            }

            if((bool)$repeats) {
                $activity->set("repeats_by",        $repeats_by);
                $activity->set("repeats_every",     (int)$repeats_every);
                $activity->set("repeats_startsOn",  DateTime::createFromFormat('m/d/Y', $repeats_startsOn));
                $activity->set("repeats_ends",      $repeats_ends);
                $activity->set("repeats_endsAfter", (int)$repeats_endsAfter);
                $activity->set("repeats_endsOn",    DateTime::createFromFormat('m/d/Y', $repeats_endsOn));
                $activity->set("repeats_weekOn",    $repeats_weekOn);
            }

            $activity->save();

            $activity_id = $activity->getObjectId();

            $school_activity = new ParseObject("SchoolActivities");
            $school_activity->set("activity_id", $activity_id);
            $school_activity->set("school_id", $school_id);
            $school_activity->save();

            for($i=0;$i<count($feeName);$i++) {

                $fee = new ParseObject("ActFee");
                $fee->set("activity_id", $activity_id);
                $fee->set("name", $feeName[$i]);
                $fee->set("price", floatval($feePrice[$i]));
                $fee->set("kind", $feeKind[$i]);
                $fee->set("weeks", intval($feeWeeks[$i]));
                $fee->save();
            }

            return $activity_id;

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return null;
        }
    }

    public static function string_boolean($string){
        return ( mb_strtoupper( trim( $string)) === mb_strtoupper ("true")) ? true : false;
    }

    public static function getActivitylist()
    {
        try {
            $query = new ParseQuery("Activity");

            $result = $query->find();

            $list = array();

            for ($i = 0; $i < count($result); $i++) {

                $object = $result[$i];

                $activity_one = new Mactivity();

                $activity_one->activity_id = $object->getObjectId();
                $activity_one->sessionName = $object->get("sessionName");
                $activity_one->daysOfferedDesc = $object->get("daysOfferedDesc");
                $activity_one->timeBased = $object->get("timeBased");
                $activity_one->alignedWithDay = $object->get("alignedWithDay");
                $activity_one->maxEnrollment = $object->get("maxEnrollment");
                $activity_one->roomID = $object->get("roomID");
                $activity_one->goalID = $object->get("goalID");
                $activity_one->coreServiceAreaID = $object->get("coreServiceAreaID");
                $activity_one->academicSubjectID = $object->get("academicSubjectID");
                $activity_one->aprCategoryTypeID = $object->get("aprCategoryTypeID");
                $activity_one->focusID = $object->get("focusID");
                $activity_one->startDate = $object->get("startDate");
                $activity_one->endDate = $object->get("endDate");
                $activity_one->repeats = $object->get("repeats");
                $activity_one->averageHoursSessionDay = $object->get("averageHoursSessionDay");
                $activity_one->shareable = $object->get("shareable");
                $activity_one->fundingSourcesIDs = $object->get("fundingSources");

                $activity_one->repeats_by = $object->get("repeats_by");
                $activity_one->repeats_every = $object->get("repeats_every");
                $activity_one->repeats_startsOn = $object->get("repeats_startsOn");
                $activity_one->repeats_ends = $object->get("repeats_ends");
                $activity_one->repeats_endsAfter = $object->get("repeats_endsAfter");
                $activity_one->repeats_endsOn = $object->get("repeats_endsOn");
                $activity_one->repeats_weekOn = $object->get("repeats_weekOn");


                $query_schoolActivities = new ParseQuery("SchoolActivities");
                $query_schoolActivities->equalTo("activity_id", $activity_one->activity_id);
                $result_schoolActivities = $query_schoolActivities->find();

                if(count($result_schoolActivities) > 0) {

                    $school_id = $result_schoolActivities[0]->get("school_id");

                    $school_query = new ParseQuery("School");
                    $school_obj = $school_query->get($school_id);
                    $school_name = $school_obj->get("schoolName");

                    $activity_one->school_id = $school_id;
                    $activity_one->schoolName = $school_name;

                }


                $list[] = $activity_one;

            }

            return $list;

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return null;
        }
    }

    public static function getActivitylistForAttendance()
    {
        try {

            $query = new ParseQuery("Activity");

            $query->lessThanOrEqualTo("startDate", new DateTime());

            $query->greaterThanOrEqualTo("endDate", new DateTime());


            $result = $query->find();

            $list = array();

            for ($i = 0; $i < count($result); $i++) {

                $object = $result[$i];

                $activity_one = new Mactivity();

                $activity_one->activity_id = $object->getObjectId();
                $activity_one->sessionName = $object->get("sessionName");
                $activity_one->daysOfferedDesc = $object->get("daysOfferedDesc");
                $activity_one->timeBased = $object->get("timeBased");
                $activity_one->alignedWithDay = $object->get("alignedWithDay");
                $activity_one->maxEnrollment = $object->get("maxEnrollment");
                $activity_one->roomID = $object->get("roomID");
                $activity_one->goalID = $object->get("goalID");
                $activity_one->coreServiceAreaID = $object->get("coreServiceAreaID");
                $activity_one->academicSubjectID = $object->get("academicSubjectID");
                $activity_one->aprCategoryTypeID = $object->get("aprCategoryTypeID");
                $activity_one->focusID = $object->get("focusID");
                $activity_one->startDate = $object->get("startDate");
                $activity_one->endDate = $object->get("endDate");
                $activity_one->repeats = $object->get("repeats");
                $activity_one->averageHoursSessionDay = $object->get("averageHoursSessionDay");
                $activity_one->shareable = $object->get("shareable");
                $activity_one->fundingSourcesIDs = $object->get("fundingSources");

                $activity_one->repeats_by = $object->get("repeats_by");
                $activity_one->repeats_every = $object->get("repeats_every");
                $activity_one->repeats_startsOn = $object->get("repeats_startsOn");
                $activity_one->repeats_ends = $object->get("repeats_ends");
                $activity_one->repeats_endsAfter = $object->get("repeats_endsAfter");
                $activity_one->repeats_endsOn = $object->get("repeats_endsOn");
                $activity_one->repeats_weekOn = $object->get("repeats_weekOn");


                $query_schoolActivities = new ParseQuery("SchoolActivities");
                $query_schoolActivities->equalTo("activity_id", $activity_one->activity_id);
                $result_schoolActivities = $query_schoolActivities->find();

                if(count($result_schoolActivities) > 0) {

                    $school_id = $result_schoolActivities[0]->get("school_id");

                    $school_query = new ParseQuery("School");
                    $school_obj = $school_query->get($school_id);
                    $school_name = $school_obj->get("schoolName");

                    $activity_one->school_id = $school_id;
                    $activity_one->schoolName = $school_name;

                }


                $list[] = $activity_one;

            }

            return $list;

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return null;
        }
    }

    public static function getActivityNamelist()
    {
        try {
            $query = new ParseQuery("Activity");

            $result = $query->find();

            $list = array();

            for ($i = 0; $i < count($result); $i++) {

                $object = $result[$i];

                $activity_one = new Mactivity();

                $activity_one->activity_id = $object->getObjectId();
                $activity_one->sessionName = $object->get("sessionName");

                $list[] = $activity_one;

            }

            return $list;

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return null;
        }
    }

    public static function getActivitylistWithFilter(
        $startDate,
        $startTime,
        $endDate,
        $endTime,
        $goalID,
        $fundingSourcesID,
        $academicSubjectID,
        $aprCategoryTypeID,
        $focusID)
    {
        try {
            $query = new ParseQuery("Activity");

            $query->greaterThanOrEqualTo("startDate" , DateTime::createFromFormat('m/d/Y H:i A', $startDate.' '.$startTime));
            $query->lessThanOrEqualTo("endDate" , DateTime::createFromFormat('m/d/Y H:i A', $endDate.' '.$endTime));
            if($goalID) {
                $query->equalTo("goalID", $goalID);
            }
            if($fundingSourcesID) {
                $query->equalTo("fundingSourcesID", $fundingSourcesID);
            }
            if($academicSubjectID) {
                $query->equalTo("academicSubjectID", $academicSubjectID);
            }
            if($aprCategoryTypeID) {
                $query->equalTo("aprCategoryTypeID", $aprCategoryTypeID);
            }
            if($focusID) {
                $query->equalTo("focusID", $focusID);
            }

            $result = $query->find();

            $list = array();

            for ($i = 0; $i < count($result); $i++) {

                $object = $result[$i];

                $activity_one = new Mactivity();

                $activity_one->activity_id = $object->getObjectId();
                $activity_one->sessionName = $object->get("sessionName");
                $activity_one->daysOfferedDesc = $object->get("daysOfferedDesc");
                $activity_one->timeBased = $object->get("timeBased");
                $activity_one->alignedWithDay = $object->get("alignedWithDay");
                $activity_one->maxEnrollment = $object->get("maxEnrollment");
                $activity_one->roomID = $object->get("roomID");
                $activity_one->goalID = $object->get("goalID");
                $activity_one->coreServiceAreaID = $object->get("coreServiceAreaID");
                $activity_one->academicSubjectID = $object->get("academicSubjectID");
                $activity_one->aprCategoryTypeID = $object->get("aprCategoryTypeID");
                $activity_one->focusID = $object->get("focusID");
                $activity_one->startDate = $object->get("startDate");
                $activity_one->endDate = $object->get("endDate");
                $activity_one->repeats = $object->get("repeats");
                $activity_one->averageHoursSessionDay = $object->get("averageHoursSessionDay");
                $activity_one->shareable = $object->get("shareable");
                $activity_one->fundingSourcesIDs = $object->get("fundingSources");

                $activity_one->repeats_by = $object->get("repeats_by");
                $activity_one->repeats_every = $object->get("repeats_every");
                $activity_one->repeats_startsOn = $object->get("repeats_startsOn");
                $activity_one->repeats_ends = $object->get("repeats_ends");
                $activity_one->repeats_endsAfter = $object->get("repeats_endsAfter");
                $activity_one->repeats_endsOn = $object->get("repeats_endsOn");
                $activity_one->repeats_weekOn = $object->get("repeats_weekOn");


                $query_schoolActivities = new ParseQuery("SchoolActivities");
                $query_schoolActivities->equalTo("activity_id", $activity_one->activity_id);
                $result_schoolActivities = $query_schoolActivities->find();

                if(count($result_schoolActivities) > 0) {

                    $school_id = $result_schoolActivities[0]->get("school_id");

                    $school_query = new ParseQuery("School");
                    $school_obj = $school_query->get($school_id);
                    $school_name = $school_obj->get("schoolName");

                    $activity_one->school_id = $school_id;
                    $activity_one->schoolName = $school_name;

                }

                $list[] = $activity_one;

            }

            return $list;

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return null;
        }
    }

    public static function getActivity($activity_id)
    {
        try {
            $query = new ParseQuery("Activity");
            $object = $query->get($activity_id);

            $activity_one = new Mactivity();

            $activity_one->activity_id = $object->getObjectId();
            $activity_one->sessionName = $object->get("sessionName");
            $activity_one->daysOfferedDesc = $object->get("daysOfferedDesc");
            $activity_one->timeBased = $object->get("timeBased");
            $activity_one->alignedWithDay = $object->get("alignedWithDay");
            $activity_one->maxEnrollment = $object->get("maxEnrollment");
            $activity_one->roomID = $object->get("roomID");
            $activity_one->goalID = $object->get("goalID");
            $activity_one->coreServiceAreaID = $object->get("coreServiceAreaID");
            $activity_one->academicSubjectID = $object->get("academicSubjectID");
            $activity_one->aprCategoryTypeID = $object->get("aprCategoryTypeID");
            $activity_one->focusID = $object->get("focusID");
            $activity_one->startDate = $object->get("startDate");
            $activity_one->endDate = $object->get("endDate");
            $activity_one->repeats = $object->get("repeats");
            $activity_one->averageHoursSessionDay = $object->get("averageHoursSessionDay");
            $activity_one->shareable = $object->get("shareable");
            $activity_one->fundingSourcesIDs = $object->get("fundingSources");


            $activity_one->repeats_by = $object->get("repeats_by");
            $activity_one->repeats_every = $object->get("repeats_every");
            $activity_one->repeats_startsOn = $object->get("repeats_startsOn");
            $activity_one->repeats_ends = $object->get("repeats_ends");
            $activity_one->repeats_endsAfter = $object->get("repeats_endsAfter");
            $activity_one->repeats_endsOn = $object->get("repeats_endsOn");
            $activity_one->repeats_weekOn = $object->get("repeats_weekOn");

            $query_schoolActivities = new ParseQuery("SchoolActivities");
            $query_schoolActivities->equalTo("activity_id", $activity_one->activity_id);
            $result_schoolActivities = $query_schoolActivities->find();


            if (count($result_schoolActivities) > 0) {

                $school_id = $result_schoolActivities[0]->get("school_id");

                $school_query = new ParseQuery("School");
                $school_obj = $school_query->get($school_id);
                $school_name = $school_obj->get("schoolName");

                $activity_one->school_id = $school_id;
                $activity_one->schoolName = $school_name;
            }


            $query_fee = new ParseQuery("ActFee");
            $query_fee->equalTo("activity_id", $activity_id);
            $query_fee->ascending("createdAt");
            $result_fee = $query_fee->find();
            $activity_one->fee = array();

            for ($f = 0; $f < count($result_fee); $f++) {

                $fee_id = $result_fee[$f]->getObjectId();
                $fee_name = $result_fee[$f]->get("name");
                $fee_price = $result_fee[$f]->get("price");
                $fee_kind = $result_fee[$f]->get("kind");
                $fee_weeks = $result_fee[$f]->get("weeks");

                $activity_one->fee[] = array("id"=>$fee_id, "name"=>$fee_name, "price"=>$fee_price, "kind"=>$fee_kind, "weeks"=>$fee_weeks);
            }


            return $activity_one;

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return null;
        }

    }

    public static function getActivityName($activity_id)
    {
        try {

            $query = new ParseQuery("Activity");
            $object = $query->get($activity_id);

            $sessionName = $object->get("sessionName");


            return $sessionName;

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return "";
        }
    }

    public static function editActivity(
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
        $school_id,
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
        $feeWeeks)
    {



        try {

            $query = new ParseQuery("Activity");

            $activity = $query->get($activity_id);

            $activity->set("sessionName", $sessionName);
            $activity->set("daysOfferedDesc", $daysOfferedDesc);
            $activity->set("timeBased", self::string_boolean($timeBased));
            $activity->set("alignedWithDay", self::string_boolean($alignedWithDay));
            $activity->set("maxEnrollment", $maxEnrollment);
            $activity->set("roomID", $roomID);
            $activity->set("goalID", $goalID);
            $activity->set("coreServiceAreaID", $coreServiceAreaID);
            $activity->set("academicSubjectID", $academicSubjectID);
            $activity->set("aprCategoryTypeID", $aprCategoryTypeID);
            $activity->set("focusID", $focusID);
            $activity->set("startDate" , DateTime::createFromFormat('m/d/Y H:i A', $startDate.' '.$startTime));
            $activity->set("endDate", DateTime::createFromFormat('m/d/Y H:i A', $endDate.' '.$endTime));
            $activity->set("repeats", (bool)$repeats);
            $activity->set("averageHoursSessionDay", $averageHoursSessionDay);
            $activity->set("shareable", self::string_boolean($shareable));
            if($fundingSourcesIDs)
                $activity->setArray("fundingSources", $fundingSourcesIDs);

            if((bool)$repeats) {
                $activity->set("repeats_by",        $repeats_by);
                $activity->set("repeats_every",     (int)$repeats_every);
                $activity->set("repeats_startsOn",  DateTime::createFromFormat('m/d/Y', $repeats_startsOn));
                $activity->set("repeats_ends",      $repeats_ends);
                $activity->set("repeats_endsAfter", (int)$repeats_endsAfter);
                $activity->set("repeats_endsOn",    DateTime::createFromFormat('m/d/Y', $repeats_endsOn));
                $activity->set("repeats_weekOn",    $repeats_weekOn);
            }

            $activity->save();

            // delete before attached school
            $query = new ParseQuery("SchoolActivities");
            $query->equalTo("activity_id", $activity_id);
            $result = $query->find();

            foreach($result as $obj) {

                $obj->destroy();

            }

            //add new atttached school

            $school_activity = new ParseObject("SchoolActivities");
            $school_activity->set("activity_id", $activity_id);
            $school_activity->set("school_id", $school_id);
            $school_activity->save();


            // delete before attached Fee
            $query = new ParseQuery("ActFee");
            $query->equalTo("activity_id", $activity_id);
            $result = $query->find();

            foreach($result as $obj) {

                $obj->destroy();

            }

            //add new atttached Fee
            for($i=0;$i<count($feeName);$i++) {

                $fee = new ParseObject("ActFee");
                $fee->set("activity_id", $activity_id);
                $fee->set("name", $feeName[$i]);
                $fee->set("price", floatval($feePrice[$i]));
                $fee->set("kind", $feeKind[$i]);
                $fee->set("weeks", intval($feeWeeks[$i]));
                $fee->save();
            }

            return true;

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            die($ex->getMessage());
            return false;
        } catch (Exception $ex) {
            die($ex->getMessage());
            return false;
        }
    }

    public static function deleteActivity($activity_id)
    {
        try {
            $query = new ParseQuery("Activity");

            $activity_one = $query->get($activity_id);

            $activity_one->destroy();

            // delete before attached school
            $query = new ParseQuery("SchoolActivities");
            $query->equalTo("activity_id", $activity_id);
            $result = $query->find();

            foreach($result as $obj) {

                $obj->destroy();

            }


            // delete before attached Fee
            $query = new ParseQuery("ActFee");
            $query->equalTo("activity_id", $activity_id);
            $result = $query->find();

            foreach($result as $obj) {

                $obj->destroy();

            }

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
        }

    }

    public static function getActFee($id) {

        try {

            $query = new ParseQuery("ActFee");

            $obj = $query->get($id);

            $fee['id'] = $id;
            $fee['name'] = $obj->get("name");
            $fee['kind'] = $obj->get("kind");
            $fee['price'] = $obj->get("price");
            $fee['weeks'] = $obj->get("weeks");

            return $fee;

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return null;
        }
    }
}