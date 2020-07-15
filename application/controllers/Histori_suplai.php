<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Histori_suplai extends CI_Controller
{
    public function index()
    {
        // $this->output->enable_profiler(TRUE);
        $this->load->library('session');

        $data['page']   = 'Histori Suplai';

        $this->load->view('templates-cms/header', $data);
        $this->load->view('templates-cms/navbar');
        $this->load->view('templates-cms/sidebar');
        $this->load->view('pages-cms/histori_suplai');
        $this->load->view('templates-cms/footer');
    }

}
