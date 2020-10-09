<?php
defined('BASEPATH') or exit('No direct script access allowed');

//HMI Main
$route['default_controller'] = 'Home';

$route['histori']   = 'Home/history';
//HMI CMS
$route['cms'] = 'CMS';
$route['cms/dashboard'] = 'CMS/dashboard';
$route['cms/history'] = 'Histori_suplai';
$route['cms/sales_order'] = 'Sales_order';

$route['history/supply'] = 'Histori_suplai/supplyHistoryList';
$route['history/detail'] = 'Histori_suplai/detailSupply';

$route['404_override'] = 'Custom404';
$route['translate_uri_dashes'] = FALSE;
