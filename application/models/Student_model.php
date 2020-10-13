<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Student_model extends CI_Model 
{
    private $query = NULL;
    private $table = 'students';
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    /**
     * calls codeIgniter's insert function
     * @param array $data
     * @var $data
     */
    public function insert($data = [])
    {
        $this->query = $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    public function log_user_in_after_registering($user_id)
    {
        $this->query = $this->db->select('id')->from('students')->where(['id' => $user_id])->get();
        $result = $this->query->row();
        return $result;
    }
    public function log_user_in($username)
    {
        $this->query = $this->db->select('*')->from($this->table)->where(['username' => $username])->get();
        $row = $this->query->row_object();
        return $row;
    }
    public function get_all_students()
    {
        $this->query    = $this->db->where(['admin' => 0])->get($this->table);
        $result = $this->query->result();
        return $result;
    }
    public function get_student_info($id)
    {
        $this->query = $this->db->get_where($this->table, ['id' => $id]);
        $result = $this->query->result();
        return $result;
    }
    public function edit($id)
    {
        $this->query    = $this->db->get_where($this->table, ['id' =>$id]);
        $result         = $this->query->result_object();
        return $result;
        
    }
    /**
     * Updates a student's record
     * @param int $id
     * @param array $data
     */
    public function update(int $id, $data)
    {
        $this->query    = $this->db->where(['id' => $id])->update($this->table, $data);
        return $this->db->affected_rows();
    }
    public function delete_student($id)
    {
        $this->db->delete($this->table, ['id' => $id]);
        return $this->db->affected_rows();
        
    }
    public function update_activate($activate_id, $activated)
    {
        $this->db->where(['id' => $activate_id])->update($this->table, ['activated' => $activated]);
        // echo $this->db->last_query();
        // die();
        return $this->db->affected_rows();
    }
    public function search_for_student($term)
    {
        $this->query = $this->db->select('*')->from('students')->where(['admin' => 0])->like(['username' => $term])->or_like(['email' => $term])->get();
        // echo $this->db->last_query();
        // die();
        $result = $this->query->result();
        return $result;
    }

}

/* End of file Student_model.php */
