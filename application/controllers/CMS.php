<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CMS extends CI_Controller
{
    public function index()
    {
    	$data['page'] = 'LOGIN';

        $this->load->view('templates-cms/header', $data);
        // $this->load->view('templates/navbar');
        $this->load->view('pages-cms/home');
        // $this->load->view('templates/footer');
    }

    public function login_process()
    {

    }

    public function dashboard()
    {
    	$data['page'] = 'DASHBOARD';

        $this->load->view('templates-cms/header', $data);

        $this->load->view('pages-cms/home');
        // $this->load->view('templates/footer');
    }
}