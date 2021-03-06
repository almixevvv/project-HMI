<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sales_order extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->output->enable_profiler(TRUE);
        // 4107b788b1e0e83df52f4af878e45cd350f3655f69fa714ea99410bc1c06d792
        // f00ab278e3
    }

    public function index()
    {
        $data['page']       = 'Sales Order';
        $data['sales']    = $this->sales->getSalesCount();
        $data['counter']    = 1;

        $this->load->view('templates-cms/header', $data);
        $this->load->view('templates-cms/navbar');
        $this->load->view('templates-cms/sidebar');
        $this->load->view('pages-cms/sales_order');
        $this->load->view('templates-cms/footer');
    }
}
