<?php
defined('BASEPATH') or exit('No direct script access allowed');

class API extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->output->enable_profiler(TRUE);
    }

    public function CMSLogin()
    {
        $username = $this->input->post('txt-username');
        $password = $this->input->post('txt-password');

        $userSalt = $this->cms->getSalt($username);

        header('Content-Type: application/json');

        //Check for existing user
        if ($userSalt->num_rows() > 0) {
            foreach ($userSalt->result() as $salt);
            $hashPassword = hash('sha256', $password . $salt->SALT);

            $query = $this->cms->login_cms($username, $hashPassword);

            //correct password
            if ($query->num_rows() > 0) {

                foreach ($query->result() as $data);

                $session = array(
                    'ID' => $data->ID,
                    'NAME' => $data->NAME,
                    'GROUP_ID' => $data->GROUP_ID
                );
                $this->session->set_userdata($session);

                echo json_encode(array(
                    'code'      => '200',
                    'status'    => 'success',
                    'message'   => 'proceed_login',
                    'user'      => $data->NAME
                ));
            } else {
                //Wrong password
                echo json_encode(array(
                    'code'      => '200',
                    'status'    => 'error',
                    'message'   => 'wrong_password'
                ));
            }
        } else {
            echo json_encode(array(
                'code'      => '200',
                'status'    => 'error',
                'message'   => 'no_user'
            ));
        }
    }
}
