<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller 
{
    public $data = NULL;
    public $updated = NULL;
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['form_validation', 'upload']);
        $this->load->model('student_model');
        $this->load->helper(['date', 'format_date']);
    }
    /**
     * Displays a user's account informations
     * @param int $id
     */
    public function account($id)
    {
        $this->access_control->check_if_user_is_logged_in();
        $this->data['student_infos'] = $this->student_model->get_student_info($id);
        $this->load->view('user/account', $this->data);
    }
    /**
     * Creates a new student
     */
    public function register()
    {
        $this->access_control->guests_only();
       if ($this->form_validation->run('students/register') === FALSE) 
       {
        $this->load->view('authentication/register');
       }
       else
       {
           $admin = $this->input->post('admin');
           $admin = 0;
           $this->data = [
                'admin'         => $admin,
                'first_name'    => $this->security->xss_clean($this->input->post('first_name')),
                'surname'       => $this->security->xss_clean($this->input->post('surname')),
                'username'      => $this->security->xss_clean($this->input->post('username')),
                'email'         => $this->security->xss_clean($this->input->post('email')),
                'gender'        => $this->security->xss_clean($this->input->post('gender')),
                'date_of_birth' => $this->security->xss_clean($this->input->post('date_of_birth')),
                'phone_no'      => $this->security->xss_clean($this->input->post('phone_no')),
                'password'      => $this->security->xss_clean(password_hash($this->input->post('password'), PASSWORD_BCRYPT))
           ];
           // configuration preferences for uploading images is located at config/upload.php
           if (!$this->upload->do_upload('image')) 
           { 
               $error['error'] = $this->upload->display_errors();
               $this->load->view('authentication/register', $error);
           }
           else 
           {
               $upload_data = $this->upload->data();
               $this->data['image'] = $upload_data['file_name'];
               $user_id = $this->student_model->insert($this->data); 
                $user   = $this->student_model->log_user_in_after_registering($user_id);
                // Log user in after registration
                $this->access_control->log_in_user($user);
           }  
       }
    }
    public function login()
    {
        $this->access_control->guests_only();
        $this->form_validation->set_rules('username', 'Username', 'required|regex_match[/^[a-zA-Z0-9]*$/]', ['required' => 'valid %s is required', 'regex_match' => 'invalid characters inserted']);
        $this->form_validation->set_rules('password', 'Password', 'required', ['required'=> 'valid %s is required']);
        if ($this->form_validation->run() === FALSE) 
        {
            $this->load->view('authentication/login');
        }
        else
        {
            $username   = $this->security->xss_clean($this->input->post('username'));
            $password   = $this->security->xss_clean($this->input->post('password'));
            $user       = $this->student_model->log_user_in($username);
            $password_verify = password_verify($password, $user->password);
            if ($user->username && $password_verify) 
            {
                $this->access_control->log_in_user($user);
            }
            elseif ($username !== $user->username OR $password !== $password_verify)
            {
                $this->session->set_flashdata('error', 'You need to provide valid credentials');
                redirect('Login');
            }
        }
    }
    public function log_user_out()
    {
        unset($_SESSION['id']);
        unset($_SESSION['username']);
        unset($_SESSION['admin']);
        session_destroy();
        redirect('Login');
    }
    public function edit($id)
    {
        $this->data['data_to_be_editted'] = $this->student_model->edit($id);
        $this->load->view('user/edit', $this->data);
    }
    public function update()
    {
        $this->access_control->check_if_user_is_logged_in();
        // if ($this->form_validation->run('students/update') === FALSE) 
        // {
        //     echo "All fields are required with the right input information";
        //     // $this->load->view('user/edit');
        // }
        // else
        // {
           $admin = $this->input->post('admin');
           $admin = 0;
           $this->data = [
                'admin'         => $admin,
                'first_name'    => $this->security->xss_clean($this->input->post('first_name')),
                'surname'       => $this->security->xss_clean($this->input->post('surname')),
                'username'      => $this->security->xss_clean($this->input->post('username')),
                'email'         => $this->security->xss_clean($this->input->post('email')),
                'gender'        => $this->security->xss_clean($this->input->post('gender')),
                'date_of_birth' => $this->security->xss_clean($this->input->post('date_of_birth')),
                'phone_no'      => $this->security->xss_clean($this->input->post('phone_no')),
                'password'      => $this->security->xss_clean(password_hash($this->input->post('password'), PASSWORD_BCRYPT))
           ];
           // configuration preferences for uploading images is located at config/upload.php
           if (!$this->upload->do_upload('image')) 
           { 
               $error['error'] = $this->upload->display_errors();
            //    $this->load->view('user/edit', $error);
           }
           else 
           {
               $upload_data = $this->upload->data();
               $this->data['image'] = $upload_data['file_name'];
               $this->updated = $this->student_model->update($this->input->post('id'), $this->data);
               if ($this->updated) 
                {
                $this->session->set_flashdata('success', ucwords('student\'s record updated successfully'));
                redirect('students/account');
                }
           }  
        //}
    }
}

/* End of file Controllername.php */
