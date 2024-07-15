<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['login/client'] = "front_office/login";

$route['default_controller'] = 'front_office/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
