<?php

defined('BASEPATH') or exit('No direct script access allowed');

// configuration preferences for uploading images
$config ['upload_path']     = APPPATH.'../assets/images';
$config ['allowed_types']   = 'gif|jpg|png';
$config['file_name']        = date('Ymdhis').'_'.mt_rand(1, 999999);
$config['max_size']         = 2048;
