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

define('BILLING_STATUS_NOTPAID',    'Not paid');
define('BILLING_STATUS_PENDING',    'Pending');
define('BILLING_STATUS_PAID',       'Paid');

class Mbilling extends CI_Model {

    var $invoice_id;
    var $payWithCash;
    var $billingAddress1;
    var $billingAddress2;
    var $billingCity;
    var $billingState;
    var $billingZipCode;
    var $billingPhoneNumber;
    var $address1;
    var $address2;
    var $city;
    var $state;
    var $zipCode;
    var $phoneNumber;
    var $invoiceCode;
    var $discountCode;
    var $discountAmount;
    var $subtotalAmount;
    var $totalAmount;
    var $card_id;
    var $status;
    var $createdAt;

    public function __construct()
    {
        parent::__construct();

    }

    public static function createInvoice(
        $payWithCash,
        $invoice_fees,
        $billingAddress1,
        $billingAddress2,
        $billingCity,
        $billingState,
        $billingZipCode,
        $billingPhoneNumber,
        $address1,
        $address2,
        $city,
        $state,
        $zipCode,
        $phoneNumber,
        $invoiceCode,
        $discountCode,
        $discountAmount,
        $subtotalAmount,
        $totalAmount,
        $card_id,
        $status)
    {

        try {

            $invoice = new ParseObject("Invoice");

            $invoice->set("payWithCash", (bool)$payWithCash);
            $invoice->set("billingAddress1", $billingAddress1);
            $invoice->set("billingAddress2", $billingAddress2);
            $invoice->set("billingCity", $billingCity);
            $invoice->set("billingState", $billingState);
            $invoice->set("billingZipCode", $billingZipCode);
            $invoice->set("billingPhoneNumber", $billingPhoneNumber);
            $invoice->set("address1", $address1);
            $invoice->set("address2", $address2);
            $invoice->set("city", $city);
            $invoice->set("state", $state);
            $invoice->set("zipCode", $zipCode);
            $invoice->set("phoneNumber", $phoneNumber);
            $invoice->set("invoiceCode", $invoiceCode);
            $invoice->set("discountCode", $discountCode);
            $invoice->set("discountAmount", floatval($discountAmount));
            $invoice->set("subtotalAmount", floatval($subtotalAmount));
            $invoice->set("totalAmount", floatval($totalAmount));
            $invoice->set("card_id", $card_id);
            $invoice->set("status", $status);


            $invoice->save();

            $invoice_id = $invoice->getObjectId();

            foreach($invoice_fees as $item) {

                $query = new ParseQuery("Student");
                $student = $query->get($item['student_id']);
                $student->set("invoice_id", $invoice_id);
                $student->set("fee_id", $item['fee_id']);
                $student->set("reg_fee", $item['reg_fee']);
                $student->save();
            }

            return $invoice_id;

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return null;
        }
    }


    public static function getInvoice($invoice_id)
    {
        try {
            $query = new ParseQuery("Invoice");
            $object = $query->get($invoice_id);

            $invoice_one = new Mbilling();

            $invoice_one->invoice_id = $object->getObjectId();
            $invoice_one->payWithCash = $object->get("payWithCash");
            $invoice_one->billingAddress1 = $object->get("billingAddress1");
            $invoice_one->billingAddress2 = $object->get("billingAddress2");
            $invoice_one->billingCity = $object->get("billingCity");
            $invoice_one->billingState = $object->get("billingState");
            $invoice_one->billingZipCode = $object->get("billingZipCode");
            $invoice_one->billingPhoneNumber = $object->get("billingPhoneNumber");
            $invoice_one->address1 = $object->get("address1");
            $invoice_one->address2 = $object->get("address2");
            $invoice_one->city = $object->get("city");
            $invoice_one->state = $object->get("state");
            $invoice_one->zipCode = $object->get("zipCode");
            $invoice_one->phoneNumber = $object->get("phoneNumber");
            $invoice_one->invoiceCode = $object->get("invoiceCode");
            $invoice_one->discountCode = $object->get("discountCode");
            $invoice_one->discountAmount = $object->get("discountAmount");
            $invoice_one->subtotalAmount = $object->get("subtotalAmount");
            $invoice_one->totalAmount = $object->get("totalAmount");
            $invoice_one->card_id = $object->get("card_id");
            $invoice_one->status = $object->get("status");
            $invoice_one->createdAt = $object->getCreatedAt();

            return $invoice_one;

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return null;
        }

    }


    public static function completePending($invoice_id)
    {

        try {

            $query = new ParseQuery("Invoice");
            $object = $query->get($invoice_id);
            $object->set("status", BILLING_STATUS_PAID);

            $object->save();

            return true;

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            echo $invoice_id;
            die($ex->getMessage());
            return false;
        }
    }


/*
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
*/
}