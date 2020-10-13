<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Route for Home page
$route['Home']                          = 'Home/index';
$route['Register']                      = 'students/register';
$route['Login']                         = 'students/login';
$route['Logout']                        = 'students/log_user_out';
$route['edit/[:any]']                          = 'students/edit/$1';
$route['students/update']               = 'students/update';
$route['admin/dashboard/delete/[:any]'] = 'admin/dashboard/delete/$1';
$route['admin/dashboard']               = 'admin/dashboard/index';