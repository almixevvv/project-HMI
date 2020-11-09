<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Histori_suplai extends CI_Controller
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
        $data['page']       = 'Histori Suplai';
        $data['history']    = $this->cms->getSupplyCount();
        $data['counter']    = 1;

        $this->load->view('templates-cms/header', $data);
        $this->load->view('templates-cms/navbar');
        $this->load->view('templates-cms/sidebar');
        $this->load->view('pages-cms/histori_suplai');
        $this->load->view('templates-cms/footer');
    }

    public function supplyHistoryList()
    {
        $data['page']       = 'Histori Suplai';
        $data['allHistory']  = $this->cms->getSupplyWithLimit(9, 1);

        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('pages/history', $data);
        $this->load->view('templates/footer');
    }

    public function detailSupply()
    {
        $queryProduct = $this->history->getSupplyDetail($this->input->get('id'));
        $prodTitle = $queryProduct->row();

        $data['page']               = 'Histori Suplai';
        $data['randomProduct']      = $this->history->getRandomSupply();
        $data['allHistory']         = $queryProduct;
        $data['productName']        = $prodTitle->NAME;
        $data['productDescription'] = $prodTitle->DESCRIPTION;

        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('pages/historyDetail', $data);
        $this->load->view('templates/footer');
    }
}
