<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{
    public $data = [];
    public function __construct()
    {
        parent::__construct();
        $this->load->model('student_model');
    }
    

    public function index()
    {
        $this->access_control->logged_in_and_is_admin();
        $this->data['title'] = 'Make a search';
        $object = new Student_model;
        
        //search for matching words
        if ($this->input->post('search')) 
        {
            $this->data['students']      = $object->search_for_student($this->input->post('search'));
            $this->data['title']      = ucwords("You searched for '{$this->input->post('search')}'");
        }
        else
        {
            $this->data['students'] = $object->get_all_students();
        }
        $this->load->view('admin/manage', $this->data);
    }
    private function login()
    {
        $this->load->view('admin/login');
    }
    public function delete($id)
    {
        $this->access_control->logged_in_and_is_admin();
        $this->student_model->delete_student($id);
        $this->session->set_flashdata('success', 'Student deleted successfully');
        redirect('admin/dashboard');
    }
    public function activate()
    {
        $this->access_control->logged_in_and_is_admin();
        $object         = new Student_model;
        $activate_id    = $this->input->get('activate_id');
        $activated      = $this->input->get('activated');
        if ($object->update_activate($activate_id, $activated)) 
        {
            $this->session->set_flashdata('success', ucwords('status updated successfully'));
            redirect('admin/dashboard/index');
        }
    }
}

/* End of file Dashboard.php */
