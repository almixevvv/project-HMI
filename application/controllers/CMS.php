<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CMS extends CI_Controller
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
        $data['page']   = 'Login';

        if ($this->session->has_userdata('ID')) {
            redirect(base_url('cms/dashboard'));
        }

        $this->load->view('templates-cms/header', $data);
        $this->load->view('pages-cms/login');
    }

    public function dashboard()
    {
        $data['page']           = 'Dashboard';
        $data['queryHistory']   = $this->cms->getLogData();
        $data['totalHistory']   = $this->cms->getSupplyCount();
        $data['unreadMessages'] = $this->cms->getUnreadEmail();

        $this->load->view('templates-cms/header', $data);
        $this->load->view('templates-cms/navbar');
        $this->load->view('templates-cms/sidebar');
        $this->load->view('pages-cms/home');
        $this->load->view('templates-cms/footer');
    }

    public function logout()
    {
        $this->session->unset_userdata('ID');
        $this->session->unset_userdata('NAME');
        $this->session->unset_userdata('GROUP_ID');

        redirect('cms');
    }

    public function getUnpaidSOData()
    {
        header('Content-Type: application/json');

        $querySO = $this->sales->getUnpaidSO();
        $output = '';

        if ($querySO->num_rows() > 0) {
            foreach ($querySO->result() as $data) {

                $curDate = new DateTime(date('Y-m-d h:i:s'));
                $endDate = new DateTime($data->CREATED);

                $interval = $curDate->diff($endDate);

                $output .=
                    '
                <a href="#">
                    <div class="notif-icon notif-primary"> <i class="fa fa-user-plus"></i> </div>
                    <div class="notif-content">
                        <span class="block">
                            SO nomor ' . $data->PO_NO .  ' belum dibayar
                        </span>
                        <span class="time"> ' . ($interval->d > 0 ? $interval->d . ' hari yang lalu' : 'hari ini') . '</span>
                    </div>
                </a>
                ';
            }

            echo json_encode(array(
                'status'    => 200,
                'code'      => 200,
                'result'    => $output,
                'rows'      => $querySO->num_rows(),
                'message'   => 'data found'
            ));
        } else {

            $output .=
                '
        <a href="#">
            <div class="notif-content w-100">
                <span class="block p-3">
                    <div class="d-flex justify-content-center">
                        <strong class="font-italic" style="color: #a2a2a2;">Tidak ada SO yang belum dibayar</strong>
                    </div>
                </span>
            </div>
        </a>
        ';

            echo json_encode(array(
                'status'    => 200,
                'code'      => 200,
                'result'    => $output,
                'rows'      => 0,
                'message'   => 'empty data'
            ));
        }
    }
}
