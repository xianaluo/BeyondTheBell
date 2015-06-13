<?php
/**
 * Created by PhpStorm.
 * User: win
 * Date: 1/7/15
 * Time: 7:08 PM
 */

use Parse\ParseException;
use Parse\ParseObject;
use Parse\ParseQuery;

class Mcategory extends CI_Model {

    var $cate_id;
    var $cate_name;
    var $cate_order;
    var $cate_comment;


    public function __construct($id, $name, $order, $comment)
    {
        parent::__construct();

        $this->cate_id = $id;
        $this->cate_name = $name;
        $this->cate_order = $order;
        $this->cate_comment = $comment;
    }

    public static function getCategoryList($table)
    {

        if ($table == "UserType") {

            $category1 = new Mcategory(1, "Sysadmin", 1, "");
            $category2 = new Mcategory(2, "Staff", 2, "");
            $category3 = new Mcategory(3, "Teacher", 3, "");
            $category4 = new Mcategory(4, "Parent", 4, "");
            $category5 = new Mcategory(5, "Student", 5, "");

            $list = array($category1, $category2, $category3, $category4, $category5);
            return $list;
        } else if ($table == "State") {

            $list = array(

                new Mcategory("AL", "Alabama", 1, ""),
                new Mcategory("AK", "Alaska", 2, ""),
                new Mcategory("AZ", "Arizona", 3, ""),
                new Mcategory("AR", "Arkansas", 4, ""),
                new Mcategory("CA", "California", 5, ""),
                new Mcategory("CO", "Colorado", 6, ""),
                new Mcategory("CT", "Connecticut", 7, ""),
                new Mcategory("DE", "Delaware", 8, ""),
                new Mcategory("FL", "Florida", 9, ""),
                new Mcategory("GA", "Georgia", 10, ""),
                new Mcategory("HI", "Hawaii", 11, ""),
                new Mcategory("ID", "Idaho", 12, ""),
                new Mcategory("ID", "Illinois", 13, ""),
                new Mcategory("IN", "Indiana", 14, ""),
                new Mcategory("IA", "Iowa", 15, ""),
                new Mcategory("KS", "Kansas", 16, ""),
                new Mcategory("KY", "Kentucky", 17, ""),
                new Mcategory("LA", "Louisiana", 18, ""),
                new Mcategory("ME", "Maine", 19, ""),
                new Mcategory("MD", "Maryland", 20, ""),
                new Mcategory("MA", "Massachusetts", 21, ""),
                new Mcategory("MI", "Michigan", 22, ""),
                new Mcategory("MN", "Minnesota", 23, ""),
                new Mcategory("MS", "Mississippi", 24, ""),
                new Mcategory("MO", "Missouri", 25, ""),
                new Mcategory("MT", "Montana", 26, ""),
                new Mcategory("NE", "Nebraska", 27, ""),
                new Mcategory("NV", "Nevada", 28, ""),
                new Mcategory("NH", "New Hampshire", 29, ""),
                new Mcategory("NJ", "New Jersey", 30, ""),
                new Mcategory("NM", "New Mexico", 31, ""),
                new Mcategory("NY", "New York", 32, ""),
                new Mcategory("NC", "North Carolina", 33, ""),
                new Mcategory("ND", "North Dakota", 34, ""),
                new Mcategory("OH", "Ohio", 35, ""),
                new Mcategory("OK", "Oklahoma", 36, ""),
                new Mcategory("OR", "Oregon", 37, ""),
                new Mcategory("PA", "Pennsylvania", 38, ""),
                new Mcategory("RI", "Rhode Island", 39, ""),
                new Mcategory("SC", "South Carolina", 40, ""),
                new Mcategory("SD", "South Dakota", 41, ""),
                new Mcategory("TN", "Tennessee", 42, ""),
                new Mcategory("TX", "Texas", 43, ""),
                new Mcategory("UT", "Utah", 44, ""),
                new Mcategory("VT", "Vermont", 45, ""),
                new Mcategory("VA", "Virginia", 46, ""),
                new Mcategory("WA", "Washington", 47, ""),
                new Mcategory("WV", "West Virginia", 48, ""),
                new Mcategory("WI", "Wisconsin", 49, ""),
                new Mcategory("WY", "Wyoming", 50, "")
            );
            return $list;

        } else if($table == "ActFeeTempl") {

            try {
                $query = new ParseQuery($table);
                $query->ascending("order");
                $result = $query->find();

                $category_list = array();

                for ($i = 0; $i < count($result); $i++) {

                    $object = $result[$i];

                    $category_id = $object->getObjectId();
                    $category_name = $object->get("name");
                    $category_price = $object->get("price");
                    $category_kind = $object->get("kind");

                    $category_one = array('id'=>$category_id, 'name'=>$category_name, 'price'=>$category_price, 'kind'=>$category_kind);

                    $category_list[] = $category_one;

                }

                return $category_list;

            } catch (ParseException $ex) {
                // Execute any logic that should take place if the save fails.
                // error is a ParseException object with an error code and message.
                return null;
            }
        } else if ($table == "SysInfo") {
             try {
                $query = new ParseQuery($table);
                $query->ascending("order");
                $result = $query->find();

                $category_list = array();
                for ($i = 0; $i < count($result); $i++) {

                    $object = $result[$i];

                    $category_id = $object->getObjectId();
                    $category_name = $object->get("name");
                    $category_price = $object->get("price");
                    $category_kind = $object->get("kind");

                    $category_one = array('id'=>$category_id, 'name'=>$category_name, 'price'=>$category_price, 'kind'=>$category_kind);

                    $category_list[] = $category_one;

                }

                return $category_list;

            } catch (ParseException $ex) {
                
                return null;
            }
        } else {

            try {
                $query = new ParseQuery($table);
                $query->ascending("order");
                $result = $query->find();

                $category_list = array();

                for ($i = 0; $i < count($result); $i++) {

                    $object = $result[$i];

                    $category_id = $object->getObjectId();
                    $category_name = $object->get("name");
                    $category_order = $object->get("order");
                    $category_comment = $object->get("comment");

                    $category_one = new Mcategory($category_id, $category_name, $category_order, $category_comment);

                    $category_list[] = $category_one;

                }

                return $category_list;

            } catch (ParseException $ex) {
                // Execute any logic that should take place if the save fails.
                // error is a ParseException object with an error code and message.
                return null;
            }

        }

    }
}