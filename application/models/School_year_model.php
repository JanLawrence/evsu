<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class School_year_model extends CI_Model{
    public function __construct(){
        $this->user = isset($this->session->userdata['user']) ? $this->session->userdata['user'] : ''; //get session
    }
    public function showSchoolYear($id){
        $this->db->select('id,sy_from,sy_to, CONCAT(`sy_from`,"-",`sy_to`) school_year')
         ->from('tbl_school_year s')
         ->where("s.status","saved");
        if($id != 0){ // if id not equal to 0 the query will filter per teacher id 
            $this->db->where('s.id', $id);
        }
        $query = $this->db->get(); // get results of query
        return $query->result();
    }
	public function addSY(){
        // data that will be inserted to tbl_school_year
        $data = array(
            'sy_from' => $_POST['from'],
            'sy_to' => $_POST['to'],
            'created_by' => $this->user->id,
            'date_created' => date('Y-m-d H:i:s')
        );
        
        $this->db->insert('tbl_school_year', $data); // insert into tbl_school_year
        
        $userData = $this->session->userdata['user'];
        $dataLog = array(
            'user_id' => $userData->user_id,
            'user_type' => $userData->user_type,
            'transaction' => 'Add New School Year',
            'transaction_date' => date('Y-m-d H:i:s')
        );
        $this->db->insert('tbl_user_logs', $dataLog); // insert into tbl_user_logs

        $this->session->set_flashdata('msg', 'School Year was successfully saved.');
        redirect(base_url().'school_year'); //redirect back to school year page


	}
    public function editSY($id){

        // data that will be updated to tbl_school_year
        $this->db->set('sy_from', $_POST['from']);
        $this->db->set('sy_to', $_POST['to']);
        $this->db->set('modified_by', $this->user->id);
        $this->db->set('date_modified', date('Y-m-d H:i:s'));
        $this->db->where('id', $id);
        $this->db->update('tbl_school_year'); //update tbl_school_year

        
        $userData = $this->session->userdata['user'];
        $dataLog = array(
            'user_id' => $userData->user_id,
            'user_type' => $userData->user_type,
            'transaction' => 'Edit School Year',
            'transaction_date' => date('Y-m-d H:i:s')
        );
        $this->db->insert('tbl_user_logs', $dataLog); // insert into tbl_user_logs

        $this->session->set_flashdata('msg', 'School Year was successfully updated.');
        redirect(base_url().'school_year'); //redirect back to school year page
    }
    public function delete(){
        foreach($_POST['id'] as $each){ // looping the ids for tbl_school_year
            //$this->db->delete('tbl_school_year', array('id' => $each)); // delete from tbl_school_year
            $this->db->set('status', 'deleted'); // delete from tbl_school_year
            $this->db->where('id', $each);
            $this->db->update('tbl_school_year'); //delete tbl_school_year
        }

        $userData = $this->session->userdata['user'];
        $dataLog = array(
            'user_id' => $userData->user_id,
            'user_type' => $userData->user_type,
            'transaction' => 'Delete School Year',
            'transaction_date' => date('Y-m-d H:i:s')
        );
        $this->db->insert('tbl_user_logs', $dataLog); // insert into tbl_user_logs

        $this->session->set_flashdata('msg', 'School Year/s was successfully deleted.');
        redirect(base_url().'school_year'); //redirect back to school year page
	}
}
