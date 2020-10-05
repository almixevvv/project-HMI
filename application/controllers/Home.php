<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->output->enable_profiler(TRUE);
    }

    public function index()
    {
        $data['supplyHistory']  = $this->cms->getThreeSupplyList();
        $data['lastCounter']    = 0;
        $data['counter']        = 0;

        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('pages/home', $data);
        $this->load->view('templates/footer');
    }
}
