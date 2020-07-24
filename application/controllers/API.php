<?php
defined('BASEPATH') or exit('No direct script access allowed');

class API extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        header('Content-Type: application/json');
        // $this->output->enable_profiler(TRUE);
        // 431~K6|r
        // u489506459_hmi
    }

    public function postSupplyImage()
    {

        $config['upload_path']      = './assets/img/histori-suplai/';
        $config['allowed_types']    = '*';
        $config['file_ext_tolower'] = TRUE;
        $config['overwrite']        = TRUE;
        $config['encrypt_name']     = TRUE;

        $this->load->library('upload');
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('imgUpload')) {
            $htmlTags = ['<p>', '</p>'];
            $errMsg = str_replace($htmlTags, '', $this->upload->display_errors());
            $error = array('error' => $errMsg);

            echo json_encode($error);
        } else {
            $data = array('upload_data' => $this->upload->data());
            echo json_encode($data);
        }
    }

    function deleteIntroFiles()
    {
        $this->load->helper('file');

        $uploadPath = 'assets/img/histori-suplai/' . $this->input->post('images');

        if (unlink($uploadPath)) {
            $msg = array(
                'status'    => 200,
                'message'   => 'file deleted successfully',
                'code'      => 200
            );
        } else {
            $msg = array(
                'status'    => 200,
                'message'   => 'error while deleting files',
                'code'      => 501
            );
        }

        echo json_encode($msg);
    }

    public function postSupplyData()
    {
        $data = array(
            'NAME'        => $this->input->post('supplyName'),
            'DESCRIPTION' => $this->input->post('supplyDetail'),
            'IMAGE'       => $this->input->post('fileName')
        );

        $queryInsert = $this->cms->insertSupply($data);

        header('Content-Type: application/json');

        if ($queryInsert) {
            echo json_encode(array(
                'status'    => 200,
                'code'      => 200,
                'message'   => 'data inserted'
            ));
        } else {
            echo json_encode(array(
                'status'    => 200,
                'code'      => 501,
                'message'   => 'error while processing data'
            ));
        }
    }

    public function updateSupplyData()
    {
        $data = array(
            'DESCRIPTION'   => $this->input->post('editDetail'),
            'NAME'          => $this->input->post('editName'),
            'UPDATED'       => date('Y-m-d h:i:s')
        );

        $queryUpdate = $this->cms->updateSupply($this->input->post('editID'), $data);

        if ($queryUpdate) {
            echo json_encode(array(
                'status'    => 200,
                'code'      => 200,
                'message'   => 'data updated'
            ));
        } else {
            echo json_encode(array(
                'status'    => 200,
                'code'      => 501,
                'message'   => 'error while processing data'
            ));
        }
    }

    public function deleteSupplyData()
    {
        $queryDelete = $this->cms->deleteSupply($this->input->post('id'));

        if ($queryDelete) {
            echo json_encode(array(
                'status'    => 200,
                'code'      => 200,
                'message'   => 'data updated'
            ));
        } else {
            echo json_encode(array(
                'status'    => 200,
                'code'      => 501,
                'message'   => 'error while processing data'
            ));
        }
    }

    public function getSupplyDetail()
    {
        $queryDetail = $this->cms->getSupplyDetail($this->input->get('id'));

        foreach ($queryDetail->result() as $dt) {
            $dtArr['data'] = array(
                'REC_ID'        => $dt->REC_ID,
                'DESCRIPTION'   => $dt->DESCRIPTION,
                'IMAGE'         => $dt->IMAGE,
                'NAME'          => $dt->NAME
            );
        }

        $encode = json_encode($dtArr);

        echo $encode;
    }

    public function postLogin()
    {
        $username = $this->input->post('txt-username');
        $password = $this->input->post('txt-password');

        $userSalt = $this->cms->getSalt($username);

        //Check for existing user
        if ($userSalt->num_rows() > 0) {
            foreach ($userSalt->result() as $salt);
            $hashPassword = hash('sha256', $password . $salt->SALT);

            $query = $this->cms->getLoginDetails($username, $hashPassword);

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
                    'code'      => 200,
                    'status'    => 200,
                    'message'   => 'proceed_login',
                    'user'      => $data->NAME
                ));
            } else {
                //Wrong password
                echo json_encode(array(
                    'status'    => 200,
                    'code'      => 501,
                    'message'   => 'wrong_password'
                ));
            }
        } else {
            echo json_encode(array(
                'status'    => 200,
                'code'      => 501,
                'message'   => 'no_user'
            ));
        }
    }
}
