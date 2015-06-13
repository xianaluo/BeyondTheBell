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

class Mdiscount extends CI_Model {

    var $discount_id;
    var $name;
    var $code;
    var $noLimit;
    var $limit;
    var $desc;
    var $type;
    var $amount;
    var $offFor;
    var $forAllUsers;
    var $forSpecificUsers;
    var $forSpecificTiers;
    var $forMultipleChild;
    var $forSpecificActivities;
    var $startDate;
    var $neverExpires;
    var $expireDate;
    var $status;

    public function __construct()
    {
        parent::__construct();

    }



    public static function insertDiscount(
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
        $status)
    {

        try {

            $discount = new ParseObject("Discount");

            $discount->set("name", $name);
            $discount->set("code", $code);
            $discount->set("noLimit", (bool)$noLimit);
            $discount->set("limit", (int)$limit);
            $discount->set("desc", $desc);
            $discount->set("type", $type);
            $discount->set("amount", floatval($amount));
            $discount->set("offFor", $offFor);
            $discount->setArray("ForSpecificUsers", $forSpecificUsers);
            $discount->setArray("ForSpecificTiers" , $forSpecificTiers);
            $discount->set("ForMultipleChild", (int)$forMultipleChild);
            $discount->setArray("ForSpecificActivities", $forSpecificActivities);
            $discount->set("startDate", DateTime::createFromFormat('m/d/Y', $startDate));
            $discount->set("neverExpires", (bool)$neverExpires);
            $discount->set("status", $status);

            if($expireDate)
                $discount->set("expireDate", DateTime::createFromFormat('m/d/Y', $expireDate));

            $discount->save();

            $discount_id = $discount->getObjectId();

            return $discount_id;

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return null;
        }
    }


    public static function updateDiscount(
        $discount_id,
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
        $status)
    {

        try {

            $query = new ParseQuery("Discount");

            $discount = $query->get($discount_id);

            $discount->set("name", $name);
            $discount->set("noLimit", (bool)$noLimit);
            $discount->set("limit", (int)$limit);
            $discount->set("desc", $desc);
            $discount->set("type", $type);
            $discount->set("amount", floatval($amount));
            $discount->set("offFor", $offFor);
            $discount->setArray("ForSpecificUsers", $forSpecificUsers);
            $discount->setArray("ForSpecificTiers" , $forSpecificTiers);
            $discount->set("ForMultipleChild", (int)$forMultipleChild);
            $discount->setArray("ForSpecificActivities", $forSpecificActivities);
            $discount->set("startDate", DateTime::createFromFormat('m/d/Y', $startDate));
            $discount->set("neverExpires", (bool)$neverExpires);
            $discount->set("status", $status);

            if($expireDate)
                $discount->set("expireDate", DateTime::createFromFormat('m/d/Y', $expireDate));

            $discount->save();

            return true;

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return false;
        }
    }

    public static function getDiscountlist()
    {
        try {

            $query = new ParseQuery("Discount");

            $result = $query->find();

            $list = array();

            for ($i = 0; $i < count($result); $i++) {

                $object = $result[$i];

                $discount_one = new Mdiscount();


                $discount_one->discount_id = $object->getObjectId();
                $discount_one->name = $object->get("name");
                $discount_one->code = $object->get("code");
                $discount_one->noLimit = $object->get("noLimit");
                $discount_one->limit = $object->get("limit");
                $discount_one->desc = $object->get("desc");
                $discount_one->type = $object->get("type");
                $discount_one->amount = $object->get("amount");
                $discount_one->offFor = $object->get("offFor");
                $discount_one->forSpecificUsers = $object->get("ForSpecificUsers");
                $discount_one->forSpecificTiers = $object->get("ForSpecificTiers");
                $discount_one->forMultipleChild = $object->get("ForMultipleChild");
                $discount_one->forSpecificActivities = $object->get("ForSpecificActivities");
                $discount_one->startDate = $object->get("startDate");
                $discount_one->neverExpires = $object->get("neverExpires");
                $discount_one->expireDate = $object->get("expireDate");
                $discount_one->status = $object->get("status");

                $list[] = $discount_one;

            }

            return $list;

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return null;
        }
    }

    public static function getDiscountlist2($PageNum, $RowsPerPage, $search_value)
    {
        try {

            if($search_value) {

                $query = new ParseQuery("Discount");

                $result = $query->find();

                $list = array();

                for ($i = 0; $i < count($result); $i++) {

                    $object = $result[$i];

                    $name = $object->get("name");
                    $code = $object->get("code");
                    $status = $object->get("status");
                    $desc = $object->get("desc");

                    $pos1 = strpos($name, $search_value);
                    $pos2 = strpos($code, $search_value);
                    $pos3 = strpos($status, $search_value);
                    $pos4 = strpos($desc, $search_value);

                    if($pos1 === false && $pos2 === false && $pos3 === false && $pos4 === false) {
                        continue;
                    }

                    $discount_one = new Mdiscount();

                    $discount_one->discount_id = $object->getObjectId();
                    $discount_one->name = $object->get("name");
                    $discount_one->code = $object->get("code");
                    $discount_one->noLimit = $object->get("noLimit");
                    $discount_one->limit = $object->get("limit");
                    $discount_one->desc = $object->get("desc");
                    $discount_one->type = $object->get("type");
                    $discount_one->amount = $object->get("amount");
                    $discount_one->offFor = $object->get("offFor");
                    $discount_one->forSpecificUsers = $object->get("ForSpecificUsers");
                    $discount_one->forSpecificTiers = $object->get("ForSpecificTiers");
                    $discount_one->forMultipleChild = $object->get("ForMultipleChild");
                    $discount_one->forSpecificActivities = $object->get("ForSpecificActivities");
                    $discount_one->startDate = $object->get("startDate");
                    $discount_one->neverExpires = $object->get("neverExpires");
                    $discount_one->expireDate = $object->get("expireDate");
                    $discount_one->status = $object->get("status");

                    $list[] = $discount_one;

                }

                $count = count($list);
                $Pages = ($count % $RowsPerPage == 0) ? $count / $RowsPerPage : intval($count / $RowsPerPage) + 1;
                if($Pages == 0) $Pages = 1;

                if ($PageNum < 1) $PageNum = 1;
                if ($PageNum > $Pages) $PageNum = $Pages;

                $skip = ($PageNum - 1) * $RowsPerPage;

                $rows = min($RowsPerPage, $count-$skip);

                $ret_list = array();

                for($i=0; $i<$rows; $i++) {

                    $ret_list[] = $list[$skip + $i];

                }


                $ret['PageNum'] = $PageNum;
                $ret['Pages'] = $Pages;
                $ret['RowsPerPage'] = $RowsPerPage;
                $ret['list'] = $ret_list;

                return $ret;

            } else {

                $query = new ParseQuery("Discount");

                $count = $query->count();

                $Pages = ($count % $RowsPerPage == 0) ? $count / $RowsPerPage : intval($count / $RowsPerPage) + 1;
                if($Pages == 0) $Pages = 1;

                if ($PageNum < 1) $PageNum = 1;
                if ($PageNum > $Pages) $PageNum = $Pages;

                $skip = ($PageNum - 1) * $RowsPerPage;
                $query->skip($skip);
                $query->limit($RowsPerPage);

                $result = $query->find();

                $list = array();

                for ($i = 0; $i < count($result); $i++) {

                    $object = $result[$i];

                    $discount_one = new Mdiscount();


                    $discount_one->discount_id = $object->getObjectId();
                    $discount_one->name = $object->get("name");
                    $discount_one->code = $object->get("code");
                    $discount_one->noLimit = $object->get("noLimit");
                    $discount_one->limit = $object->get("limit");
                    $discount_one->desc = $object->get("desc");
                    $discount_one->type = $object->get("type");
                    $discount_one->amount = $object->get("amount");
                    $discount_one->offFor = $object->get("offFor");
                    $discount_one->forSpecificUsers = $object->get("ForSpecificUsers");
                    $discount_one->forSpecificTiers = $object->get("ForSpecificTiers");
                    $discount_one->forMultipleChild = $object->get("ForMultipleChild");
                    $discount_one->forSpecificActivities = $object->get("ForSpecificActivities");
                    $discount_one->startDate = $object->get("startDate");
                    $discount_one->neverExpires = $object->get("neverExpires");
                    $discount_one->expireDate = $object->get("expireDate");
                    $discount_one->status = $object->get("status");

                    $list[] = $discount_one;

                }

                $ret['PageNum'] = $PageNum;
                $ret['Pages'] = $Pages;
                $ret['RowsPerPage'] = $RowsPerPage;
                $ret['list'] = $list;

                return $ret;
            }



        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return null;
        }
    }

    public static function findDiscount($code)
    {
        try {

            $query = new ParseQuery("Discount");
            $query->equalTo("code", $code);
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

    public static function getDiscount($discount_id)
    {
        try {

            $query = new ParseQuery("Discount");

            $object = $query->get($discount_id);

            $discount_one = new Mdiscount();


            $discount_one->discount_id = $object->getObjectId();
            $discount_one->name = $object->get("name");
            $discount_one->code = $object->get("code");
            $discount_one->noLimit = $object->get("noLimit");
            $discount_one->limit = $object->get("limit");
            $discount_one->desc = $object->get("desc");
            $discount_one->type = $object->get("type");
            $discount_one->amount = $object->get("amount");
            $discount_one->offFor = $object->get("offFor");
            $discount_one->forSpecificUsers = $object->get("ForSpecificUsers");
            $discount_one->forSpecificTiers = $object->get("ForSpecificTiers");
            $discount_one->forMultipleChild = $object->get("ForMultipleChild");
            $discount_one->forSpecificActivities = $object->get("ForSpecificActivities");
            $discount_one->startDate = $object->get("startDate");
            $discount_one->neverExpires = $object->get("neverExpires");
            $discount_one->expireDate = $object->get("expireDate");
            $discount_one->status = $object->get("status");

            return $discount_one;

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return null;
        }

    }


    public static function getDiscountByCode($code)
    {
        try {

            $query = new ParseQuery("Discount");

            $query->equalTo("code", $code);

            $reuslt = $query->find();

            if(count($reuslt) != 1) return null;

            $object = $reuslt[0];

            $discount_one = new Mdiscount();

            $discount_one->discount_id = $object->getObjectId();
            $discount_one->name = $object->get("name");
            $discount_one->code = $object->get("code");
            $discount_one->noLimit = $object->get("noLimit");
            $discount_one->limit = $object->get("limit");
            $discount_one->desc = $object->get("desc");
            $discount_one->type = $object->get("type");
            $discount_one->amount = $object->get("amount");
            $discount_one->offFor = $object->get("offFor");
            $discount_one->forSpecificUsers = $object->get("ForSpecificUsers");
            $discount_one->forSpecificTiers = $object->get("ForSpecificTiers");
            $discount_one->forMultipleChild = $object->get("ForMultipleChild");
            $discount_one->forSpecificActivities = $object->get("ForSpecificActivities");
            $discount_one->startDate = $object->get("startDate");
            $discount_one->neverExpires = $object->get("neverExpires");
            $discount_one->expireDate = $object->get("expireDate");
            $discount_one->status = $object->get("status");

            return $discount_one;

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return null;
        }

    }


    public static function deleteDiscount($discount_id)
    {
        try {

            $query = new ParseQuery("Discount");

            $school_one = $query->get($discount_id);

            $school_one->destroy();

            return true;

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return false;
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