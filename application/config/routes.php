<?php
defined('BASEPATH') or exit('No direct script access allowed');

//HMI Main
$route['default_controller'] = 'Home';

//HMI CMS
$route['cms'] = 'CMS';
$route['cms/dashboard'] = 'CMS/dashboard';
$route['cms/history'] = 'Histori_suplai';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
