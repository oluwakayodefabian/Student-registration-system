<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Access_control
{
    protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
    }
    public function logged_in_and_is_admin()
    {
        if (empty($_SESSION['id']) OR empty($_SESSION['admin'])) {
            echo "<div class='msg error'>"."<li>".$this->CI->session->set_flashdata('error', 'UNAUTHORIZED')."</li>"."</div>";
            redirect('Home');
        }
    }
    public function check_if_user_is_logged_in()
    {
        if (empty($_SESSION['id'])) 
        {
            echo "<div class='msg error'>"."<li>".$this->CI->session->set_flashdata('error', 'UNAUTHORIZED')."</li>"."</div>";
            redirect('Home');
        }
    }
    public function guests_only()
    {
        if (isset($_SESSION['id']))
        {
            echo "<div class='msg error'>"."<li>".$this->CI->session->set_flashdata('error', 'You can\'t view this page, because you are logged in already')."</li>"."</div>";
            redirect('Home');
        }
    }
    public function log_in_user($user)
    {
        if ($user) 
        {
            $_SESSION['id']         = $user->id;
            $_SESSION['username']   = $user->username;
            $_SESSION['admin']      = $user->admin;
            if ($_SESSION['admin']) 
            {
                $this->CI->session->set_flashdata('success', 'Welcome '.$user->username.' You are now logged in');
                redirect('admin/dashboard');
            }
            else
            {
                $this->CI->session->set_flashdata('success', 'Welcome '.$user->username.' You are now logged in');
                redirect('Home');
            }
        }
    }
    public function is_admin()
    {
        if (isset($_SESSION['admin'])) 
        {
            redirect('admin/dashboard/login');
        }        
    }
}

/* End of file Access_control_library.php */


