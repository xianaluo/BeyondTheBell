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

class MSysInfo extends CI_Model {

    var $metaId;
    var $metaName;
    var $metaValue;

    public function __construct()
    {
        parent::__construct();

    }

    public static function getValue($metaName)
    {
        try {

            $query = new ParseQuery("SystemInfo");
            $query->equalTo("meta_name", $metaName);
            $results = $query->find();

            if (count($results) > 0) {

                return $results[0]->get("meta_value");
            }

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
        }

        return false;

    }

    public static function setValue($metaName, $metaValue)
    {
        try {

            $query = new ParseQuery("SystemInfo");
            $query->equalTo("meta_name", $metaName);
            $result = $query->find();
            $query1 = $result[0];
            
            $query1->set("meta_value", $metaValue);
            
            $query1->save();

            return true;

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return false;
        }
        
    }
}