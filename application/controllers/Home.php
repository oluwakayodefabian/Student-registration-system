<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public $header = NULL;
    public function __construct()
    {
        parent::__construct();
        
    }
    public function header()
    {
        
    }
    public function index()
    {
        $this->load->view('public/index');
    }

}

/* End of file Home.php */
