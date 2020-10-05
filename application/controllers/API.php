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

    function postMessagetoEmail()
    {
        $formData = array(
            'MESSAGE_TITLE'         => $this->input->post('subject'),
            'MESSAGE_BODY'          => $this->input->post('message'),
            'MESSAGE_SENDER'        => $this->input->post('email'),
            'MESSAGE_SENDER_NAME'   => $this->input->post('name'),
            'CREATED_AT'            => date('Y-m-d h:i:s'),
            'STATUS'                => 'ACTIVE'
        );

        $queryEmail = $this->cms->insertMessage($formData);

        if ($queryEmail) {

            $message = $this->load->view('email-template/contact', $formData, true);

            $this->load->library('email');
            $this->email->from('admin@haluanmaritim.co.id', 'Haluan Maritim Internasional');
            $this->email->to('al.mixev@gmail.com');
            $this->email->set_mailtype('html');

            $this->email->subject($this->input->post('subject'));
            $this->email->message($message);

            $sendStat = $this->email->send();

            $this->email->print_debugger($sendStat);

            $msg = array(
                'status'    => 200,
                'message'   => 'email sent',
                'code'      => 200
            );
        } else {
            $msg = array(
                'status'    => 200,
                'message'   => 'error while sending email',
                'code'      => 501
            );
        }

        echo json_encode($msg);
    }

    function updateMessageStatus()
    {
        $queryUpdate = $this->cms->updateMessageStatus($this->input->post('id'));

        if ($queryUpdate) {
            $msg = array(
                'status'    => 200,
                'message'   => 'email updated',
                'code'      => 200
            );
        } else {
            $msg = array(
                'status'    => 200,
                'message'   => 'error while updating email',
                'code'      => 501
            );
        }

        echo json_encode($msg);
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
        $imageArr = explode(',', $this->input->post('fileName'));
        $imgCounter = count($imageArr);

        $randomSalt = md5(uniqid(rand(), true));
        $salt = substr($randomSalt, 0, MAX_PASSLENGTH);

        $this->db->trans_begin();

        for ($i = 0; $i < $imgCounter; $i++) {
            $data = array(
                'IMAGE'         => $imageArr[$i],
                'IMAGE_PARENT'  => $salt,
                'STATUS'        => 'ACTIVE'
            );

            $this->cms->insertSupply($data);
        }

        $masterData = array(
            'SUPPLY_ID'     => $salt,
            'DESCRIPTION'   => $this->input->post('supplyDetail'),
            'NAME'          => $this->input->post('supplyName')
        );

        $this->cms->insertSupplyMaster($masterData);

        $data = array(
            'USER_ID'       => $this->session->userdata('NAME'),
            'ACTION_TYPE'   => 'POST',
            'ACTION_MODULE' => 'SUPPLY',
            'ACTION_DATA'   => $this->input->post('supplyName'),
            'CREATED_AT'    => date('Y-m-d h:i:s')
        );

        $this->cms->postLogData($data);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();

            echo json_encode(array(
                'status'    => 200,
                'code'      => 501,
                'message'   => 'error while processing data'
            ));
        } else {
            $this->db->trans_commit();

            echo json_encode(array(
                'status'    => 200,
                'code'      => 200,
                'message'   => 'data inserted'
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

                $data = array(
                    'USER_ID'       => $session['NAME'],
                    'ACTION_TYPE'   => 'LOGIN',
                    'ACTION_MODULE' => 'ACCOUNT',
                    'ACTION_DATA'    => 'Login sebagai ' . $session['GROUP_ID'],
                    'CREATED_AT'    => date('Y-m-d h:i:s')
                );

                $this->cms->postLogData($data);

                echo json_encode(array(
                    'code'      => 200,
                    'status'    => 200,
                    'message'   => 'proceed_login',
                    'user'      => $session['NAME']
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

    function updatePassword()
    {
        $randomSalt = md5(uniqid(rand(), true));
        $salt = substr($randomSalt, 0, MAX_PASSLENGTH);
        $hashPassword = hash('sha256', $this->input->post('pass') . $salt);

        $data = array(
            'PASS'  => $hashPassword,
            'SALT'  => $salt
        );

        $queryUpdate = $this->cms->updatePassword($data);
        if ($queryUpdate) {
            $msg = array(
                'status'    => 200,
                'message'   => 'password changed',
                'code'      => 200
            );
        } else {
            $msg = array(
                'status'    => 200,
                'message'   => 'error while updating password',
                'code'      => 501
            );
        }

        $data = array(
            'USER_ID'       => $this->session->userdata('NAME'),
            'ACTION_TYPE'   => 'UPDATE',
            'ACTION_MODULE' => 'PASSWORD',
            'ACTION_DATA'    => 'Password',
            'CREATED_AT'    => date('Y-m-d h:i:s')
        );

        $this->cms->postLogData($data);

        echo json_encode($msg);
    }
}
