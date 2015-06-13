<?php
/**
 * Created by PhpStorm.
 * User: win
 * Date: 1/9/15
 * Time: 5:37 PM
 */

require PARSE_SDK_INC;
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

define('MSG_STATUS_SENT', 'SENT');
define('MSG_STATUS_DRAFT', 'DRAFT');

define('MODE_SENT', 1);
define('MODE_DRAFTS', 2);
define('MODE_TRASH', 3);
define('MODE_TEMPL', 4);

define('ROWS_PER_PAGE_DEFAULT', 10);

class Message_center extends CI_Controller{


    public function __construct(){

        parent::__construct();
        //TODO:  Add extra constructor Code
        session_start();
        if(!gf_isLogin()) redirect('/');

        $this->load->model('parsewrapper');
        $this->load->model('muser');
        $this->load->model('mcategory');
        $this->load->model('mmessagebox');
        $this->load->model('mmessagetemplate');
        $this->load->library('emailwrapper');
    }

    public function index(){
        //TODO:  called when method name is requested.
        $this->messages();
    }

    public function messages() {

        $PageNum = ($_REQUEST['PageNum'])?$_REQUEST['PageNum']:1;
        $RowsPerPage = ($_REQUEST['RowsPerPage'])?$_REQUEST['RowsPerPage']:ROWS_PER_PAGE_DEFAULT;

        $search_value = trim($_REQUEST['search_value']);
        $data['search_value'] = $search_value;

        $data['mode'] = MODE_SENT;
        $ret = $this->mmessagebox->getMessageslist(gf_cu_email(), $PageNum, $RowsPerPage, $search_value);
        $data['PageNum'] = $ret['PageNum'];
        $data['Pages'] = $ret['Pages'];
        $data['RowsPerPage'] = $ret['RowsPerPage'];
        $data['list'] = $ret['list'];
        $data['drafts_count'] = $this->mmessagebox->getDraftsCount(gf_cu_email());
        $data['trash_count'] = $this->mmessagebox->getTrashCount(gf_cu_email());

        $this->load->view('message_center/messages', $data);

    }
    public function messagesWithData($data) {

        $PageNum = ($_REQUEST['PageNum'])?$_REQUEST['PageNum']:1;
        $RowsPerPage = ($_REQUEST['RowsPerPage'])?$_REQUEST['RowsPerPage']:ROWS_PER_PAGE_DEFAULT;

        $search_value = trim($_REQUEST['search_value']);
        $data['search_value'] = $search_value;

        $data['mode'] = MODE_SENT;
        $ret = $this->mmessagebox->getMessageslist(gf_cu_email(), $PageNum, $RowsPerPage, $search_value);
        $data['PageNum'] = $ret['PageNum'];
        $data['Pages'] = $ret['Pages'];
        $data['RowsPerPage'] = $ret['RowsPerPage'];
        $data['list'] = $ret['list'];
        $data['drafts_count'] = $this->mmessagebox->getDraftsCount(gf_cu_email());
        $data['trash_count'] = $this->mmessagebox->getTrashCount(gf_cu_email());

        $this->load->view('message_center/messages', $data);

    }
    public function drafts() {

        $PageNum = ($_REQUEST['PageNum'])?$_REQUEST['PageNum']:1;
        $RowsPerPage = ($_REQUEST['RowsPerPage'])?$_REQUEST['RowsPerPage']:ROWS_PER_PAGE_DEFAULT;

        $search_value = trim($_REQUEST['search_value']);
        $data['search_value'] = $search_value;

        $data['mode'] = MODE_DRAFTS;
        $ret = $this->mmessagebox->getDraftslist(gf_cu_email(), $PageNum, $RowsPerPage, $search_value);
        $data['PageNum'] = $ret['PageNum'];
        $data['Pages'] = $ret['Pages'];
        $data['RowsPerPage'] = $ret['RowsPerPage'];
        $data['list'] = $ret['list'];
        $data['drafts_count'] = $this->mmessagebox->getDraftsCount(gf_cu_email());
        $data['trash_count'] = $this->mmessagebox->getTrashCount(gf_cu_email());

        $this->load->view('message_center/messages', $data);

    }

    public function trash() {


        $PageNum = ($_REQUEST['PageNum'])?$_REQUEST['PageNum']:1;
        $RowsPerPage = ($_REQUEST['RowsPerPage'])?$_REQUEST['RowsPerPage']:ROWS_PER_PAGE_DEFAULT;

        $search_value = trim($_REQUEST['search_value']);
        $data['search_value'] = $search_value;

        $data['mode'] = MODE_TRASH;
        $ret = $this->mmessagebox->getTrashlist(gf_cu_email(), $PageNum, $RowsPerPage, $search_value);
        $data['PageNum'] = $ret['PageNum'];
        $data['Pages'] = $ret['Pages'];
        $data['RowsPerPage'] = $ret['RowsPerPage'];
        $data['list'] = $ret['list'];
        $data['drafts_count'] = $this->mmessagebox->getDraftsCount(gf_cu_email());
        $data['trash_count'] = $this->mmessagebox->getTrashCount(gf_cu_email());

        $this->load->view('message_center/messages', $data);

    }

    public function templates() {

        $PageNum = ($_REQUEST['PageNum'])?$_REQUEST['PageNum']:1;
        $RowsPerPage = ($_REQUEST['RowsPerPage'])?$_REQUEST['RowsPerPage']:ROWS_PER_PAGE_DEFAULT;

        $search_value = trim($_REQUEST['search_value']);
        $data['search_value'] = $search_value;

        $data['mode'] = MODE_TEMPL;
        $ret = $this->mmessagetemplate->getTemplateslist(gf_cu_email(), $PageNum, $RowsPerPage, $search_value);
        $data['PageNum'] = $ret['PageNum'];
        $data['Pages'] = $ret['Pages'];
        $data['RowsPerPage'] = $ret['RowsPerPage'];
        $data['list'] = $ret['list'];
        $data['drafts_count'] = $this->mmessagebox->getDraftsCount(gf_cu_email());
        $data['trash_count'] = $this->mmessagebox->getTrashCount(gf_cu_email());

        $this->load->view('message_center/messages', $data);

    }


    public function compose() {

        $data['userlist'] = $this->muser->getUserlist();
        $data['drafts_count'] = $this->mmessagebox->getDraftsCount(gf_cu_email());
        $data['trash_count'] = $this->mmessagebox->getTrashCount(gf_cu_email());
        $this->load->view('message_center/mass_message', $data);
    }

    public function composeWithData($data) {

        $data['drafts_count'] = $this->mmessagebox->getDraftsCount(gf_cu_email());
        $data['trash_count'] = $this->mmessagebox->getTrashCount(gf_cu_email());
        $this->load->view('message_center/mass_message', $data);
    }

    public function composeby() {

        $sel_id = $_REQUEST['id'];
        $by = $_REQUEST['by'];

        if ($by == MODE_TEMPL) {

            $data['selected'] = $this->mmessagetemplate->getTemplate($sel_id);
            $data['contents'] = $this->read_message_contents(gf_mtemplates_filepath() . $sel_id);

        } else {

            $data['selected'] = $this->mmessagebox->getMessage($sel_id);

            if ($data['selected']->simple)
                $data['contents'] = $data['selected']->contents;
            else
                $data['contents'] = $this->read_message_contents(gf_messages_filepath() . $sel_id);
        }

        $data['by'] = $by;
        $data['drafts_count'] = $this->mmessagebox->getDraftsCount(gf_cu_email());
        $data['trash_count'] = $this->mmessagebox->getTrashCount(gf_cu_email());

        $this->load->view('message_center/mass_message', $data);
    }

    public function composebyWithData($data) {

        $sel_id = $_REQUEST['id'];
        $by = $_REQUEST['by'];

        if ($by == MODE_TEMPL) {

            $data['selected'] = $this->mmessagetemplate->getTemplate($sel_id);
            $data['contents'] = $this->read_message_contents(gf_mtemplates_filepath() . $sel_id);

        } else {

            $data['selected'] = $this->mmessagebox->getMessage($sel_id);

            if ($data['selected']->simple)
                $data['contents'] = $data['selected']->contents;
            else
                $data['contents'] = $this->read_message_contents(gf_messages_filepath() . $sel_id);
        }

        $data['by'] = $by;
        $data['drafts_count'] = $this->mmessagebox->getDraftsCount(gf_cu_email());
        $data['trash_count'] = $this->mmessagebox->getTrashCount(gf_cu_email());

        $this->load->view('message_center/mass_message', $data);
    }

    public function read()
    {

        $sel_id = $_REQUEST['id'];
        $mode = $_REQUEST['mode'];

        if ($mode == MODE_TEMPL) {

            $data['selected'] = $this->mmessagetemplate->getTemplate($sel_id);
            $data['contents'] = $this->read_message_contents(gf_mtemplates_filepath() . $sel_id);

        } else {

            $data['selected'] = $this->mmessagebox->getMessage($sel_id);

            if ($data['selected']->simple)
                $data['contents'] = $data['selected']->contents;
            else
                $data['contents'] = $this->read_message_contents(gf_messages_filepath() . $sel_id);
        }

        $data['mode'] = $mode;

        $data['drafts_count'] = $this->mmessagebox->getDraftsCount(gf_cu_email());
        $data['trash_count'] = $this->mmessagebox->getTrashCount(gf_cu_email());

        $this->load->view('message_center/read_message', $data);
    }

    public function remove() {

        $mode = $_REQUEST['mode'];

        $del_id = $_REQUEST['sel_id'];

        if($mode == MODE_TEMPL) {

            foreach($del_id as $key => $value) {

                $this->mmessagetemplate->deleteTemplate($key);
            }

            $this->templates();

        } else {

            if($mode == MODE_TRASH) {
                $real = true;
            } else {
                $real = false;
            }

            foreach($del_id as $key => $value) {

                $this->mmessagebox->deleteMessage($key, $real);
            }

            if($mode == MODE_TRASH) {
                $this->trash();
            } else if($mode == MODE_DRAFTS) {
                $this->drafts();
            } else if($mode == MODE_SENT) {
                $this->messages();
            }
        }
    }

    public function send()
    {

        $this->form_validation->set_rules('MessageTo', 'email address "To"', 'required|callback_validate_multiemail');
        $this->form_validation->set_rules('MessageCc', 'email address "Cc"', 'trim|callback_validate_multiemail');
        $this->form_validation->set_rules('MessageBcc', 'email address "Bcc"', 'trim|callback_validate_multiemail');
        $this->form_validation->set_rules('MessageSubject', 'Subject', 'trim');
        $this->form_validation->set_rules('MessageContents', 'Message Contents', 'callback_validate_contents');

        if($this->form_validation->run() == FALSE) {

            $data['mode'] = MODE_SENT;
            $this->composeWithData($data);

        } else {

            //get parameter
            $from = gf_cu_email();
            $from_name = gf_cu_fullName();

            $to = $this->input->post('MessageTo');
            $cc = $this->input->post('MessageCc');
            $bcc = $this->input->post('MessageBcc');
            $subject = $this->input->post('MessageSubject');
            $contents = $this->input->post('MessageContents');


            //sending email
            $this->emailwrapper->send($from_name, $from, $to, $subject, $contents, $cc, $bcc);

            //insert db
            $message_id = $this->mmessagebox->insertMessage(
                $from,
                MSG_STATUS_SENT,
                false,
                $to,
                $cc,
                $bcc,
                $subject,
                strip_tags($contents));


            if($message_id) {

                //write contents into file

                $filename = gf_messages_filepath() . $message_id;

                $this->write_message_contents($filename, $contents);

                redirect('/message_center/messages', 'get');

            } else {

                $data['mode'] = MODE_SENT;
                $data['error'] = "Failed to save!";
                $this->composeWithData($data);

            }

        }
    }

    public function saveDraft()
    {
        $this->form_validation->set_rules('MessageTo', 'email address "To"', 'trim|callback_validate_multiemail');
        $this->form_validation->set_rules('MessageCc', 'email address "Cc"', 'trim|callback_validate_multiemail');
        $this->form_validation->set_rules('MessageBcc', 'email address "Bcc"', 'trim|callback_validate_multiemail');
        $this->form_validation->set_rules('MessageSubject', 'Subject', 'trim');
        $this->form_validation->set_rules('MessageContents', 'Message Contents', 'callback_validate_contents');

        if($this->form_validation->run() == FALSE) {

            $data['mode'] = MODE_DRAFTS;
            $this->composeWithData($data);

        } else {


            //get parameter

            $from = gf_cu_email();
            $to = $this->input->post('MessageTo');
            $cc = $this->input->post('MessageCc');
            $bcc = $this->input->post('MessageBcc');
            $subject = $this->input->post('MessageSubject');
            $contents = $this->input->post('MessageContents');


            //insert db
            $message_id = $this->mmessagebox->insertMessage(
                $from,
                MSG_STATUS_DRAFT,
                false,
                $to,
                $cc,
                $bcc,
                $subject,
                strip_tags($contents));

            if($message_id) {

                //write contents into file

                $filename = gf_messages_filepath() . $message_id;

                $this->write_message_contents($filename, $contents);

                redirect('/message_center/drafts', 'get');

            } else {

                $data['mode'] = MODE_DRAFTS;
                $data['error'] = "Failed to save!";
                $this->composeWithData($data);

            }

        }
    }

    public function sendSimple()
    {
        $this->form_validation->set_rules('MessageTo', 'Email address', 'required|valid_email');
        $this->form_validation->set_rules('MessageSubject', 'Subject', 'trim');
        $this->form_validation->set_rules('MessageContents', 'Message Contents', 'trim|required');

        if($this->form_validation->run() == FALSE) {

            $this->messages();

        } else {


            //get parameter
            $from = gf_cu_email();
            $from_name = gf_cu_fullName();
            $to  = $this->input->post('MessageTo');
            $subject = $this->input->post('MessageSubject');
            $contents = $this->input->post('MessageContents');
            $cc = "";
            $bcc = "";


            //sending email
            $this->emailwrapper->send($from_name, $from, $to, $subject, $contents, $cc, $bcc);

            //insert db
            $message_id = $this->mmessagebox->insertMessage(
                $from,
                MSG_STATUS_SENT,
                true,
                $to,
                $cc,
                $bcc,
                $subject,
                $contents);

            if($message_id) {

                redirect('/message_center/messages', 'get');

            } else {

                $data['error'] = 'Failed to save!';
                $this->messagesWithData($data);
            }

        }

    }

    public function saveDraftSimple() {

        $this->form_validation->set_rules('MessageTo', 'Email address', 'trim|valid_email');
        $this->form_validation->set_rules('MessageSubject', 'Subject', 'trim');
        $this->form_validation->set_rules('MessageContents', 'Message Contents', 'trim|required');

        if($this->form_validation->run() == FALSE) {

            $this->messages();

        } else {


            //get parameter

            $from = gf_cu_email();
            $to  = $this->input->post('MessageTo');
            $subject = $this->input->post('MessageSubject');
            $contents = $this->input->post('MessageContents');
            $cc = "";
            $bcc = "";

            //insert db
            $message_id = $this->mmessagebox->insertMessage(
                $from,
                MSG_STATUS_DRAFT,
                true,
                $to,
                $cc,
                $bcc,
                $subject,
                $contents);

            if($message_id) {

                redirect('/message_center/drafts', 'get');

            } else {

                $data['error'] = 'Failed to save!';
                $this->messagesWithData($data);
            }

        }
    }

    public function saveTemplate()
    {
        $this->form_validation->set_rules('TemplateName', 'Template Name', 'required|trim');
        $this->form_validation->set_rules('TemplateDesc', 'Template Description', 'trim');
        $this->form_validation->set_rules('TemplateShareable', 'Template Shareable', 'trim');
        $this->form_validation->set_rules('MessageContents', 'Message Contents', 'callback_validate_contents');

        if($this->form_validation->run() == FALSE) {

            $data['mode'] = MODE_TEMPL;
            $this->composeWithData($data);

        } else {


            //get parameter
            $email = gf_cu_email();
            $name = $this->input->post('TemplateName');
            $desc = $this->input->post('TemplateDesc');
            $shareable = $this->input->post('TemplateShareable');
            $contents = $this->input->post('MessageContents');


            //insert into db
            $template_id = $this->mmessagetemplate->insertMessageTemplate(
                $email,
                $name,
                $desc,
                $shareable,
                strip_tags($contents));

            if($template_id) {

                //write contents into file

                $filename = gf_mtemplates_filepath() . $template_id;

                $this->write_message_contents($filename, $contents);

                redirect('/message_center/templates', 'get');

            } else {

                $data['mode'] = MODE_TEMPL;
                $data['error'] = "Failed to save!";
                $this->composeWithData($data);

            }

        }
    }

    //send by draft message

    public function sendByDraft()
    {
        $this->form_validation->set_rules('MessageTo', 'email address "To"', 'required|callback_validate_multiemail');
        $this->form_validation->set_rules('MessageCc', 'email address "Cc"', 'trim|callback_validate_multiemail');
        $this->form_validation->set_rules('MessageBcc', 'email address "Bcc"', 'trim|callback_validate_multiemail');
        $this->form_validation->set_rules('MessageSubject', 'Subject', 'trim');
        $this->form_validation->set_rules('MessageContents', 'Message Contents', 'callback_validate_contents');

        if($this->form_validation->run() == FALSE) {

            $data['mode'] = MODE_SENT;
            $this->composebyWithData($data);

        } else {

            //get parameter
            $from = gf_cu_email();
            $from_name = gf_cu_fullName();

            $to = $this->input->post('MessageTo');
            $cc = $this->input->post('MessageCc');
            $bcc = $this->input->post('MessageBcc');
            $subject = $this->input->post('MessageSubject');
            $contents = $this->input->post('MessageContents');


            //sending email
            $this->emailwrapper->send($from_name, $from, $to, $subject, $contents, $cc, $bcc);

            //update db

            $draft_message_id = $_REQUEST['id'];

            $ret = $this->mmessagebox->editMessage(
                $draft_message_id,
                $from,
                MSG_STATUS_SENT,
                false,
                $to,
                $cc,
                $bcc,
                $subject,
                strip_tags($contents));


            if($ret) {

                //write contents into file

                $filename = gf_messages_filepath() . $draft_message_id;

                $this->write_message_contents($filename, $contents);

                redirect('/message_center/messages', 'get');

            } else {

                $data['mode'] = MODE_SENT;
                $data['error'] = "Failed to save!";
                $this->composebyWithData($data);

            }

        }

    }
    public function saveByDraft()
    {

        $this->form_validation->set_rules('MessageTo', 'email address "To"', 'trim|callback_validate_multiemail');
        $this->form_validation->set_rules('MessageCc', 'email address "Cc"', 'trim|callback_validate_multiemail');
        $this->form_validation->set_rules('MessageBcc', 'email address "Bcc"', 'trim|callback_validate_multiemail');
        $this->form_validation->set_rules('MessageSubject', 'Subject', 'trim');
        $this->form_validation->set_rules('MessageContents', 'Message Contents', 'callback_validate_contents');

        if($this->form_validation->run() == FALSE) {

            $data['mode'] = MODE_DRAFTS;
            $this->composebyWithData($data);

        } else {


            //get parameter

            $from = gf_cu_email();
            $to = $this->input->post('MessageTo');
            $cc = $this->input->post('MessageCc');
            $bcc = $this->input->post('MessageBcc');
            $subject = $this->input->post('MessageSubject');
            $contents = $this->input->post('MessageContents');


            //update db

            $draft_message_id = $_REQUEST['id'];

            $ret = $this->mmessagebox->editMessage(
                $draft_message_id,
                $from,
                MSG_STATUS_DRAFT,
                false,
                $to,
                $cc,
                $bcc,
                $subject,
                strip_tags($contents));

            if($ret) {

                //write contents into file

                $filename = gf_messages_filepath() . $draft_message_id;

                $this->write_message_contents($filename, $contents);

                redirect('/message_center/drafts', 'get');

            } else {

                $data['mode'] = MODE_DRAFTS;
                $data['error'] = "Failed to save!";
                $this->composebyWithData($data);

            }

        }
    }

    public function validate_contents($contents)
    {

        $str = trim(strip_tags($contents));

        if ($str == '')
        {
            $this->form_validation->set_message('validate_contents', 'Contents is empty!');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    public function validate_multiemail($emails)
    {

        if(trim($emails) == "") return TRUE;

        $arr_email = explode(',', $emails);

        foreach($arr_email as $email) {

            //validate email

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->form_validation->set_message('validate_multiemail', 'There is invalid email address!');
                return FALSE;
            }
        }

        return TRUE;

    }

    public function write_message_contents($file, $contents) {

        try {

            $handle = fopen($file, "w");
            fwrite($handle, $contents);
            fclose($handle);

        } catch(Exception $ex) {

            echo $ex->getMessage();
        }

    }

    public function read_message_contents($file) {

        try {

            if(file_exists($file)) {

                $handle = fopen($file, "r");
                $contents = fread($handle, filesize($file));
                fclose($handle);

                return $contents;
            } else {
                return "";
            }

        } catch(Exception $ex) {

            echo $ex->getMessage();

            return "";
        }

    }
}