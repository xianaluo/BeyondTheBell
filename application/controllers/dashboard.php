<?php
/**
 * Created by PhpStorm.
 * User: win
 * Date: 1/9/15
 * Time: 5:37 PM
 */
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

class Dashboard extends CI_Controller{

    public function __construct(){

        parent::__construct();
        //TODO:  Add extra constructor Code
        session_start();
        if(!gf_isLogin()) redirect('/');

    }

    public function index(){
        //TODO:  called when method name is requested.
        $this->load->view('dashboard/first');
    }
}