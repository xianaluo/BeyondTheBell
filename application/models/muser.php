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

define('USERTYPE_SYSADMIN', 'Sysadmin');
define('USERTYPE_STAFF',    'Staff');
define('USERTYPE_TEACHER',  'Teacher');
define('USERTYPE_PARENT',   'Parent');
define('USERTYPE_STUDENT',  'Student');

define('USERSTATUS_LIVE',       'Live');
define('USERSTATUS_INVITED',    'Invited');

class Muser extends CI_Model {

    var $user_id;
    var $username;
    var $password;
    var $userType;
    var $userStatus;
    var $firstName;
    var $middleInitial;
    var $lastName;
    var $emailAddress;
    var $phoneNumber;
    var $address1;
    var $address2;
    var $city;
    var $state;
    var $zipCode;
    var $rightsView;
    var $rightsAdd;
    var $rightsEdit;
    var $rightsDelete;
    var $rightsSchoolAdd;
    var $rightsSchoolEdit;
    var $rightsSchoolView;
    var $rightsSchoolDelete;
    var $rightsActivityAdd;
    var $rightsActivityEdit;
    var $rightsActivityView;
    var $rightsActivityDelete;
    var $rightsDiscountAdd;
    var $rightsDiscountEdit;
    var $rightsDiscountView;
    var $rightsDiscountDelete;
    var $rightsMsgAdd;
    var $rightsMsgEdit;
    var $rightsMsgView;
    var $rightsMsgDelete;
    var $rightsStudentAdd;
    var $rightsStudentEdit;
    var $rightsStudentView;
    var $rightsStudentDelete;
    var $rightsAttendanceAdd;
    var $rightsAttendanceEdit;
    var $rightsAttendanceView;
    var $rightsAttendanceDelete;
    var $rightsReportsAdd;
    var $rightsReportsEdit;
    var $rightsReportsView;
    var $rightsReportsDelete;
    var $rightsDaily;
    var $rightsChat;
    var $profilePicture;
    var $unreadMsg;
//    var $unreadMsgs;


    public function __construct()
    {
        parent::__construct();

    }

    public static function insertUser(
        $username,
        $password,
        $userType,
        $firstName,
        $middleInitial,
        $lastName,
        $emailAddress,
        $phoneNumber,
        $address1,
        $address2,
        $city,
        $state,
        $zipCode,
        $rightsView,
        $rightsAdd,
        $rightsEdit,
        $rightsDelete,
        $rightsSchoolAdd,
        $rightsSchoolEdit,
        $rightsSchoolView,
        $rightsSchoolDelete,
        $rightsActivityAdd,
        $rightsActivityEdit,
        $rightsActivityView,
        $rightsActivityDelete,
        $rightsDiscountAdd,
        $rightsDiscountEdit,
        $rightsDiscountView,
        $rightsDiscountDelete,
        $rightsMsgAdd,
        $rightsMsgEdit,
        $rightsMsgView,
        $rightsMsgDelete,
        $rightsStudentAdd,
        $rightsStudentEdit,
        $rightsStudentView,
        $rightsStudentDelete,
        $rightsAttendanceAdd,
        $rightsAttendanceEdit,
        $rightsAttendanceView,
        $rightsAttendanceDelete,
        $rightsReportsAdd,
        $rightsReportsEdit,
        $rightsReportsView,
        $rightsReportsDelete,
        $rightsDaily,
        $rightsChat,
        $profilePicture)
    {



        try {

            $user = new ParseObject("SystemUser");

            $user->set("username", $username);
            $user->set("password", $password);
            $user->set("email", $emailAddress);
            $user->set("usergroup", $userType);
            $user->set("userStatus", "Invited");
            $user->set("firstName", $firstName);
            $user->set("middleInitial", $middleInitial);
            $user->set("lastName", $lastName);
            $user->set("phoneNumber", $phoneNumber);
            $user->set("address1", $address1);
            $user->set("address2", $address2);
            $user->set("city", $city);
            $user->set("state", $state);
            $user->set("zipCode", $zipCode);
            $user->set("rights", $rightsView.'|'.
                                 $rightsAdd.'|'.
                                 $rightsEdit.'|'.
                                 $rightsDelete.'|'.
                                 $rightsSchoolAdd.'|'.
                                 $rightsSchoolEdit.'|'.
                                 $rightsSchoolView.'|'.
                                 $rightsSchoolDelete.'|'.
                                 $rightsActivityAdd.'|'.
                                 $rightsActivityEdit.'|'.
                                 $rightsActivityView.'|'.
                                 $rightsActivityDelete.'|'.
                                 $rightsDiscountAdd.'|'.
                                 $rightsDiscountEdit.'|'.
                                 $rightsDiscountView.'|'.
                                 $rightsDiscountDelete.'|'.
                                 $rightsMsgAdd.'|'.
                                 $rightsMsgEdit.'|'.
                                 $rightsMsgView.'|'.
                                 $rightsMsgDelete.'|'.
                                 $rightsStudentAdd.'|'.
                                 $rightsStudentEdit.'|'.
                                 $rightsStudentView.'|'.
                                 $rightsStudentDelete.'|'.
                                 $rightsAttendanceAdd.'|'.
                                 $rightsAttendanceEdit.'|'.
                                 $rightsAttendanceView.'|'.
                                 $rightsAttendanceDelete.'|'.
                                 $rightsReportsAdd.'|'.
                                 $rightsReportsEdit.'|'.
                                 $rightsReportsView.'|'.
                                 $rightsReportsDelete.'|'.
                                 $rightsDaily.'|'.
                                 $rightsChat
                                 );
            $user->set("profilePicture", $profilePicture);

            $user->save();

            $user_id = $user->getObjectId();

            return $user_id;

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return null;
        }
    }



    public static function getUserlist()
    {
        try {
            $query = new ParseQuery("SystemUser");


            $query->ascending("username");

            $result = $query->find();

            $userlist = array();

            for ($i = 0; $i < count($result); $i++) {

                $object = $result[$i];

                $uesr_one = new Muser();

                $uesr_one->user_id = $object->getObjectId();
                $uesr_one->username = $object->get("username");
                $uesr_one->userType = $object->get("usergroup");
                $uesr_one->userStatus = $object->get("userStatus");
                $uesr_one->firstName = $object->get("firstName");
                $uesr_one->middleInitial = $object->get("middleInitial");
                $uesr_one->lastName = $object->get("lastName");
                $uesr_one->emailAddress = $object->get("email");
                $uesr_one->phoneNumber = $object->get("phoneNumber");
                $uesr_one->address1 = $object->get("address1");
                $uesr_one->address2 = $object->get("address2");
                $uesr_one->city = $object->get("city");
                $uesr_one->state = $object->get("state");
                $uesr_one->zipCode = $object->get("zipCode");
                $uesr_one->profilePicture = $object->get("profilePicture");

                $rights = $object->get("rights");
                $arr_rights = explode('|', $rights);

                $uesr_one->rightsView = $arr_rights[0];
                $uesr_one->rightsAdd = $arr_rights[1];
                $uesr_one->rightsEdit = $arr_rights[2];
                $uesr_one->rightsDelete = $arr_rights[3];
                $uesr_one->rightsSchoolAdd = $arr_rights[4];
                $uesr_one->rightsSchoolEdit = $arr_rights[5];
                $uesr_one->rightsSchoolView = $arr_rights[6];
                $uesr_one->rightsSchoolDelete = $arr_rights[7];
                $uesr_one->rightsActivityAdd = $arr_rights[8];
                $uesr_one->rightsActivityEdit = $arr_rights[9];
                $uesr_one->rightsActivityView = $arr_rights[10];
                $uesr_one->rightsActivityDelete = $arr_rights[11];
                $uesr_one->rightsDiscountAdd = $arr_rights[12];
                $uesr_one->rightsDiscountEdit = $arr_rights[13];
                $uesr_one->rightsDiscountView = $arr_rights[14];
                $uesr_one->rightsDiscountDelete = $arr_rights[15];
                $uesr_one->rightsMsgAdd = $arr_rights[16];
                $uesr_one->rightsMsgEdit = $arr_rights[17];
                $uesr_one->rightsMsgView = $arr_rights[18];
                $uesr_one->rightsMsgDelete = $arr_rights[19];
                $uesr_one->rightsStudentAdd = $arr_rights[20];
                $uesr_one->rightsStudentEdit = $arr_rights[21];
                $uesr_one->rightsStudentView = $arr_rights[22];
                $uesr_one->rightsStudentDelete = $arr_rights[23];
                $uesr_one->rightsAttendanceAdd = $arr_rights[24];
                $uesr_one->rightsAttendanceEdit = $arr_rights[25];
                $uesr_one->rightsAttendanceView = $arr_rights[26];
                $uesr_one->rightsAttendanceDelete = $arr_rights[27];
                $uesr_one->rightsReportsAdd = $arr_rights[28];
                $uesr_one->rightsReportsEdit = $arr_rights[29];
                $uesr_one->rightsReportsView = $arr_rights[30];
                $uesr_one->rightsReportsDelete = $arr_rights[31];
                $uesr_one->rightsDaily = $arr_rights[32];
                $uesr_one->rightsChat = $arr_rights[33];
                
                $userlist[] = $uesr_one;

            }

            return $userlist;
        } catch (ParseException $ex) {
            // error is a ParseException object with an error code and message.
            return null;
        }
    }

    public static function getUserNamelist()
    {
        try {
            $query = new ParseQuery("SystemUser");

            $query->ascending("username");

            $result = $query->find();

            $userlist = array();

            for ($i = 0; $i < count($result); $i++) {

                $object = $result[$i];

                $uesr_one = new Muser();

                $uesr_one->user_id = $object->getObjectId();
                $uesr_one->username = $object->get("username");

                $userlist[] = $uesr_one;

            }

            return $userlist;

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return null;
        }
    }

    public static function getParentNamelist()
    {
        try {
            $query = new ParseQuery("SystemUser");

            $query->equalTo("usergroup", USERTYPE_PARENT);

            $query->ascending("username");

            $result = $query->find();

            $userlist = array();

            for ($i = 0; $i < count($result); $i++) {

                $object = $result[$i];

                $uesr_one = new Muser();

                $uesr_one->user_id = $object->getObjectId();
                $uesr_one->username = $object->get("username");

                $userlist[] = $uesr_one;

            }

            return $userlist;

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return null;
        }
    }

    public static function getUser($user_id)
    {
        try {
            $query = new ParseQuery("SystemUser");
            $object = $query->get($user_id);

            $uesr_one = new Muser();

            $uesr_one->user_id = $object->getObjectId();
            $uesr_one->username = $object->get("username");
            $uesr_one->userType = $object->get("usergroup");
            $uesr_one->userStatus = $object->get("userStatus");
            $uesr_one->firstName = $object->get("firstName");
            $uesr_one->middleInitial = $object->get("middleInitial");
            $uesr_one->lastName = $object->get("lastName");
            $uesr_one->emailAddress = $object->get("email");
            $uesr_one->phoneNumber = $object->get("phoneNumber");
            $uesr_one->address1 = $object->get("address1");
            $uesr_one->address2 = $object->get("address2");
            $uesr_one->city = $object->get("city");
            $uesr_one->state = $object->get("state");
            $uesr_one->zipCode = $object->get("zipCode");
            $uesr_one->profilePicture = $object->get("profilePicture");

            $rights = $object->get("rights");
            $arr_rights = explode('|', $rights);

            $uesr_one->rightsView = $arr_rights[0];
            $uesr_one->rightsAdd = $arr_rights[1];
            $uesr_one->rightsEdit = $arr_rights[2];
            $uesr_one->rightsDelete = $arr_rights[3];
            $uesr_one->rightsSchoolAdd = $arr_rights[4];
            $uesr_one->rightsSchoolEdit = $arr_rights[5];
            $uesr_one->rightsSchoolView = $arr_rights[6];
            $uesr_one->rightsSchoolDelete = $arr_rights[7];
            $uesr_one->rightsActivityAdd = $arr_rights[8];
            $uesr_one->rightsActivityEdit = $arr_rights[9];
            $uesr_one->rightsActivityView = $arr_rights[10];
            $uesr_one->rightsActivityDelete = $arr_rights[11];
            $uesr_one->rightsDiscountAdd = $arr_rights[12];
            $uesr_one->rightsDiscountEdit = $arr_rights[13];
            $uesr_one->rightsDiscountView = $arr_rights[14];
            $uesr_one->rightsDiscountDelete = $arr_rights[15];
            $uesr_one->rightsMsgAdd = $arr_rights[16];
            $uesr_one->rightsMsgEdit = $arr_rights[17];
            $uesr_one->rightsMsgView = $arr_rights[18];
            $uesr_one->rightsMsgDelete = $arr_rights[19];
            $uesr_one->rightsStudentAdd = $arr_rights[20];
            $uesr_one->rightsStudentEdit = $arr_rights[21];
            $uesr_one->rightsStudentView = $arr_rights[22];
            $uesr_one->rightsStudentDelete = $arr_rights[23];
            $uesr_one->rightsAttendanceAdd = $arr_rights[24];
            $uesr_one->rightsAttendanceEdit = $arr_rights[25];
            $uesr_one->rightsAttendanceView = $arr_rights[26];
            $uesr_one->rightsAttendanceDelete = $arr_rights[27];
            $uesr_one->rightsReportsAdd = $arr_rights[28];
            $uesr_one->rightsReportsEdit = $arr_rights[29];
            $uesr_one->rightsReportsView = $arr_rights[30];
            $uesr_one->rightsReportsDelete = $arr_rights[31];
            $uesr_one->rightsDaily = $arr_rights[32];
            $uesr_one->rightsChat = $arr_rights[33];

            return $uesr_one;
        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return null;
        }

    }

    public static function editUser(
        $user_id,
        $username,
        $userType,
        $firstName,
        $middleInitial,
        $lastName,
        $emailAddress,
        $phoneNumber,
        $address1,
        $address2,
        $city,
        $state,
        $zipCode,
        $rightsView,
        $rightsAdd,
        $rightsEdit,
        $rightsDelete,
        $rightsSchoolAdd,
        $rightsSchoolEdit,
        $rightsSchoolView,
        $rightsSchoolDelete,
        $rightsActivityAdd,
        $rightsActivityEdit,
        $rightsActivityView,
        $rightsActivityDelete,
        $rightsDiscountAdd,
        $rightsDiscountEdit,
        $rightsDiscountView,
        $rightsDiscountDelete,
        $rightsMsgAdd,
        $rightsMsgEdit,
        $rightsMsgView,
        $rightsMsgDelete,
        $rightsStudentAdd,
        $rightsStudentEdit,
        $rightsStudentView,
        $rightsStudentDelete,
        $rightsAttendanceAdd,
        $rightsAttendanceEdit,
        $rightsAttendanceView,
        $rightsAttendanceDelete,
        $rightsReportsAdd,
        $rightsReportsEdit,
        $rightsReportsView,
        $rightsReportsDelete,
        $rightsDaily,
        $rightsChat,
        $profilePicture)
    {



        try {

            $query = new ParseQuery("SystemUser");

            $user_one = $query->get($user_id);

            $user_one->set("username", $username);
            $user_one->set("email", $emailAddress);
            $user_one->set("usergroup", $userType);
            $user_one->set("firstName", $firstName);
            $user_one->set("middleInitial", $middleInitial);
            $user_one->set("lastName", $lastName);
            $user_one->set("phoneNumber", $phoneNumber);
            $user_one->set("address1", $address1);
            $user_one->set("address2", $address2);
            $user_one->set("city", $city);
            $user_one->set("state", $state);
            $user_one->set("zipCode", $zipCode);
            $user_one->set("rights", $rightsView.'|'.
                                 $rightsAdd.'|'.
                                 $rightsEdit.'|'.
                                 $rightsDelete.'|'.
                                 $rightsSchoolAdd.'|'.
                                 $rightsSchoolEdit.'|'.
                                 $rightsSchoolView.'|'.
                                 $rightsSchoolDelete.'|'.
                                 $rightsActivityAdd.'|'.
                                 $rightsActivityEdit.'|'.
                                 $rightsActivityView.'|'.
                                 $rightsActivityDelete.'|'.
                                 $rightsDiscountAdd.'|'.
                                 $rightsDiscountEdit.'|'.
                                 $rightsDiscountView.'|'.
                                 $rightsDiscountDelete.'|'.
                                 $rightsMsgAdd.'|'.
                                 $rightsMsgEdit.'|'.
                                 $rightsMsgView.'|'.
                                 $rightsMsgDelete.'|'.
                                 $rightsStudentAdd.'|'.
                                 $rightsStudentEdit.'|'.
                                 $rightsStudentView.'|'.
                                 $rightsStudentDelete.'|'.
                                 $rightsAttendanceAdd.'|'.
                                 $rightsAttendanceEdit.'|'.
                                 $rightsAttendanceView.'|'.
                                 $rightsAttendanceDelete.'|'.
                                 $rightsReportsAdd.'|'.
                                 $rightsReportsEdit.'|'.
                                 $rightsReportsView.'|'.
                                 $rightsReportsDelete.'|'.
                                 $rightsDaily.'|'.
                                 $rightsChat
            );
            
            if($profilePicture) {
                $user_one->set("profilePicture", $profilePicture);
            }

            $user_one->save();

            return true;

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return false;
        }
    }

    public static function editProfile(
        $user_id,
        $firstName,
        $middleInitial,
        $lastName,
        $phoneNumber,
        $address1,
        $address2,
        $city,
        $state,
        $zipCode,
        $profilePicture)
    {

        try {

            $query = new ParseQuery("SystemUser");

            $user_one = $query->get($user_id);

            $user_one->set("firstName", $firstName);
            $user_one->set("middleInitial", $middleInitial);
            $user_one->set("lastName", $lastName);
            $user_one->set("phoneNumber", $phoneNumber);
            $user_one->set("address1", $address1);
            $user_one->set("address2", $address2);
            $user_one->set("city", $city);
            $user_one->set("state", $state);
            $user_one->set("zipCode", $zipCode);

            if($profilePicture) {
                $user_one->set("profilePicture", $profilePicture);
            }

            $user_one->save();

            return true;

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return false;
        }
    }

    public static function updateAddress(
        $user_id,
        $phoneNumber,
        $address1,
        $address2,
        $city,
        $state,
        $zipCode)
    {

        try {

            $query = new ParseQuery("SystemUser");

            $user_one = $query->get($user_id);

            $user_one->set("phoneNumber", $phoneNumber);
            $user_one->set("address1", $address1);
            $user_one->set("address2", $address2);
            $user_one->set("city", $city);
            $user_one->set("state", $state);
            $user_one->set("zipCode", $zipCode);


            $user_one->save();

            return true;

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return false;
        }
    }

    public static function deleteUser($user_id)
    {
        try {
            $query = new ParseQuery("SystemUser");

            $user_one = $query->get($user_id);

            $user_one->destroy();

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
        }

    }

    public static function findAccount($emailAddress)
    {
        try {

            $query = new ParseQuery("SystemUser");
            $query->equalTo("email", $emailAddress);
            $results = $query->find();

            if (count($results) > 0) {

                $object = $results[0];

                $uesr_one = new Muser();

                $uesr_one->user_id = $object->getObjectId();
                $uesr_one->username = $object->get("username");
                $uesr_one->userType = $object->get("usergroup");
                $uesr_one->userStatus = $object->get("userStatus");
                $uesr_one->firstName = $object->get("firstName");
                $uesr_one->middleInitial = $object->get("middleInitial");
                $uesr_one->lastName = $object->get("lastName");
                $uesr_one->emailAddress = $object->get("email");
                $uesr_one->phoneNumber = $object->get("phoneNumber");
                $uesr_one->address1 = $object->get("address1");
                $uesr_one->address2 = $object->get("address2");
                $uesr_one->city = $object->get("city");
                $uesr_one->state = $object->get("state");
                $uesr_one->zipCode = $object->get("zipCode");
                $uesr_one->profilePicture = $object->get("profilePicture");

                $rights = $object->get("rights");
                $arr_rights = explode('|', $rights);

                $uesr_one->rightsView = $arr_rights[0];
                $uesr_one->rightsAdd = $arr_rights[1];
                $uesr_one->rightsEdit = $arr_rights[2];
                $uesr_one->rightsDelete = $arr_rights[3];
                $uesr_one->rightsSchoolAdd = $arr_rights[4];
                $uesr_one->rightsSchoolEdit = $arr_rights[5];
                $uesr_one->rightsSchoolView = $arr_rights[6];
                $uesr_one->rightsSchoolDelete = $arr_rights[7];
                $uesr_one->rightsActivityAdd = $arr_rights[8];
                $uesr_one->rightsActivityEdit = $arr_rights[9];
                $uesr_one->rightsActivityView = $arr_rights[10];
                $uesr_one->rightsActivityDelete = $arr_rights[11];
                $uesr_one->rightsDiscountAdd = $arr_rights[12];
                $uesr_one->rightsDiscountEdit = $arr_rights[13];
                $uesr_one->rightsDiscountView = $arr_rights[14];
                $uesr_one->rightsDiscountDelete = $arr_rights[15];
                $uesr_one->rightsMsgAdd = $arr_rights[16];
                $uesr_one->rightsMsgEdit = $arr_rights[17];
                $uesr_one->rightsMsgView = $arr_rights[18];
                $uesr_one->rightsMsgDelete = $arr_rights[19];
                $uesr_one->rightsStudentAdd = $arr_rights[20];
                $uesr_one->rightsStudentEdit = $arr_rights[21];
                $uesr_one->rightsStudentView = $arr_rights[22];
                $uesr_one->rightsStudentDelete = $arr_rights[23];
                $uesr_one->rightsAttendanceAdd = $arr_rights[24];
                $uesr_one->rightsAttendanceEdit = $arr_rights[25];
                $uesr_one->rightsAttendanceView = $arr_rights[26];
                $uesr_one->rightsAttendanceDelete = $arr_rights[27];
                $uesr_one->rightsReportsAdd = $arr_rights[28];
                $uesr_one->rightsReportsEdit = $arr_rights[29];
                $uesr_one->rightsReportsView = $arr_rights[30];
                $uesr_one->rightsReportsDelete = $arr_rights[31];
                $uesr_one->rightsDaily = $arr_rights[32];
                $uesr_one->rightsChat = $arr_rights[33];

                return $uesr_one;
            }

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
        }

        return null;

    }

    public static function checkToChangeEmail($user_id, $new_email)
    {
        try {

            $query = new ParseQuery("SystemUser");
            $object = $query->get($user_id);

            if($object->get("email") != $new_email) {

                $query = new ParseQuery("SystemUser");
                $query->equalTo("email", $new_email);
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

    public static function resetPassword($emailAddress, $password)
    {
        try {

            $query = new ParseQuery("SystemUser");
            $query->equalTo("email", $emailAddress);
            $results = $query->find();

            if (count($results) > 0) {

                $object = $results[0];

                $object->set("password", $password);
                $object->set("userStatus", "Live");
                $object->save();

                return true;
            }

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.

            return false;
        }
    }

    public static function login($emailAddress, $password)
    {
        try {


            $query = new ParseQuery("SystemUser");
            $query->equalTo("email", $emailAddress);
            $query->equalTo("password", $password);
            $query->equalTo("userStatus", "Live");
            $query->containedIn("usergroup", [USERTYPE_SYSADMIN, USERTYPE_STAFF, USERTYPE_TEACHER]);

            $results = $query->find();

            if (count($results) > 0) {

                $object = $results[0];

                $uesr_one = new Muser();

                $uesr_one->user_id = $object->getObjectId();
                $uesr_one->username = $object->get("username");
                $uesr_one->userType = $object->get("usergroup");
                $uesr_one->userStatus = $object->get("userStatus");
                $uesr_one->firstName = $object->get("firstName");
                $uesr_one->middleInitial = $object->get("middleInitial");
                $uesr_one->lastName = $object->get("lastName");
                $uesr_one->emailAddress = $object->get("email");
                $uesr_one->phoneNumber = $object->get("phoneNumber");
                $uesr_one->address1 = $object->get("address1");
                $uesr_one->address2 = $object->get("address2");
                $uesr_one->city = $object->get("city");
                $uesr_one->state = $object->get("state");
                $uesr_one->zipCode = $object->get("zipCode");
                $uesr_one->profilePicture = $object->get("profilePicture");

                $rights = $object->get("rights");
                $arr_rights = explode('|', $rights);

                $uesr_one->rightsView = $arr_rights[0];
                $uesr_one->rightsAdd = $arr_rights[1];
                $uesr_one->rightsEdit = $arr_rights[2];
                $uesr_one->rightsDelete = $arr_rights[3];
                $uesr_one->rightsSchoolAdd = $arr_rights[4];
                $uesr_one->rightsSchoolEdit = $arr_rights[5];
                $uesr_one->rightsSchoolView = $arr_rights[6];
                $uesr_one->rightsSchoolDelete = $arr_rights[7];
                $uesr_one->rightsActivityAdd = $arr_rights[8];
                $uesr_one->rightsActivityEdit = $arr_rights[9];
                $uesr_one->rightsActivityView = $arr_rights[10];
                $uesr_one->rightsActivityDelete = $arr_rights[11];
                $uesr_one->rightsDiscountAdd = $arr_rights[12];
                $uesr_one->rightsDiscountEdit = $arr_rights[13];
                $uesr_one->rightsDiscountView = $arr_rights[14];
                $uesr_one->rightsDiscountDelete = $arr_rights[15];
                $uesr_one->rightsMsgAdd = $arr_rights[16];
                $uesr_one->rightsMsgEdit = $arr_rights[17];
                $uesr_one->rightsMsgView = $arr_rights[18];
                $uesr_one->rightsMsgDelete = $arr_rights[19];
                $uesr_one->rightsStudentAdd = $arr_rights[20];
                $uesr_one->rightsStudentEdit = $arr_rights[21];
                $uesr_one->rightsStudentView = $arr_rights[22];
                $uesr_one->rightsStudentDelete = $arr_rights[23];
                $uesr_one->rightsAttendanceAdd = $arr_rights[24];
                $uesr_one->rightsAttendanceEdit = $arr_rights[25];
                $uesr_one->rightsAttendanceView = $arr_rights[26];
                $uesr_one->rightsAttendanceDelete = $arr_rights[27];
                $uesr_one->rightsReportsAdd = $arr_rights[28];
                $uesr_one->rightsReportsEdit = $arr_rights[29];
                $uesr_one->rightsReportsView = $arr_rights[30];
                $uesr_one->rightsReportsDelete = $arr_rights[31];
                $uesr_one->rightsDaily = $arr_rights[32];
                $uesr_one->rightsChat = $arr_rights[33];

                return $uesr_one;

            }

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.

            return null;
        }
    }

    public static function loginParents($emailAddress, $password)
    {
        try {

            $query = new ParseQuery("SystemUser");
            $query->equalTo("email", $emailAddress);
            $query->equalTo("password", $password);
            $query->equalTo("usergroup", USERTYPE_PARENT);
            $query->equalTo("userStatus", "Live");

            $results = $query->find();

            if (count($results) > 0) {

                $object = $results[0];

                $uesr_one = new Muser();

                $uesr_one->user_id = $object->getObjectId();
                $uesr_one->username = $object->get("username");
                $uesr_one->userType = $object->get("usergroup");
                $uesr_one->userStatus = $object->get("userStatus");
                $uesr_one->firstName = $object->get("firstName");
                $uesr_one->middleInitial = $object->get("middleInitial");
                $uesr_one->lastName = $object->get("lastName");
                $uesr_one->emailAddress = $object->get("email");
                $uesr_one->phoneNumber = $object->get("phoneNumber");
                $uesr_one->address1 = $object->get("address1");
                $uesr_one->address2 = $object->get("address2");
                $uesr_one->city = $object->get("city");
                $uesr_one->state = $object->get("state");
                $uesr_one->zipCode = $object->get("zipCode");
                $uesr_one->profilePicture = $object->get("profilePicture");

                $rights = $object->get("rights");
                $arr_rights = explode('|', $rights);

                $uesr_one->rightsView = $arr_rights[0];
                $uesr_one->rightsAdd = $arr_rights[1];
                $uesr_one->rightsEdit = $arr_rights[2];
                $uesr_one->rightsDelete = $arr_rights[3];
                $uesr_one->rightsSchoolAdd = $arr_rights[4];
                $uesr_one->rightsSchoolEdit = $arr_rights[5];
                $uesr_one->rightsSchoolView = $arr_rights[6];
                $uesr_one->rightsSchoolDelete = $arr_rights[7];
                $uesr_one->rightsActivityAdd = $arr_rights[8];
                $uesr_one->rightsActivityEdit = $arr_rights[9];
                $uesr_one->rightsActivityView = $arr_rights[10];
                $uesr_one->rightsActivityDelete = $arr_rights[11];
                $uesr_one->rightsDiscountAdd = $arr_rights[12];
                $uesr_one->rightsDiscountEdit = $arr_rights[13];
                $uesr_one->rightsDiscountView = $arr_rights[14];
                $uesr_one->rightsDiscountDelete = $arr_rights[15];
                $uesr_one->rightsMsgAdd = $arr_rights[16];
                $uesr_one->rightsMsgEdit = $arr_rights[17];
                $uesr_one->rightsMsgView = $arr_rights[18];
                $uesr_one->rightsMsgDelete = $arr_rights[19];
                $uesr_one->rightsStudentAdd = $arr_rights[20];
                $uesr_one->rightsStudentEdit = $arr_rights[21];
                $uesr_one->rightsStudentView = $arr_rights[22];
                $uesr_one->rightsStudentDelete = $arr_rights[23];
                $uesr_one->rightsAttendanceAdd = $arr_rights[24];
                $uesr_one->rightsAttendanceEdit = $arr_rights[25];
                $uesr_one->rightsAttendanceView = $arr_rights[26];
                $uesr_one->rightsAttendanceDelete = $arr_rights[27];
                $uesr_one->rightsReportsAdd = $arr_rights[28];
                $uesr_one->rightsReportsEdit = $arr_rights[29];
                $uesr_one->rightsReportsView = $arr_rights[30];
                $uesr_one->rightsReportsDelete = $arr_rights[31];
                $uesr_one->rightsDaily = $arr_rights[32];
                $uesr_one->rightsChat = $arr_rights[33];

                return $uesr_one;

            }

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.

            return null;
        }
    }


    public static function insertParent(
        $username,
        $firstName,
        $middleInitial,
        $lastName,
        $emailAddress,
        $password)
    {
        try {

            $user = new ParseObject("SystemUser");

            $user->set("username", $username);
            $user->set("firstName", $firstName);
            $user->set("middleInitial", $middleInitial);
            $user->set("lastName", $lastName);
            $user->set("email", $emailAddress);
            $user->set("password", $password);
            $user->set("usergroup", USERTYPE_PARENT);
            $user->set("userStatus", USERSTATUS_LIVE);

            $user->save();

            $user_id = $user->getObjectId();

            return $user_id;

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return null;
        }
    }

    public static function getStripeCustomerID($user_id) {

        try {

            $query = new ParseQuery("SystemUser");

            $user_one = $query->get($user_id);

            return $user_one->get("stripe_customer_id");

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return null;
        } catch (Exception $ex2) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return null;
        }
    }


    public static function updateStripeCustomerID($user_id, $stripe_customer_id) {

        try {

            $query = new ParseQuery("SystemUser");

            $user_one = $query->get($user_id);

            $user_one->set("stripe_customer_id", $stripe_customer_id);

            $user_one->save();

            return true;

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return false;
        } catch (Exception $ex2) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return false;
        }

    }

}