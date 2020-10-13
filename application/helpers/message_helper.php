<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function success_message()
{
    $CI =& get_instance();
    if ($CI->session->flashdata('success'))
    {
        echo "<div class='msg success'>"."<li>".$CI->session->flashdata('success')."</li>"."</div>";
    }
}
function error_message()
{
    $CI =& get_instance();
    if($CI->session->flashdata('error'))
    {
        echo "<div class='msg error'>"."<li>".$CI->session->flashdata('error')."</li>"."</div>";
    }
}