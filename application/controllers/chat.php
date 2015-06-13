<?php
/**
 * Created by PhpStorm.
 * User: win
 * Date: 1/9/15
 * Time: 5:37 PM
 */

require PARSE_SDK_INC;
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

define('ROWS_PER_PAGE_DEFAULT', 10);

class Chat extends CI_Controller{


    public function __construct(){

        parent::__construct();
        //TODO:  Add extra constructor Code
        session_start();
        if(!gf_isLogin()) redirect('/');

        $this->load->model('parsewrapper');
        $this->load->model('mchat');
        $this->load->model('muser');
        $this->load->library('emailwrapper');
    }

    public function index(){
        //TODO:  called when method name is requested.

    }

    public function send() {


        $from = $_REQUEST["from"];
        $to = $_REQUEST["to"];
        $message = $_REQUEST["message"];
        $time = $_REQUEST["time"];

        $this->mchat->insertChat($from, $to, $message);

        if($time > 0) {

            $result = $this->mchat->getMessagesAfter($from, $to, $time, 10);

        } else {

            $result = $this->mchat->getMessagesBefore($from, $to, $time, 10);
        }

        echo json_encode($result);

    }

    public function get() {

        $from = $_REQUEST["from"];
        $to = $_REQUEST["to"];
        $time = $_REQUEST["time"];

        if($time) {

            $result = $this->mchat->getMessagesAfter($from, $to, $time, 10);

        } else {

            $result = $this->mchat->getMessagesBefore($from, $to, $time, 10);
        }

        echo json_encode($result);

    }

    public function setMark() {

        $from = $_REQUEST["from"];

        $this->mchat->setMarkRead($from, gf_cu_id());

        echo json_encode($result);

    }

    public function getUnread() {

        $result = $this->mchat->getAllMessagesUnread(gf_cu_id(), 10);
        foreach ($result as &$msg) {
            $user = $this->muser->getUser($msg[0]);
            $msg[3] = $user->firstName . " " . $uesr->middleInitial . " " . $uesr->lastName;
            if ($msg[3] == "  ") $msg[3] = $user->username;
            $msg[4] = gf_profile_picture2($user->user_id, $user->profilePicture);
            if (gf_cu_rightsChat()) $msg[5] = "/user/gotoEditUser?user_id=".$user->user_id."&cat=true";
            else $msg[5] = "";
        }

        echo json_encode($result);

    }
    
    public function getOld() {

        $from = $_REQUEST["from"];
        $to = $_REQUEST["to"];
        $time = $_REQUEST["time"];
        $more = $_REQUEST["more"];

        if($time && $more ) {


            $result = $this->mchat->getMessagesBefore($from, $to, $time, $more);

            echo json_encode($result);
        }

    }

}