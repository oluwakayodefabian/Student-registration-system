<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function format_date($mysql_timestamp)
{
    $CI =& get_instance();
    $CI->load->helper('date');
    return mdate("%j, %F, %Y", strtotime($mysql_timestamp));
}