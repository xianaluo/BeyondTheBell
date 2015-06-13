<?php
class Error extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        //$this->output->set_status_header('404');
        //$this->data['content'] = '404view';  // View name
        //$this->load->view('template', $data);
        $this->load->view('/errors/error404');
    }
}
?>