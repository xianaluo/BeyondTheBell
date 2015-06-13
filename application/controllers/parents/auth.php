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
        $this->load->model('msysinfo');
        $this->load->model('mforgotpw');
        $this->load->library('emailwrapper');

        $this->load->helper('captcha');
        $this->load->library('session');
    }

    public function index(){
        //TODO:  called when method name is requested.

        if(gf_isLoginParents()) {

            redirect('/parents/dashboard', 'get');

        } else {

            $this->load->view('parents/auth/signin');
        }
    }

    public function signup($data = array()) {

        $data['cap'] = $this->_auth_img();
        $this->load->view('parents/auth/register', $data);
    }

    public function refreshCaptcha() {

        $cap = $this->_auth_img();

        echo json_encode($cap);

    }
    function _auth_img()
    {
        $captcha_word = rand(23678190, 96523469);
        $config = array(
            'word'   => $captcha_word,
            'img_path'   => gf_captcha_filepath(),
            'img_url'    => gf_captcha_url(),
            'img_width'  => '150',
            'img_height' => 50,
            'expiration' => 3600
        );

        $this->session->set_flashdata('captcha_word', $captcha_word);

        return create_captcha($config);
    }

    public function register() {

        $this->form_validation->set_rules('FirstName', 'FirstName', 'required');
        $this->form_validation->set_rules('MiddleInitial', 'MiddleInitial', 'trim');
        $this->form_validation->set_rules('LastName', 'LastName', 'required');
        $this->form_validation->set_rules('EmailAddress', 'EmailAddress', 'required|valid_email');
        $this->form_validation->set_rules('Password', 'Password', 'required');
        $this->form_validation->set_rules('Confirm', 'Confirm Password', 'required');
        $this->form_validation->set_rules('CaptchaWord', 'Confirm Captcha', 'required');

        if($this->form_validation->run() == FALSE) {

            $this->signup();

        } else {

            $firstName = $this->input->post('FirstName');
            $middleInitial = $this->input->post('MiddleInitial');
            $lastName = $this->input->post('LastName');
            $emailAddress = $this->input->post('EmailAddress');
            $password = $this->input->post('Password');
            $confirm = $this->input->post('Confirm');
            $captchaWord = $this->input->post('CaptchaWord');

            $username = $firstName;
            if($middleInitial) $username .= ' '.$middleInitial;
            $username .= ' '.$lastName;

            if($this->muser->findAccount($emailAddress)) {

                $data['error'] = 'The email address already exists!';

                $this->signup($data);

            } else {

                if($password == $confirm) {


                    if($captchaWord != $this->session->flashdata('captcha_word')) {

                        $data['error'] = 'Invalid captcha!';

                        $this->signup($data);

                    } else {


                        $user_id = $this->muser->insertParent(
                            $username,
                            $firstName,
                            $middleInitial,
                            $lastName,
                            $emailAddress,
                            $password
                        );

                        if ($user_id) {

                            $user = $this->muser->getUser($user_id);

                            gf_registerCurrentUser($user);

                            redirect('/parents/profile', 'get');


                        } else {

                            $data['error'] = 'Failed to register!';

                            $this->signup($data);
                        }
                    }


                } else {

                    $data['error'] = 'Please confirm password again!';

                    $this->signup($data);
                }

            }

        }
    }

    public function  signin(){
        //TODO:  called when
        $type = $this->input->post('type');


        switch($type){
            case SIGNIN_WITHOUT_PARAMS:
                $this->load->view('parents/auth/signin');
                break;
            case SIGNIN_WITH_PARAMS:

                $this->form_validation->set_rules('EmailAddress', 'EmailAddress', 'trim|required|xss_clean');
                $this->form_validation->set_rules('Password', 'Password', 'trim|required|xss_clean');

                if($this->form_validation->run())
                {

                    $emailAddress = $this->input->post('EmailAddress');
                    $password = $this->input->post('Password');

                    $object = $this->muser->loginParents($emailAddress, $password);

                    if($object) {

                        gf_registerCurrentUser($object);
                        
                        $this->session->set_userdata('sysMsg', $this->msysinfo->getValue('sys_msg_parent'));
                        $this->session->set_userdata('sysMsgLink', $this->msysinfo->getValue('sys_msg_link_parent'));
                        $this->session->set_userdata('sysMsgCat', $this->msysinfo->getValue('sys_msg_cat'));
                        $this->session->set_userdata('sysMsgOther', $this->msysinfo->getValue('sys_msg_other_parent'));

                        redirect('/parents/dashboard', 'get');

                    } else {

                        $data['InvalidAccount'] = true;

                        $this->load->view('parents/auth/signin', $data);

                    }


                } else {


                    $this->load->view('parents/auth/signin');

                }
                break;

            default:

        }

    }

    public function logout(){
        //TODO:  called when

        gf_unregisterCurrentUser();

        redirect('parents/auth/signin');

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

} 