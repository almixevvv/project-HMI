<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CMS extends CI_Controller
{
    public function index()
    {
        $data['page']   = 'Login';

        $this->load->view('templates-cms/header', $data);
        // $this->load->view('templates-cms/navbar');
        // $this->load->view('templates-cms/sidebar');
        $this->load->view('pages-cms/login');
        // $this->load->view('templates-cms/footer');
    }

    public function login_process()
    {
        // $this->output->enable_profiler(TRUE);
        $this->load->library('session');

        $this->load->model('M_cms', 'cms');

        $username = $this->input->post('txt-username');
        $password = $this->input->post('txt-password');

        $checkUsername = $this->cms->checkUsername($username);

        //Check if username exist
        if($checkUsername->num_rows() > 0) {
            //Check if password match
            $query = $this->cms->login_cms($username, $password);
            if($query->num_rows() > 0) {
                foreach($query->result() as $data) {
                    $session = array(
                    'ID' => $data->ID,
                    'NAME' => $data->NAME,
                    'GROUP_ID' => $data->GROUP_ID
                );
                $this->session->set_userdata($session);
            }
            redirect('cms/dashboard');
            } else {
                redirect(site_url('cms/login?error=1'));
            }
        }else {
            redirect(site_url('cms/login?error=2'));
        }
    }

    public function dashboard()
    {
        // $this->output->enable_profiler(TRUE);
        $this->load->library('session');

        $data['page']   = 'Dashboard';

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
}
