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

class Mforgotpw extends CI_Model {

    var $forgotpw_id;
    var $emailAddress;

    public function __construct()
    {
        parent::__construct();

    }

    public static function create($emailAddress)
    {

        try {

            $query = new ParseQuery("ForgotPw");
            $query->equalTo("emailAddress", $emailAddress);
            $results = $query->find();

            if(count($results) > 0) {

                $object = $results[0];

                return $object->getObjectId();

            } else {

                $object = new ParseObject("ForgotPw");
                $object->set("emailAddress", $emailAddress);
                $object->save();

                return $object->getObjectId();
            }

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return null;
        }
    }

    public static function getEmailAddress($forgotpw_id)
    {
        try {
            $query = new ParseQuery("ForgotPw");
            $object = $query->get($forgotpw_id);
            $emailAddress = $object->get('emailAddress');
            return $emailAddress;

        } catch (ParseException $ex) {
            return null;
        }
    }

    public static function delete($forgotpw_id)
    {
        try {
            $query = new ParseQuery("ForgotPw");
            $user_one = $query->get($forgotpw_id);
            $user_one->destroy();
        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
        }
    }

}