<?php
/**
 * Created by PhpStorm.
 * User: bok
 * Date: 9/21/14
 * Time: 9:19 PM
 */

require PARSE_SDK_INC;

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

define('SIGNIN_WITHOUT_PARAMS', '');
define('SIGNIN_WITH_PARAMS',    '0');
define('SIGNUP_WITHOUT_PARAMS', '');
define('SIGNUP_WITH_PARAMS',    '1');

class Auth extends CI_Controller{


    public function __construct(){

        parent::__construct();
        //TODO:  Add extra constructor Code

        session_start();

        $this->load->model('parsewrapper');
        $this->load->model('muser');
        $this->load->model('mchat');
        $this->load->model('msysinfo');
        $this->load->model('mforgotpw');
        $this->load->library('emailwrapper');
        $this->load->library('session');
        
    }

    public function index(){
        //TODO:  called when method name is requested.

        if(gf_isLogin()) {

            redirect('/dashboard', 'get');

        } else {

            $this->load->view('auth/signin');
        }
    }

    public function  signin(){
        //TODO:  called when
        $type = $this->input->post('type');


        switch($type){
            case SIGNIN_WITHOUT_PARAMS:
                $this->load->view('auth/signin');
                break;
            case SIGNIN_WITH_PARAMS:

                $this->form_validation->set_rules('EmailAddress', 'EmailAddress', 'trim|required|xss_clean');
                $this->form_validation->set_rules('Password', 'Password', 'trim|required|xss_clean');

                if($this->form_validation->run())
                {

                    $emailAddress = $this->input->post('EmailAddress');
                    $password = $this->input->post('Password');

                    $object = $this->muser->login($emailAddress, $password);
                    

                    if($object) {
                                                         
                                                                     
                        $object->unreadMsgs = $this->mchat->getMessagesUnread(null, $object->user_id, 10);
                        gf_registerCurrentUser($object);
//                        $this->msysinfo->getValue('sys_msg')."::::";exit;
                        $this->session->set_userdata('sysMsg', $this->msysinfo->getValue('sys_msg'));
                        $this->session->set_userdata('sysMsgLink', $this->msysinfo->getValue('sys_msg_link'));
                        $this->session->set_userdata('sysMsgCat', $this->msysinfo->getValue('sys_msg_cat'));
                        $this->session->set_userdata('sysMsgOther', $this->msysinfo->getValue('sys_msg_other'));


                        redirect('/dashboard', 'get');

                    } else {

                        $data['InvalidAccount'] = true;

                        $this->load->view('auth/signin', $data);

                    }


                } else {


                    $this->load->view('auth/signin');

                }
                break;

            default:

        }

    }

    public function logout(){
        //TODO:  called when

        gf_unregisterCurrentUser();

        redirect('auth/signin');

    }

    public function _check_parse($password){
        //TODO:  callback function when validate the form
        return true;
    }

    public function gotoForgotpw()
    {
        $this->load->view('auth/forgotpw');
    }

    public function emailtoreset()
    {
        $emailAddress = $this->input->post('EmailAddress');

        $account_one = $this->muser->findAccount($emailAddress);

        if($account_one != null) {

            $forgotpw_id = $this->mforgotpw->create($emailAddress);

            $this->_sendEmailToReset($account_one, $forgotpw_id);

            $this->session->set_flashdata('found', 'true');
            $this->session->set_flashdata('emailAddress', $emailAddress);

            redirect('/auth/emailsent', 'refresh');

        } else {

            $this->session->set_flashdata('found', 'false');
            $this->session->set_flashdata('emailAddress', $emailAddress);

            redirect('/auth/emailsent', 'refresh');
        }
    }

    public function emailsent()
    {
        $data['found'] = $this->session->flashdata('found');
        $data['emailAddress'] = $this->session->flashdata('emailAddress');
        $this->load->view('auth/emailsent', $data);
    }

    public function gotoResetpw()
    {
        $forgotpw_id = $this->input->get('forgotpw');

        if($this->mforgotpw->getEmailAddress($forgotpw_id)) {

            $data['forgotpw_id'] = $forgotpw_id;

            $this->load->view('auth/resetpw', $data);

        } else {

            redirect('/error');
        }

    }

    public function setUpAccount()
    {
        $forgotpw_id = $this->input->get('newAccount');

        if($this->mforgotpw->getEmailAddress($forgotpw_id)) {

            $data['forgotpw_id'] = $forgotpw_id;

            $this->load->view('auth/resetpw', $data);

        } else {

            redirect('/error');
        }

    }

    public function resetpw()
    {
        $forgotpw_id = $this->input->post('forgotpw_id');
        $password = $this->input->post('Password');

        $emailAddress = $this->mforgotpw->getEmailAddress($forgotpw_id);

        if($this->muser->resetPassword($emailAddress, $password)) {

            $this->mforgotpw->delete($forgotpw_id);

        }

        redirect('/');
    }

    public function _sendEmailToReset($userinfo, $forgotpw_id)
    {

        // subject
        $subject = 'Reset your password';

        $linkurl = $this->config->base_url().'auth/gotoResetpw?forgotpw='.$forgotpw_id;

        // message
        $msg = '
            <html>
            <head>
              <title>Reset your password</title>
            </head>
            <body>
              <p>Hey, '.$userinfo->firstName.'</p>
              <p>Please reset your password!</p>
              <p>Click here:</p>
              <p><a href="'.$linkurl.'">'.$linkurl.'</a></p>
              <p>Thanks.</p>
              <p>Beyond the bell.</p>
            </body>
            </html>
        ';
        $to_email  = $userinfo->emailAddress;
        $to_firstName = $userinfo->firstName;
        $to_lastName = $userinfo->lastName;
        $from_email = 'keyseen@outlook.com';
        $from_name = 'Beyond the bell';

        $this->emailwrapper->sendfromAdmin(
            $subject,
            $msg,
            $to_email,
            $to_firstName,
            $to_lastName,
            $from_email,
            $from_name);
/*
        // multiple recipients
        $to  = $userinfo->emailAddress;

        // subject
        $subject = 'Reset your password';

        $linkurl = $this->config->base_url().'auth/gotoResetpw?forgotpw='.$forgotpw_id;

        // message
        $message = '
            <html>
            <head>
              <title>Reset your password</title>
            </head>
            <body>
              <p>Hey, '.$userinfo->firstName.'</p>
              <p>Please reset your password!</p>
              <p>Click here:</p>
              <p><a href="'.$linkurl.'">'.$linkurl.'</a></p>
              <p>Thanks.</p>
              <p>Beyond the bell.</p>
            </body>
            </html>
        ';

        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        // Additional headers
        $headers .= 'To: '.$to."\r\n";
        $headers .= "From: atokis@hotmail.com\r\n";
        $headers .= "Reply-To: atokis@hotmail.com\r\n";

        // Mail it
        mail($to, $subject, $message, $headers);
*/

    }
    
    public function saveInfo() {

        $this->form_validation->set_rules('cngMsg', 'Message', 'trim|required');
        $this->form_validation->set_rules('cngMsgLink', 'Message Link', 'trim|required');
        $this->form_validation->set_rules('cngMsgCat', 'Message Category', 'trim|required');
        $this->form_validation->set_rules('cngMsgOther', 'Message Other', 'trim');
        
        if($this->form_validation->run() == FALSE) {

        } else {                                           
            //get parameter

            $v3  = $this->input->post('cngMsgCat');
            $v1 = $this->input->post('cngMsg');
            $v2 = $this->input->post('cngMsgLink');
            $cat = $this->input->post('cngMsgOther');

            if ($v3 == 1)  {
                $this->session->set_userdata('sysMsg', $v1);
                $this->session->set_userdata('sysMsgLink', $v2);
                $this->session->set_userdata('sysMsgCat', $v3);
                $this->session->set_userdata('sysMsgOther', $cat);
                //insert db
                $this->msysinfo->setValue('sys_msg', $v1);
                $this->msysinfo->setValue('sys_msg_link', $v2);
                $this->msysinfo->setValue('sys_msg_cat', $v3);    
                if ($v2 == '/') {
                    $this->msysinfo->setValue('sys_msg_other', $cat);    
                } else {
                    $this->msysinfo->setValue('sys_msg_other', '');    
                }
            } else if ($v3 == 2) {
                //insert db
                $this->msysinfo->setValue('sys_msg_parent', $v1);
                $this->msysinfo->setValue('sys_msg_link_parent', $v2);
                $this->msysinfo->setValue('sys_msg_cat', $v3);
                if ($v2 == '/') {
                    $this->msysinfo->setValue('sys_msg_other_parent', $cat);    
                } else {
                    $this->msysinfo->setValue('sys_msg_other_parent', '');    
                }
            } else {
                $this->session->set_userdata('sysMsg', $v1);
                $this->session->set_userdata('sysMsgLink', $v2);
                $this->session->set_userdata('sysMsgCat', $v3);
                $this->session->set_userdata('sysMsgOther', $cat);
                //insert db
                $this->msysinfo->setValue('sys_msg', $v1);
                $this->msysinfo->setValue('sys_msg_link', $v2);
                $this->msysinfo->setValue('sys_msg_cat', $v3);
                $this->msysinfo->setValue('sys_msg_parent', $v1);
                $this->msysinfo->setValue('sys_msg_link_parent', $v2);
                
                if ($v2 == '/') {
                    $this->msysinfo->setValue('sys_msg_other', $cat);    
                    $this->msysinfo->setValue('sys_msg_other_parent', $cat);    
                } else {
                    $this->msysinfo->setValue('sys_msg_other', '');    
                    $this->msysinfo->setValue('sys_msg_other_parent', '');    
                }
            }

            redirect('/dashboard');
        }
    }

} 