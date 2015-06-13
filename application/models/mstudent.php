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


define('STUD_STATUS_APPROVED',    'Approved');
define('STUD_STATUS_NOTAPPROVED', 'Not Approved');


class Mstudent extends CI_Model {

    var $parent_id;
    var $student_id;
    var $schoolYear;
    var $activity;
    var $firstName;
    var $middleInitial;
    var $lastName;
    var $birthday;
    var $mf;
    var $gradeFall;
    var $address1;
    var $address2;
    var $city;
    var $state;
    var $zipCode;
    var $primaryPhone;
    var $motherGaurdian;
    var $motherEmployer;
    var $motherWorkPhone;
    var $motherAltPhone;
    var $fatherGaurdian;
    var $fatherEmployer;
    var $fatherWorkPhone;
    var $fatherAltPhone;
    var $otherGaurdian;
    var $otherEmployer;
    var $otherWorkPhone;
    var $otherAltPhone;
    var $ethnicity;
    var $consentPhoto;
    var $consentGrade;
    var $consentPerson;
    var $emergenciesDoctor;
    var $doctorPhone;
    var $emergenciesHospital;
    var $emergenciesDentist;
    var $dentistPhone;
    var $medication;
    var $medicationYN;
    var $allergiesNeeds;
    var $emergenciesContactPerson;
    var $emergenciesContactNumber;
    var $signature;
    var $signDate;
    var $status;
    var $invoice_id;
    var $invoice_status;
    var $fee;
    var $reg_fee;

    public static $STATUS_ARR;

    public function __construct()
    {
        parent::__construct();

    }

    public static function getStatuslist() {

        return array(STUD_STATUS_NOTAPPROVED, STUD_STATUS_APPROVED);

    }

    public static function insertStudent(
        $parent_id,
        $schoolYear,
        $activity,
        $firstName,
        $middleInitial,
        $lastName,
        $birthday,
        $mf,
        $gradeFall,
        $address1,
        $address2,
        $city,
        $state,
        $zipCode,
        $primaryPhone,
        $motherGaurdian,
        $motherEmployer,
        $motherWorkPhone,
        $motherAltPhone,
        $fatherGaurdian,
        $fatherEmployer,
        $fatherWorkPhone,
        $fatherAltPhone,
        $otherGaurdian,
        $otherEmployer,
        $otherWorkPhone,
        $otherAltPhone,
        $ethnicity,
        $consentPhoto,
        $consentGrade,
        $consentPerson,
        $emergenciesDoctor,
        $doctorPhone,
        $emergenciesHospital,
        $emergenciesDentist,
        $dentistPhone,
        $medication,
        $medicationYN,
        $allergiesNeeds,
        $emergenciesContactPerson,
        $emergenciesContactNumber,
        $sig_base64,
        $signDate,
        $status)
    {

        try {

            $student = new ParseObject("Student");

            $student->set("parent_id", $parent_id);
            $student->set("schoolYear", $schoolYear);
            $student->set("activity", $activity);
            $student->set("firstName", $firstName);
            $student->set("middleInitial", $middleInitial);
            $student->set("lastName", $lastName);
            $student->set("birthday", DateTime::createFromFormat('m/d/Y', $birthday));
            $student->set("mf", self::string_boolean($mf));
            $student->set("gradeFall", $gradeFall);
            $student->set("address1", $address1);
            $student->set("address2", $address2);
            $student->set("city", $city);
            $student->set("state", $state);
            $student->set("zipCode", $zipCode);
            $student->set("primaryPhone", $primaryPhone);
            $student->set("motherGaurdian", $motherGaurdian);
            $student->set("motherEmployer", $motherEmployer);
            $student->set("motherWorkPhone", $motherWorkPhone);
            $student->set("motherAltPhone", $motherAltPhone);
            $student->set("fatherGaurdian", $fatherGaurdian);
            $student->set("fatherEmployer", $fatherEmployer);
            $student->set("fatherWorkPhone", $fatherWorkPhone);
            $student->set("fatherAltPhone", $fatherAltPhone);
            $student->set("otherGaurdian", $otherGaurdian);
            $student->set("otherEmployer", $otherEmployer);
            $student->set("otherWorkPhone", $otherWorkPhone);
            $student->set("otherAltPhone", $otherAltPhone);
            $student->setArray("ethnicity", $ethnicity);
            $student->set("consentPhoto", self::string_boolean($consentPhoto));
            $student->set("consentGrade", self::string_boolean($consentGrade));
            $student->set("consentPerson", $consentPerson);
            $student->set("emergenciesDoctor", $emergenciesDoctor);
            $student->set("doctorPhone", $doctorPhone);
            $student->set("emergenciesHospital", $emergenciesHospital);
            $student->set("emergenciesDentist", $emergenciesDentist);
            $student->set("dentistPhone", $dentistPhone);
            $student->set("medication", $medication);
            $student->set("medicationYN", self::string_boolean($medicationYN));
            $student->set("allergiesNeeds", $allergiesNeeds);
            $student->set("emergenciesContactPerson", $emergenciesContactPerson);
            $student->set("emergenciesContactNumber", $emergenciesContactNumber);
            $student->set("signature", $sig_base64);
            $student->set("signDate", DateTime::createFromFormat('m/d/Y', $signDate));
            $student->set("status", $status);
            $student->set("invoice_id", "");

            $student->save();

            $student_id = $student->getObjectId();


            return $student_id;

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return null;
        }
    }

    public static function updateStudent(
        $student_id,
        $schoolYear,
        $activity,
        $firstName,
        $middleInitial,
        $lastName,
        $birthday,
        $mf,
        $gradeFall,
        $address1,
        $address2,
        $city,
        $state,
        $zipCode,
        $primaryPhone,
        $motherGaurdian,
        $motherEmployer,
        $motherWorkPhone,
        $motherAltPhone,
        $fatherGaurdian,
        $fatherEmployer,
        $fatherWorkPhone,
        $fatherAltPhone,
        $otherGaurdian,
        $otherEmployer,
        $otherWorkPhone,
        $otherAltPhone,
        $ethnicity,
        $consentPhoto,
        $consentGrade,
        $consentPerson,
        $emergenciesDoctor,
        $doctorPhone,
        $emergenciesHospital,
        $emergenciesDentist,
        $dentistPhone,
        $medication,
        $medicationYN,
        $allergiesNeeds,
        $emergenciesContactPerson,
        $emergenciesContactNumber,
        $signDate,
        $status)
    {



        try {

            $query = new ParseQuery("Student");

            $student = $query->get($student_id);

            $student->set("schoolYear", $schoolYear);
            $student->set("activity", $activity);
            $student->set("firstName", $firstName);
            $student->set("middleInitial", $middleInitial);
            $student->set("lastName", $lastName);
            $student->set("birthday", DateTime::createFromFormat('m/d/Y', $birthday));
            $student->set("mf", self::string_boolean($mf));
            $student->set("gradeFall", $gradeFall);
            $student->set("address1", $address1);
            $student->set("address2", $address2);
            $student->set("city", $city);
            $student->set("state", $state);
            $student->set("zipCode", $zipCode);
            $student->set("primaryPhone", $primaryPhone);
            $student->set("motherGaurdian", $motherGaurdian);
            $student->set("motherEmployer", $motherEmployer);
            $student->set("motherWorkPhone", $motherWorkPhone);
            $student->set("motherAltPhone", $motherAltPhone);
            $student->set("fatherGaurdian", $fatherGaurdian);
            $student->set("fatherEmployer", $fatherEmployer);
            $student->set("fatherWorkPhone", $fatherWorkPhone);
            $student->set("fatherAltPhone", $fatherAltPhone);
            $student->set("otherGaurdian", $otherGaurdian);
            $student->set("otherEmployer", $otherEmployer);
            $student->set("otherWorkPhone", $otherWorkPhone);
            $student->set("otherAltPhone", $otherAltPhone);
            $student->setArray("ethnicity", $ethnicity);
            $student->set("consentPhoto", self::string_boolean($consentPhoto));
            $student->set("consentGrade", self::string_boolean($consentGrade));
            $student->set("consentPerson", $consentPerson);
            $student->set("emergenciesDoctor", $emergenciesDoctor);
            $student->set("doctorPhone", $doctorPhone);
            $student->set("emergenciesHospital", $emergenciesHospital);
            $student->set("emergenciesDentist", $emergenciesDentist);
            $student->set("dentistPhone", $dentistPhone);
            $student->set("medication", $medication);
            $student->set("medicationYN", self::string_boolean($medicationYN));
            $student->set("allergiesNeeds", $allergiesNeeds);
            $student->set("emergenciesContactPerson", $emergenciesContactPerson);
            $student->set("emergenciesContactNumber", $emergenciesContactNumber);
            $student->set("signDate", DateTime::createFromFormat('m/d/Y', $signDate));
            $student->set("status", $status);

            $student->save();

            return true;

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return false;
        }
    }

    public static function string_boolean($string){
        return ( mb_strtoupper( trim( $string)) === mb_strtoupper ("true")) ? true : false;
    }

    public static function getStudentlist($parent_id = "")
    {
        try {
            $query = new ParseQuery("Student");
            if($parent_id)
                $query->equalTo("parent_id", $parent_id);
            $result = $query->find();

            $list = array();

            for ($i = 0; $i < count($result); $i++) {

                $object = $result[$i];

                $student_one = new Mstudent();

                $student_one->student_id = $object->getObjectId();
                $student_one->schoolYear = $object->get("schoolYear");
                $student_one->activity = $object->get("activity");
                $student_one->firstName = $object->get("firstName");
                $student_one->middleInitial = $object->get("middleInitial");
                $student_one->lastName = $object->get("lastName");
                $student_one->birthday = $object->get("birthday");
                $student_one->gradeFall = $object->get("gradeFall");
                $student_one->status = $object->get("status");
                $student_one->parent_id = $object->get("parent_id");
                $student_one->invoice_id = $object->get("invoice_id");

                $query2 = new ParseQuery("Activity");
                $act_obj = $query2->get($student_one->activity);
                $student_one->activity = $act_obj->get("sessionName");

                if($student_one->invoice_id) {
                    $query3 = new ParseQuery("Invoice");
                    $invoice_obj = $query3->get($student_one->invoice_id);
                    $student_one->invoice_status = $invoice_obj->get("status");
                } else {
                    $student_one->invoice_status = "";
                }

                $list[] = $student_one;

            }

            return $list;

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return null;
        }
    }

    public static function getStudentlistForInvoice($invoice_id)
    {
        try {

            $query = new ParseQuery("Student");

            $query->equalTo("invoice_id", $invoice_id);
            $result = $query->find();

            $list = array();

            for ($i = 0; $i < count($result); $i++) {

                $object = $result[$i];

                $student_one = new Mstudent();

                $student_one->student_id = $object->getObjectId();
                $student_one->firstName = $object->get("firstName");
                $student_one->middleInitial = $object->get("middleInitial");
                $student_one->lastName = $object->get("lastName");
                $activity_id = $object->get("activity");
                $fee_id = $object->get("fee_id");


                $query2 = new ParseQuery("Activity");
                $act_obj = $query2->get($activity_id);
                $student_one->activity['name'] = $act_obj->get("sessionName");


                $query3 = new ParseQuery("ActFee");
                $fee_obj = $query3->get($fee_id);

                $fee["id"] = $fee_obj->getObjectId();
                $fee["name"] = $fee_obj->get("name");
                $fee["kind"] = $fee_obj->get("kind");
                $fee["price"] = $fee_obj->get("price");
                $fee["weeks"] = $fee_obj->get("weeks");

                $student_one->fee = $fee;
                $student_one->reg_fee = $object->get("reg_fee");

                $list[] = $student_one;

            }

            return $list;

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return null;
        }
    }

    public static function getStudentlistForCheckout($parent_id, $student_id)
    {
        try {

            $query = new ParseQuery("Student");

            if($student_id) {

                $result[0] = $query->get($student_id);

            } else {

                $query->equalTo("parent_id", $parent_id);
                $query->equalTo("invoice_id", "");
                $result = $query->find();
            }


            $list = array();

            for ($i = 0; $i < count($result); $i++) {

                $object = $result[$i];

                $student_one = new Mstudent();

                $student_one->student_id = $object->getObjectId();
                $student_one->firstName = $object->get("firstName");
                $student_one->middleInitial = $object->get("middleInitial");
                $student_one->lastName = $object->get("lastName");
                $activity_id = $object->get("activity");

                $query2 = new ParseQuery("Activity");
                $act_obj = $query2->get($activity_id);
                $student_one->activity['name'] = $act_obj->get("sessionName");


                $query3 = new ParseQuery("ActFee");
                $query3->equalTo("activity_id", $activity_id);
                $query3->ascending("createdAt");
                $fee_result = $query3->find();

                $fee_list = array();

                for($j = 0;$j < count($fee_result);$j++) {

                    $fee = array();

                    $fee["id"] = $fee_result[$j]->getObjectId();
                    $fee["name"] = $fee_result[$j]->get("name");
                    $fee["kind"] = $fee_result[$j]->get("kind");
                    $fee["price"] = $fee_result[$j]->get("price");
                    $fee["weeks"] = $fee_result[$j]->get("weeks");

                    $fee_list[] = $fee;

                }
                $student_one->activity['fee_list'] = $fee_list;

                $list[] = $student_one;

            }

            return $list;

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return null;
        }
    }

    public static function getStudentlistForBilling($parent_id)
    {
        try {
            $query = new ParseQuery("Student");
            $query->equalTo("parent_id", $parent_id);
            $result = $query->find();

            $list = array();

            for ($i = 0; $i < count($result); $i++) {

                $object = $result[$i];

                $student_one = new Mstudent();

                $student_one->student_id = $object->getObjectId();
                $student_one->activity = $object->get("activity");
                $student_one->firstName = $object->get("firstName");
                $student_one->middleInitial = $object->get("middleInitial");
                $student_one->lastName = $object->get("lastName");
                $student_one->signDate = $object->get("signDate");
                $student_one->invoice_id = $object->get("invoice_id");

                $query2 = new ParseQuery("Activity");
                $act_obj = $query2->get($student_one->activity);
                $student_one->activity = $act_obj->get("sessionName");

                if($student_one->invoice_id) {
                    $query3 = new ParseQuery("Invoice");
                    $invoice_obj = $query3->get($student_one->invoice_id);
                    $student_one->status = $invoice_obj->get("status");
                } else {
                    $student_one->status = "";
                }

                $list[] = $student_one;

            }

            return $list;

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return null;
        }
    }

    public static function getStudentlistForAttendance($activity_id, $attend_date)
    {
        try {

            $query = new ParseQuery("Student");
            $query->equalTo("activity", $activity_id);
            $result = $query->find();

            $list = array();

            for ($i = 0; $i < count($result); $i++) {

                $object = $result[$i];

                $student_one = array();

                $student_one['student_id'] = $object->getObjectId();
                $firstName = $object->get("firstName");
                $middleInitial = $object->get("middleInitial");
                $lastName = $object->get("lastName");
                $student_one['name'] = $firstName;
                if($middleInitial) $student_one['name'] .= ' '.$middleInitial;
                $student_one['name'] .= ' '.$lastName;

                $student_one['status'] = $object->get("status");


                $parent_id = $object->get("parent_id");
                $query2 = new ParseQuery("SystemUser");
                $parent_obj = $query2->get($parent_id);
                    $student_one['parent'] = $parent_obj->get("username");

                $query3 = new ParseQuery("Attendance");
                $query3->equalTo("student_id", $student_one['student_id']);
                $query3->equalTo("activity_id", $activity_id);
                $query3->equalTo("attendDate", new DateTime($attend_date));
                $result3 = $query3->find();
                    if(count($result3) > 0) {
                        $student_one['attendance'] = $result3[0]->get("status");
                    } else {
                        $student_one['attendance'] = true;
                    }

                $list[] = $student_one;
            }

            return $list;

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return null;
        }
    }


    public static function getStudent($student_id)
    {
        try {
            $query = new ParseQuery("Student");
            $object = $query->get($student_id);

            $student_one = new Mstudent();

            $student_one->student_id = $object->getObjectId();
            $student_one->parent_id = $object->get("parent_id");
            $student_one->schoolYear = $object->get("schoolYear");
            $student_one->activity = $object->get("activity");
            $student_one->firstName = $object->get("firstName");
            $student_one->middleInitial = $object->get("middleInitial");
            $student_one->lastName = $object->get("lastName");
            $student_one->birthday = $object->get("birthday");
            $student_one->mf = $object->get("mf");
            $student_one->gradeFall = $object->get("gradeFall");
            $student_one->address1 = $object->get("address1");
            $student_one->address2 = $object->get("address2");
            $student_one->city = $object->get("city");
            $student_one->state = $object->get("state");
            $student_one->zipCode = $object->get("zipCode");
            $student_one->primaryPhone = $object->get("primaryPhone");
            $student_one->motherGaurdian = $object->get("motherGaurdian");
            $student_one->motherEmployer = $object->get("motherEmployer");
            $student_one->motherWorkPhone = $object->get("motherWorkPhone");
            $student_one->motherAltPhone = $object->get("motherAltPhone");
            $student_one->fatherGaurdian = $object->get("fatherGaurdian");
            $student_one->fatherEmployer = $object->get("fatherEmployer");
            $student_one->fatherWorkPhone = $object->get("fatherWorkPhone");
            $student_one->fatherAltPhone = $object->get("fatherAltPhone");
            $student_one->otherGaurdian = $object->get("otherGaurdian");
            $student_one->otherEmployer = $object->get("otherEmployer");
            $student_one->otherWorkPhone = $object->get("otherWorkPhone");
            $student_one->otherAltPhone = $object->get("otherAltPhone");
            $student_one->ethnicity = $object->get("ethnicity");
            $student_one->consentPhoto = $object->get("consentPhoto");
            $student_one->consentGrade = $object->get("consentGrade");
            $student_one->consentPerson = $object->get("consentPerson");
            $student_one->emergenciesDoctor = $object->get("emergenciesDoctor");
            $student_one->doctorPhone = $object->get("doctorPhone");
            $student_one->emergenciesHospital = $object->get("emergenciesHospital");
            $student_one->emergenciesDentist = $object->get("emergenciesDentist");
            $student_one->dentistPhone = $object->get("dentistPhone");
            $student_one->medication = $object->get("medication");
            $student_one->medicationYN = $object->get("medicationYN");
            $student_one->allergiesNeeds = $object->get("allergiesNeeds");
            $student_one->emergenciesContactPerson = $object->get("emergenciesContactPerson");
            $student_one->emergenciesContactNumber = $object->get("emergenciesContactNumber");
            $student_one->signature = $object->get("signature");
            $student_one->signDate = $object->get("signDate");
            $student_one->status = $object->get("status");
            $student_one->invoice_id = $object->get("invoice_id");

            return $student_one;


        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return null;
        }

    }

    public static function getStudentNamelist()
    {
        try {
            $query = new ParseQuery("Student");

            $result = $query->find();

            $list = array();

            for ($i = 0; $i < count($result); $i++) {

                $object = $result[$i];

                $student_one = new Mstudent();


                $student_one->student_id = $object->getObjectId();
                $student_one->firstName = $object->get("firstName");
                $student_one->middleInitial = $object->get("middleInitial");
                $student_one->lastName = $object->get("lastName");

                $list[] = $student_one;

            }

            return $list;
        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return null;
        }
    }

    /*

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
*/
}