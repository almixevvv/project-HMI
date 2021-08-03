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

    public function generateRandomID()
    {
        $randomSalt = md5(uniqid(rand(), true));
        $salt = substr($randomSalt, 0, MAX_PASSLENGTH);

        echo $salt;
    }

    public function resizeImage()
    {
        $this->db->select('*');
        $this->db->from('v_g_supply_images');

        $query = $this->db->get();

        foreach ($query->result() as $images) {

            $imagePath = './assets/img/histori-suplai/' . $images->IMAGE;
            $newPath   = './assets/img/resize-suplai/' . $images->IMAGE;

            $imgObject = new Gumlet\ImageResize($imagePath);

            if (getimagesize($imagePath)[0] > 800) {
                $imgObject->resizeToWidth(800);
                $imgObject->save($newPath);
            }
        }

        echo 'process finished';

        // $image = new Gumlet\ImageResize('./assets/img/histori-suplai/6c9bb2663b462c6d168c6b66ec3e4426.jpeg');

        // echo getimagesize('./assets/img/histori-suplai/6c9bb2663b462c6d168c6b66ec3e4426.jpeg')[0];

        // if()

        // if ($newObject->source_w > 800) {
        //     echo 'resize the image';
        // } else {
        //     echo 'keep it';
        // }

        // $image->resizeToWidth(300);
        // $image->save('image2.jpg');
    }

    public function postSalesDocument()
    {
        $config['upload_path']      = './assets/doc/';
        $config['allowed_types']    = '*';
        $config['file_ext_tolower'] = TRUE;
        $config['overwrite']        = TRUE;
        $config['encrypt_name']     = TRUE;

        $this->load->library('upload');
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('docUpload')) {
            $htmlTags = ['<p>', '</p>'];
            $errMsg = str_replace($htmlTags, '', $this->upload->display_errors());
            $error = array('error' => $errMsg);

            echo json_encode($error);
        } else {
            $data = array('upload_data' => $this->upload->data());
            echo json_encode($data);
        }
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

    function deleteDropzoneFiles()
    {
        $this->load->helper('file');

        $uploadPath = 'assets/doc/' . $this->input->post('images');

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

    function deleteIntroFiles()
    {
        $this->load->helper('file');

        $uploadPath = 'assets/img/histori-suplai/' . $this->input->post('images');
        $queryDelete = $this->cms->deleteHistoryImage($this->input->post('images'));

        if (unlink($uploadPath) && $queryDelete) {
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

    public function getHistorySupply()
    {
        $start = $this->input->get('start');
        $limit   = $this->input->get('limit');
        $loadCounter = $this->input->get('counter');
        $queryData = $this->cms->getSupplyWithLimit($limit, $start);

        $counter = 0;
        if ($queryData->num_rows() != 0) {
            foreach ($queryData->result() as $data) {
                $mainArr[$counter] = array(
                    'DESCRIPTION'   => $data->DESCRIPTION,
                    'NAME'          => $data->NAME,
                    'IMAGE'         => $data->IMAGE,
                    'PARENT'        => $data->IMAGE_PARENT
                );

                $counter++;
            }

            $dtEncode = json_encode($mainArr);

            $msg = array(
                'status'    => 200,
                'message'   => 'error while deleting files',
                'data'      => json_decode($dtEncode),
                'button'    => ($loadCounter >= 3 ? true : false),
                'code'      => 501
            );

            echo json_encode($msg);
        }
    }

    public function postSOData()
    {
        $this->db->trans_begin();

        $masterData = array(
            'PO_NO'         => $this->input->post('salesPO'),
            'PO_DATE'       => $this->input->post('salesCreatePO'),
            'PO_FILE'       => $this->input->post('fileName'),
            'CREATED'       => date('Y-m-d h:i:s'),
            'SO_STATUS'     => 'UNPAID'
        );

        $this->sales->insertSOData($masterData);

        $data = array(
            'USER_ID'       => $this->session->userdata('NAME'),
            'ACTION_TYPE'   => 'POST',
            'ACTION_MODULE' => 'SALES ORDER',
            'ACTION_DATA'   => $this->input->post('salesPO'),
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

    public function updateSOData()
    {
        $this->db->trans_begin();

        if ($this->input->post('editSJPO') != null) {
            $sjData = array(
                'DO_DATE'       => $this->input->post('editSJPO'),
                'DO_FILE'       => $this->input->post('suratJalan'),
                'SO_STATUS'     => 'DELIVERED',
                'UPDATED'       => date('Y-m-d h:i:s')
            );

            $data = array(
                'USER_ID'       => $this->session->userdata('NAME'),
                'ACTION_TYPE'   => 'UPDATE',
                'ACTION_MODULE' => 'SALES ORDER',
                'ACTION_DATA'   => $this->input->post('salesPO'),
                'CREATED_AT'    => date('Y-m-d h:i:s')
            );

            $this->sales->updateSOData($this->input->post('editPO'), $sjData);
            $this->cms->postLogData($data);
        }

        if ($this->input->post('editInvoicePO') != null) {
            $invoiceData = array(
                'INVOICE_DATE'  => $this->input->post('editInvoicePO'),
                'INVOICE_FILE'  => $this->input->post('invoice'),
                'SO_STATUS'     => 'PAID',
                'UPDATED'       => date('Y-m-d h:i:s')
            );

            $data = array(
                'USER_ID'       => $this->session->userdata('NAME'),
                'ACTION_TYPE'   => 'UPDATE',
                'ACTION_MODULE' => 'SALES ORDER',
                'ACTION_DATA'   => $this->input->post('salesPO'),
                'CREATED_AT'    => date('Y-m-d h:i:s')
            );

            $this->sales->updateSOData($this->input->post('editPO'), $invoiceData);
            $this->cms->postLogData($data);
        }

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
        $parentData = array(
            'DESCRIPTION'   => $this->input->post('editDetail'),
            'NAME'          => $this->input->post('editName'),
            'UPDATED'       => date('Y-m-d h:i:s')
        );

        if ($this->input->post('fileName') != null && $this->input->post('fileType') != null) {

            $imageArr = explode(',', $this->input->post('fileName'));
            $imgCounter = count($imageArr);

            $this->db->trans_begin();

            for ($i = 0; $i < $imgCounter; $i++) {
                $imageData = array(
                    'IMAGE'         => $imageArr[$i],
                    'IMAGE_PARENT'  => $this->input->post('editID'),
                    'STATUS'        => 'ACTIVE'
                );

                $this->cms->insertSupply($imageData);
            }

            $this->cms->updateSupply($this->input->post('editID'), $parentData);

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();

                echo json_encode(array(
                    'status'    => 200,
                    'code'      => 501,
                    'message'   => 'error while processing data'
                ));
            } else {
                $this->db->trans_commit();

                $logData = array(
                    'USER_ID'       => $this->session->userdata('NAME'),
                    'ACTION_TYPE'   => 'UPDATE',
                    'ACTION_MODULE' => 'SUPPLY',
                    'ACTION_DATA'   => $this->input->post('editName'),
                    'CREATED_AT'    => date('Y-m-d h:i:s')
                );

                $this->cms->postLogData($logData);

                echo json_encode(array(
                    'status'    => 200,
                    'code'      => 200,
                    'message'   => 'data updated'
                ));
            }
        } else {
            $this->cms->updateSupply($this->input->post('editID'), $parentData);

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();

                echo json_encode(array(
                    'status'    => 200,
                    'code'      => 501,
                    'message'   => 'error while processing data'
                ));
            } else {
                $this->db->trans_commit();

                $logData = array(
                    'USER_ID'       => $this->session->userdata('NAME'),
                    'ACTION_TYPE'   => 'UPDATE',
                    'ACTION_MODULE' => 'SUPPLY',
                    'ACTION_DATA'   => $this->input->post('editName'),
                    'CREATED_AT'    => date('Y-m-d h:i:s')
                );

                $this->cms->postLogData($logData);

                echo json_encode(array(
                    'status'    => 200,
                    'code'      => 200,
                    'message'   => 'data updated'
                ));
            }
        }
    }

    public function deleteSupplyData()
    {
        $queryDelete = $this->cms->deleteSupply($this->input->post('id'));

        if ($queryDelete) {

            $data = array(
                'USER_ID'       => $this->session->userdata('NAME'),
                'ACTION_TYPE'   => 'DELETE',
                'ACTION_MODULE' => 'SUPPLY',
                'ACTION_DATA'    => $this->input->post('id'),
                'CREATED_AT'    => date('Y-m-d h:i:s')
            );

            $this->cms->postLogData($data);

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
        $queryDetail = $this->cms->getSpecificSupply($this->input->get('id'));
        $counter = 0;

        foreach ($queryDetail->result() as $dt) {
            $imgArr[$counter] = array(
                'IMAGE' => $dt->IMAGE
            );

            $dtArr = array(
                'IMAGE_PARENT'  => $dt->IMAGE_PARENT,
                'DESCRIPTION'   => $dt->DESCRIPTION,
                'NAME'          => $dt->NAME
            );

            $counter++;
        }

        $imgEncode = json_encode($imgArr);
        $dtEncode = json_encode($dtArr);

        echo json_encode(array(
            'status'    => 200,
            'code'      => 200,
            'data'      => json_decode($dtEncode),
            'image'     => json_decode($imgEncode),
            'message'   => 'success'
        ));
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
