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

define('ATTACH_CATE_STUDENT',    'student');

class Mattachment extends CI_Model {

    var $attach_id;
    var $category;
    var $link_id;
    var $filename;
    var $desc;

    public function __construct()
    {
        parent::__construct();

    }

    public static function add($category, $link_id, $filename, $desc)
    {

        try {

            $attach = new ParseObject("Attachment");

            $attach->set("category", $category);
            $attach->set("link_id", $link_id);
            $attach->set("filename", $filename);
            $attach->set("desc", $desc);

            $attach->save();

            $attach_id = $attach->getObjectId();

            return $attach_id;

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return null;
        }
    }

    public static function remove($attach_id) {

        try {

            $query = new ParseQuery("Attachment");
            $object = $query->get($attach_id);
            $object->destroy();

            return true;

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return false;
        }
    }

    public static function getAttachment($attach_id) {

        try {

            $query = new ParseQuery("Attachment");
            $object = $query->get($attach_id);

            $attach_one = new Mattachment();
            $attach_one->attach_id = $object->getObjectId();
            $attach_one->category = $object->get("category");
            $attach_one->link_id = $object->get("link_id");
            $attach_one->filename = $object->get("filename");
            $attach_one->desc = $object->get("desc");

            return $attach_one;

        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return null;
        }
    }

    public static function getAttachmentlist($category, $link_id)
    {
        try {
            $query = new ParseQuery("Attachment");
            $query->equalTo("category", $category);
            $query->equalTo("link_id", $link_id);

            $result = $query->find();

            $list = array();

            for ($i = 0; $i < count($result); $i++) {

                $object = $result[$i];

                $attach_one = new Mattachment();


                $attach_one->attach_id = $object->getObjectId();
                $attach_one->filename = $object->get("filename");
                $attach_one->desc = $object->get("desc");
                $attach_one->category = $category;
                $attach_one->link_id = $link_id;

                $list[] = $attach_one;

            }

            return $list;
        } catch (ParseException $ex) {
            // Execute any logic that should take place if the save fails.
            // error is a ParseException object with an error code and message.
            return null;
        }
    }

}