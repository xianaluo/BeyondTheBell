<?php
/**
 * Created by PhpStorm.
 * User: win
 * Date: 1/9/15
 * Time: 5:37 PM
 */

require PARSE_SDK_INC;
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

class Support extends CI_Controller{

    public function __construct(){

        parent::__construct();
        //TODO:  Add extra constructor Code
        session_start();
        if(!gf_isLoginParents()) redirect('/');

        $this->load->model('parsewrapper');
        $this->load->model('mcategory');
        $this->load->model('mquestion');
        $this->load->library('emailwrapper');

    }

    public function index(){

        //TODO:  called when method name is requested.
        $this->support();
    }

    public function support($data = array()) {

        $data['topic_list'] = $this->mcategory->getCategoryList("SupportTopic");
        $this->load->view('parents/support/support', $data);
    }

    public function send() {

        $this->form_validation->set_rules('Title', 'Title', 'required | trim');
        $this->form_validation->set_rules('Topic', 'Topic', 'required | trim');
        $this->form_validation->set_rules('Subject', 'Subject', 'required | trim');

        if($this->form_validation->run() == FALSE) {

            $this->support();

        } else {

            $title = $this->input->post('Title');
            $topic = $this->input->post('Topic');
            $subject = $this->input->post('Subject');

            if($this->mquestion->insertQuestion($title, $topic, $subject)) {

                $this->_sendEmail($title, $topic, $subject);

                $data['success'] = true;
                $this->support($data);

            } else {

                $data['error'] = 'Failed to send!';
                $this->support($data);
            }
        }

    }

    public function _sendEmail($qu_title, $qu_topic, $qu_subject)
    {

        $from_name = gf_cu_fullName();
        $from = gf_cu_email();
        $to  = 'sean@rxatechnology.com,sdr001@morningside.edu';
        $subject = "BTB Supports";
        $cc = '';
        $bcc = '';
        $contents = '
            <html>
            <head>
              <title>'.$qu_title.'</title>
            </head>
            <body>
                <p>Title : '.$qu_title.'</p>
                <p>Topic : '.$qu_topic.'</p>
                <p>Subject : '.$qu_subject.'</p>
                <p></p>
                <p>'.$from_name.'</p>
            </body>
            </html>
        ';
               
        $this->emailwrapper->send($from_name, $from, $to, $subject, $contents, $cc, $bcc);

    }

}