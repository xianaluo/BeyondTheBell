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

class Mmessagebox extends CI_Model {

    var $message_id;
    var $from;
    var $status;
    var $deleted;
    var $simple;
    var $to;
    var $cc;
    var $bcc;
    var $subject;
    var $contents;
    var $createdAt;
    var $updatedAt;

    public function __construct()
    {
        parent::__construct();

    }

    public static function insertMessage(
        $from,
        $status,
        $simple,
        $to,
        $cc,
        $bcc,
        $subject,
        $contents)
    {


        try {

            $message = new ParseObject("MessageBox");

            $message->set("from", $from);
            $message->set("status", $status);
            $message->set("deleted", false);
            $message->set("simple", $simple);
            $message->set("to", $to);
            $message->set("cc", $cc);
            $message->set("bcc", $bcc);
            $message->set("subject", $subject);
            $message->set("contents", $contents);

            $message->save();

            $message_id = $message->getObjectId();

            return $message_id;

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return null;
        }
    }

    public static function getMessageslist($email, $PageNum, $RowsPerPage, $search_value)
    {
        try {

            if($search_value) {

                $query = new ParseQuery("MessageBox");
                $query->equalTo("from", $email);
                $query->equalTo("status", MSG_STATUS_SENT);
                $query->equalTo("deleted", false);

                $query->descending("updatedAt");

                $result = $query->find();

                $list = array();

                for ($i = 0; $i < count($result); $i++) {

                    $object = $result[$i];

                    $subject = $object->get("subject");
                    $contents = $object->get("contents");

                    $pos1 = strpos($subject, $search_value);
                    $pos2 = strpos($contents, $search_value);

                    if($pos1 === false && $pos2 === false) {
                        continue;
                    }

                    $message_one = new Mmessagebox();

                    $message_one->message_id = $object->getObjectId();
                    $message_one->from = $object->get("from");
                    $message_one->to = $object->get("to");
                    $message_one->cc = $object->get("cc");
                    $message_one->bcc = $object->get("bcc");
                    $message_one->subject = $object->get("subject");
                    $message_one->contents = $object->get("contents");
                    $message_one->simple = $object->get("simple");
                    $message_one->createdAt = $object->getCreatedAt();
                    $message_one->updatedAt = $object->getUpdatedAt();
                    $message_one->status = MSG_STATUS_SENT;
                    $message_one->deleted = false;


                    $list[] = $message_one;

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

                $query = new ParseQuery("MessageBox");
                $query->equalTo("from", $email);
                $query->equalTo("status", MSG_STATUS_SENT);
                $query->equalTo("deleted", false);

                $query->descending("updatedAt");

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

                    $message_one = new Mmessagebox();


                    $message_one->message_id = $object->getObjectId();
                    $message_one->from = $object->get("from");
                    $message_one->to = $object->get("to");
                    $message_one->cc = $object->get("cc");
                    $message_one->bcc = $object->get("bcc");
                    $message_one->subject = $object->get("subject");
                    $message_one->contents = $object->get("contents");
                    $message_one->simple = $object->get("simple");
                    $message_one->createdAt = $object->getCreatedAt();
                    $message_one->updatedAt = $object->getUpdatedAt();
                    $message_one->status = MSG_STATUS_SENT;
                    $message_one->deleted = false;


                    $list[] = $message_one;

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

    public static function getDraftslist($email, $PageNum, $RowsPerPage, $search_value)
    {

        try {

            if($search_value) {

                $query = new ParseQuery("MessageBox");
                $query->equalTo("from", $email);
                $query->equalTo("status", MSG_STATUS_DRAFT);
                $query->equalTo("deleted", false);

                $query->descending("updatedAt");

                $result = $query->find();

                $list = array();

                for ($i = 0; $i < count($result); $i++) {

                    $object = $result[$i];

                    $subject = $object->get("subject");
                    $contents = $object->get("contents");

                    $pos1 = strpos($subject, $search_value);
                    $pos2 = strpos($contents, $search_value);

                    if($pos1 === false && $pos2 === false) {
                        continue;
                    }

                    $message_one = new Mmessagebox();

                    $message_one->message_id = $object->getObjectId();
                    $message_one->from = $object->get("from");
                    $message_one->to = $object->get("to");
                    $message_one->cc = $object->get("cc");
                    $message_one->bcc = $object->get("bcc");
                    $message_one->subject = $object->get("subject");
                    $message_one->contents = $object->get("contents");
                    $message_one->simple = $object->get("simple");
                    $message_one->createdAt = $object->getCreatedAt();
                    $message_one->updatedAt = $object->getUpdatedAt();
                    $message_one->status = MSG_STATUS_DRAFT;
                    $message_one->deleted = false;


                    $list[] = $message_one;

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

                $query = new ParseQuery("MessageBox");
                $query->equalTo("from", $email);
                $query->equalTo("status", MSG_STATUS_DRAFT);
                $query->equalTo("deleted", false);

                $query->descending("updatedAt");

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

                    $message_one = new Mmessagebox();


                    $message_one->message_id = $object->getObjectId();
                    $message_one->from = $object->get("from");
                    $message_one->to = $object->get("to");
                    $message_one->cc = $object->get("cc");
                    $message_one->bcc = $object->get("bcc");
                    $message_one->subject = $object->get("subject");
                    $message_one->contents = $object->get("contents");
                    $message_one->simple = $object->get("simple");
                    $message_one->createdAt = $object->getCreatedAt();
                    $message_one->updatedAt = $object->getUpdatedAt();
                    $message_one->status = MSG_STATUS_DRAFT;
                    $message_one->deleted = false;


                    $list[] = $message_one;

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

    public static function getDraftsCount($email)
    {
        try {

            $query = new ParseQuery("MessageBox");
            $query->equalTo("from", $email);
            $query->equalTo("status", MSG_STATUS_DRAFT);
            $query->equalTo("deleted", false);
            $result = $query->count();

            return $result;

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return 0;
        }
    }

    public static function getTrashlist($email, $PageNum, $RowsPerPage, $search_value)
    {
        try {

            if($search_value) {

                $query = new ParseQuery("MessageBox");
                $query->equalTo("from", $email);
                $query->equalTo("deleted", true);

                $query->descending("updatedAt");

                $result = $query->find();

                $list = array();

                for ($i = 0; $i < count($result); $i++) {

                    $object = $result[$i];

                    $subject = $object->get("subject");
                    $contents = $object->get("contents");

                    $pos1 = strpos($subject, $search_value);
                    $pos2 = strpos($contents, $search_value);

                    if($pos1 === false && $pos2 === false) {
                        continue;
                    }

                    $message_one = new Mmessagebox();

                    $message_one->message_id = $object->getObjectId();
                    $message_one->from = $object->get("from");
                    $message_one->to = $object->get("to");
                    $message_one->cc = $object->get("cc");
                    $message_one->bcc = $object->get("bcc");
                    $message_one->subject = $object->get("subject");
                    $message_one->contents = $object->get("contents");
                    $message_one->simple = $object->get("simple");
                    $message_one->createdAt = $object->getCreatedAt();
                    $message_one->updatedAt = $object->getUpdatedAt();
                    $message_one->status = $object->get("status");
                    $message_one->deleted = true;


                    $list[] = $message_one;

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

                $query = new ParseQuery("MessageBox");
                $query->equalTo("from", $email);
                $query->equalTo("deleted", true);

                $query->descending("updatedAt");

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

                    $message_one = new Mmessagebox();


                    $message_one->message_id = $object->getObjectId();
                    $message_one->from = $object->get("from");
                    $message_one->to = $object->get("to");
                    $message_one->cc = $object->get("cc");
                    $message_one->bcc = $object->get("bcc");
                    $message_one->subject = $object->get("subject");
                    $message_one->contents = $object->get("contents");
                    $message_one->simple = $object->get("simple");
                    $message_one->createdAt = $object->getCreatedAt();
                    $message_one->updatedAt = $object->getUpdatedAt();
                    $message_one->status = $object->get("status");
                    $message_one->deleted = true;


                    $list[] = $message_one;

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
    public static function getTrashCount($email)
    {
        try {

            $query = new ParseQuery("MessageBox");
            $query->equalTo("from", $email);
            $query->equalTo("deleted", true);
            $result = $query->count();
            return $result;

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return 0;
        }
    }

    public static function getMessage($message_id)
    {
        try {
            $query = new ParseQuery("MessageBox");
            $object = $query->get($message_id);

            $message_one = new Mmessagebox();


            $message_one->message_id = $object->getObjectId();
            $message_one->from = $object->get("from");
            $message_one->to = $object->get("to");
            $message_one->cc = $object->get("cc");
            $message_one->bcc = $object->get("bcc");
            $message_one->subject = $object->get("subject");
            $message_one->contents = $object->get("contents");
            $message_one->simple = $object->get("simple");
            $message_one->status = $object->get("status");
            $message_one->deleted = $object->get("deleted");
            $message_one->createdAt = $object->getCreatedAt();
            $message_one->updatedAt = $object->getUpdatedAt();

            return $message_one;

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return null;
        }

    }

    public static function editMessage(
        $message_id,
        $from,
        $status,
        $simple,
        $to,
        $cc,
        $bcc,
        $subject,
        $contents)
    {



        try {

            $query = new ParseQuery("MessageBox");

            $message = $query->get($message_id);

            $message->set("from", $from);
            $message->set("status", $status);
            $message->set("deleted", false);
            $message->set("simple", $simple);
            $message->set("to", $to);
            $message->set("cc", $cc);
            $message->set("bcc", $bcc);
            $message->set("subject", $subject);
            $message->set("contents", $contents);


            $message->save();

            return true;

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return false;
        }
    }

    public static function deleteMessage($message_id, $real_delete)
    {
        try {
            $query = new ParseQuery("MessageBox");

            $message_one = $query->get($message_id);


            if($real_delete) {
                $message_one->destroy();
            } else {
                $message_one->set("deleted", true);
                $message_one->save();
            }

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