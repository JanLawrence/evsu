<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subjects_model extends CI_Model{
    public function __construct(){
        $this->user = isset($this->session->userdata['user']) ? $this->session->userdata['user'] : ''; //get session
    }
    public function getAllDataSubjects($id){
        $this->db->select('s.*')
         ->from('tbl_subject s')
         ->where('s.status', 'saved');
        if($id != 0){ // if id not equal to 0 the query will filter per teacher id 
            $this->db->where('s.id', $id);
        }
        $query = $this->db->get(); // get results of query
        return $query->result();
    }
    public function showSubj($id){
        $this->db->select('s.id,s.section_id, s.subject_name,sec.section,sec.grade,s.status')
        ->from('tbl_subject s')
        ->join('tbl_section sec','ON sec.id = s.section_id','left')
        ->where('s.status','saved');
        if($id != 0){ // if id not equal to 0 the query will filter per teacher id 
            $this->db->where('s.id', $id);
        }
        $query = $this->db->get();
        return $query->result();
    }
	public function addSubject(){
        // data that will be inserted to tbl_subject
        $data = array(
            'section_id' => $_POST['section'],
            'subject_name' => $_POST['subject'],
            'created_by' => $this->user->id,
            'date_created' => date('Y-m-d H:i:s')
        );
        
        $this->db->insert('tbl_subject', $data); // insert into tbl_subject
    
        $userData = $this->session->userdata['user'];
        $dataLog = array(
            'user_id' => $userData->user_id,
            'user_type' => $userData->user_type,
            'transaction' => 'Add New Subject',
            'transaction_date' => date('Y-m-d H:i:s')
        );
        $this->db->insert('tbl_user_logs', $dataLog); // insert into tbl_user_logs

        $this->session->set_flashdata('msg', 'Subject was successfully saved.');
        redirect(base_url().'subjects'); //redirect back to subjects page


	}
    public function editSubject($id){

        // data that will be updated to tbl_subjects
        $this->db->set('section_id', $_POST['section']);
        $this->db->set('subject_name', $_POST['subject']);
        $this->db->set('modified_by', $this->user->id);
        $this->db->set('date_modified', date('Y-m-d H:i:s'));
        $this->db->where('id', $id);
        $this->db->update('tbl_subject'); //update tbl_subject

        $userData = $this->session->userdata['user'];
        $dataLog = array(
            'user_id' => $userData->user_id,
            'user_type' => $userData->user_type,
            'transaction' => 'Edit Subject',
            'transaction_date' => date('Y-m-d H:i:s')
        );
        $this->db->insert('tbl_user_logs', $dataLog); // insert into tbl_user_logs

        $this->session->set_flashdata('msg', 'Subject was successfully updated.');
        redirect(base_url().'subjects'); //redirect back to subjects page
    }
    public function delete(){
        foreach($_POST['subjectId'] as $each){ // looping the ids for tbl_subject
            //$this->db->delete('tbl_subject', array('id' => $each)); // delete from tbl_subject
            $this->db->set('status', 'deleted'); // delete from tbl_subject
            $this->db->where('id', $each);
            $this->db->update('tbl_subject'); //delete tbl_subject
        }

        $userData = $this->session->userdata['user'];
        $dataLog = array(
            'user_id' => $userData->user_id,
            'user_type' => $userData->user_type,
            'transaction' => 'Delete Subject',
            'transaction_date' => date('Y-m-d H:i:s')
        );
        $this->db->insert('tbl_user_logs', $dataLog); // insert into tbl_user_logs

        $this->session->set_flashdata('msg', 'Subject/s was successfully deleted.');
        redirect(base_url().'subjects'); //redirect back to subjects page
	}
}
