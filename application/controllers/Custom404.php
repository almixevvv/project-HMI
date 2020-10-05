<?php if (!defined("BASEPATH")) exit("Hack Attempt");

class Custom404 extends CI_Controller
{
    function __construct()
    {
        parent::__construct(true);
        $this->load->helper('url');
    }


    function index()
    {
        $this->output->set_status_header('404');

        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('pages/error404');
        $this->load->view('templates/footer');
    }
}
