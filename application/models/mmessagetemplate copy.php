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

class Mmessagetemplate_copy extends CI_Model {

    var $template_id;
    var $email;
    var $name;
    var $desc;
    var $shareable;
    var $contents;

    public function __construct()
    {
        parent::__construct();

    }

    public static function insertMessageTemplate(
        $email,
        $name,
        $desc,
        $shareable,
        $contents)
    {

        try {

            $template = new ParseObject("MessageTemplate");

            $template->set("email", $email);
            $template->set("name", $name);
            $template->set("description", $desc);
            $template->set("shareable", (bool)$shareable);
            $template->set("contents", $contents);

            $template->save();

            $template_id = $template->getObjectId();

            return $template_id;

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return null;
        }
    }

    public static function getTemplateslist($email, $PageNum, $RowsPerPage, $search_value)
    {
        try {


            if($search_value) {

                $query1 = new ParseQuery("MessageTemplate");
                $query1->equalTo("email", $email);
                $query1->startsWith("name", $search_value);

                $query2 = new ParseQuery("MessageTemplate");
                $query2->equalTo("email", $email);
                $query2->startsWith("description", $search_value);

                $query3 = new ParseQuery("MessageTemplate");
                $query3->equalTo("email", $email);
                $query3->startsWith("contents", $search_value);

                $query = ParseQuery::orQueries([$query1, $query2, $query3]);

            } else {

                $query = new ParseQuery("MessageTemplate");
                $query->equalTo("email", $email);
            }

            $query->ascending("name");

            $count = $query->count();

            $Pages = ($count % $RowsPerPage == 0)?$count/$RowsPerPage:intval($count/$RowsPerPage)+1;

            if($PageNum < 1) $PageNum = 1;
            if($PageNum > $Pages) $PageNum = $Pages;

            $skip = ($PageNum-1)*$RowsPerPage;
            $query->skip($skip);
            $query->limit($RowsPerPage);

            $result = $query->find();



            $list = array();

            for ($i = 0; $i < count($result); $i++) {

                $object = $result[$i];

                $template_one = new Mmessagetemplate();

                $template_one->template_id = $object->getObjectId();
                $template_one->name = $object->get("name");
                $template_one->desc = $object->get("description");
                $template_one->shareable = $object->get("shareable");
                $template_one->contents = $object->get("contents");

                $list[] = $template_one;

            }

            $ret['PageNum'] = $PageNum;
            $ret['Pages'] = $Pages;
            $ret['RowsPerPage'] = $RowsPerPage;
            $ret['list'] = $list;
            return $ret;

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return null;
        } catch(Exception $ex1) {

            $ex1->getMessage();
        }
    }

    public static function getTemplate($template_id)
    {
        try {
            $query = new ParseQuery("MessageTemplate");
            $object = $query->get($template_id);

            $template_one = new Mmessagetemplate();

            $template_one->template_id = $object->getObjectId();
            $template_one->name = $object->get("name");
            $template_one->desc = $object->get("description");
            $template_one->shareable = $object->get("shareable");
            $template_one->contents = $object->get("contents");

            return $template_one;

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return null;
        }

    }

    public static function deleteTemplate($template_id)
    {
        try {
            $query = new ParseQuery("MessageTemplate");

            $template_one = $query->get($template_id);

            $template_one->destroy();


        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
        }

    }
/*
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
*/
}