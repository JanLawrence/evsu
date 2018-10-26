<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subjects_model extends CI_Model{
    public function __construct(){
        $this->user = isset($this->session->userdata['user']) ? $this->session->userdata['user'] : ''; //get session
    }
    public function getAllDataSubjects($id){
        $this->db->select('s.*')
         ->from('tbl_subject s');
        if($id != 0){ // if id not equal to 0 the query will filter per teacher id 
            $this->db->where('s.id', $id);
        }
        $query = $this->db->get(); // get results of query
        return $query->result();
    }
	public function addSubject(){
        // data that will be inserted to tbl_subject
        $data = array(
            'subject_name' => $_POST['subject'],
            'created_by' => $this->user->id,
            'date_created' => date('Y-m-d H:i:s')
        );
        
        $this->db->insert('tbl_subject', $data); // insert into tbl_subject
        
        $userData = $this->session->userdata['user'];
        $dataLog = array(
            'user_id' => $userData->user_id,
            'user_type' => 'admin',
            'transaction' => 'Add Subject',
            'transaction_date' => date('Y-m-d H:i:s')
        );
        $this->db->insert('tbl_user_logs', $dataLog); // insert into tbl_user_logs

        redirect(base_url().'subjects'); //redirect back to subjects page


	}
    public function editSubject($id){

        // data that will be updated to tbl_subject
        $this->db->set('subject_name', $_POST['subject']);
        $this->db->set('modified_by', $this->user->id);
        $this->db->set('date_modified', date('Y-m-d H:i:s'));
        $this->db->where('id', $id);
        $this->db->update('tbl_subject'); //update tbl_subject

        
        $userData = $this->session->userdata['user'];
        $dataLog = array(
            'user_id' => $userData->user_id,
            'user_type' => 'admin',
            'transaction' => 'Edit Subject',
            'transaction_date' => date('Y-m-d H:i:s')
        );
        $this->db->insert('tbl_user_logs', $dataLog); // insert into tbl_user_logs

        redirect(base_url().'subjects'); //redirect back to subjects page
    }
    public function delete(){
        foreach($_POST['subjectId'] as $each){ // looping the ids for tbl_subject
            $this->db->delete('tbl_subject', array('id' => $each)); // delete from tbl_subject
        }

        $userData = $this->session->userdata['user'];
        $dataLog = array(
            'user_id' => $userData->user_id,
            'user_type' => 'admin',
            'transaction' => 'Delete Subject',
            'transaction_date' => date('Y-m-d H:i:s')
        );
        $this->db->insert('tbl_user_logs', $dataLog); // insert into tbl_user_logs

        redirect(base_url().'subjects'); //redirect back to subjects page
	}
}
