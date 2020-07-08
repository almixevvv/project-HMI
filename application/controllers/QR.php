<?php
defined('BASEPATH') or exit('No direct script access allowed');

class QR extends CI_Controller
{
    public function index()
    {
        $this->load->library('ciqrcode');

        header("Content-Type: image/png");
        $params['data'] = 'This is a dawd to dawdawd become QR Code';
        $params['level'] = 'H';
        $params['size'] = 100;
        $this->ciqrcode->generate($params);

        // $this->load->view('welcome_message');
    }
}
