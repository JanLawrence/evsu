<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Section_model extends CI_Model{
    public function __construct(){
        $this->user = isset($this->session->userdata['user']) ? $this->session->userdata['user'] : ''; //get session
    }
    public function showTeacher(){
        $this->db->select('id, CONCAT(last_name,", ",first_name," ",middle_name) name')
        ->from('tbl_teacher')
        ->where('status','saved');
        $query = $this->db->get();
        return $query->result();
    }
    public function showSection($id){
        $this->db->select("s.id,s.section,s.grade,s.teacher_id, CONCAT(t.last_name,', ',t.first_name,' ',t.middle_name) name")
        ->from("tbl_section s")
        ->join("tbl_teacher t","ON t.id = s.teacher_id","inner")
        ->where("s.status","saved");
        if($id != 0){ // if id not equal to 0 the query will filter per section id 
            $this->db->where('s.id', $id);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function addSection(){
        // data that will be inserted to tbl_section
        $data = array(
            'teacher_id' => $_POST['teacher'],
            'section' => $_POST['section'],
            'grade' => $_POST['grade'],
            'created_by' => $this->user->id,
            'date_created' => date('Y-m-d H:i:s')
        );
        
        $this->db->insert('tbl_section', $data); // insert into tbl_section
        
        $userData = $this->session->userdata['user'];
        $dataLog = array(
            'user_id' => $userData->user_id,
            'user_type' => $userData->user_type,
            'transaction' => 'Add New Section',
            'transaction_date' => date('Y-m-d H:i:s')
        );
        $this->db->insert('tbl_user_logs', $dataLog); // insert into tbl_user_logs

        $this->session->set_flashdata('msg', 'Section was successfully saved.');
        redirect(base_url().'section'); //redirect back to sections page
    }
    public function editSection($id){
        // data that will be updated to tbl_section
        $this->db->set('teacher_id', $_POST['teacher']);
        $this->db->set('section', $_POST['section']);
        $this->db->set('grade', $_POST['grade']);
        $this->db->set('modified_by', $this->user->id);
        $this->db->set('date_modified', date('Y-m-d H:i:s'));
        $this->db->where('id', $id);
        $this->db->update('tbl_section'); //update tbl_section

        
        $userData = $this->session->userdata['user'];
        $dataLog = array(
            'user_id' => $userData->user_id,
            'user_type' => $userData->user_type,
            'transaction' => 'Edit Section',
            'transaction_date' => date('Y-m-d H:i:s')
        );
        $this->db->insert('tbl_user_logs', $dataLog); // insert into tbl_user_logs

        $this->session->set_flashdata('msg', 'Section was successfully updated.');
        redirect(base_url().'section'); //redirect back to sections page
    }
    public function delete(){
        foreach($_POST['id'] as $each){ // looping the ids for tbl_section
            //$this->db->delete('tbl_section', array('id' => $each)); // delete from tbl_section
            $this->db->set('status', 'deleted'); // delete from tbl_section
            $this->db->where('id', $each);
            $this->db->update('tbl_section'); //delete tbl_section
        }

        $userData = $this->session->userdata['user'];
        $dataLog = array(
            'user_id' => $userData->user_id,
            'user_type' => $userData->user_type,
            'transaction' => 'Delete section',
            'transaction_date' => date('Y-m-d H:i:s')
        );
        $this->db->insert('tbl_user_logs', $dataLog); // insert into tbl_user_logs

        $this->session->set_flashdata('msg', 'section/s was successfully deleted.');
        redirect(base_url().'section'); //redirect back to sections page
	}
    /* public function getAllDatasections($id){
        $this->db->select('s.*')
         ->from('tbl_section s')
         ->where('s.status', 'saved');
        if($id != 0){ // if id not equal to 0 the query will filter per teacher id 
            $this->db->where('s.id', $id);
        }
        $query = $this->db->get(); // get results of query
        return $query->result();
    }
	public function addsection(){
        // data that will be inserted to tbl_section
        $data = array(
            'section_name' => $_POST['section'],
            'created_by' => $this->user->id,
            'date_created' => date('Y-m-d H:i:s')
        );
        
        $this->db->insert('tbl_section', $data); // insert into tbl_section
        
        $userData = $this->session->userdata['user'];
        $dataLog = array(
            'user_id' => $userData->user_id,
            'user_type' => $userData->user_type,
            'transaction' => 'Add New section',
            'transaction_date' => date('Y-m-d H:i:s')
        );
        $this->db->insert('tbl_user_logs', $dataLog); // insert into tbl_user_logs

        $this->session->set_flashdata('msg', 'section was successfully saved.');
        redirect(base_url().'sections'); //redirect back to sections page


	}
    public function editsection($id){

        // data that will be updated to tbl_section
        $this->db->set('section_name', $_POST['section']);
        $this->db->set('modified_by', $this->user->id);
        $this->db->set('date_modified', date('Y-m-d H:i:s'));
        $this->db->where('id', $id);
        $this->db->update('tbl_section'); //update tbl_section

        
        $userData = $this->session->userdata['user'];
        $dataLog = array(
            'user_id' => $userData->user_id,
            'user_type' => $userData->user_type,
            'transaction' => 'Edit section',
            'transaction_date' => date('Y-m-d H:i:s')
        );
        $this->db->insert('tbl_user_logs', $dataLog); // insert into tbl_user_logs

        $this->session->set_flashdata('msg', 'section was successfully updated.');
        redirect(base_url().'sections'); //redirect back to sections page
    }
    public function delete(){
        foreach($_POST['sectionId'] as $each){ // looping the ids for tbl_section
            //$this->db->delete('tbl_section', array('id' => $each)); // delete from tbl_section
            $this->db->set('status', 'deleted'); // delete from tbl_section
            $this->db->where('id', $each);
            $this->db->update('tbl_section'); //delete tbl_section
        }

        $userData = $this->session->userdata['user'];
        $dataLog = array(
            'user_id' => $userData->user_id,
            'user_type' => $userData->user_type,
            'transaction' => 'Delete section',
            'transaction_date' => date('Y-m-d H:i:s')
        );
        $this->db->insert('tbl_user_logs', $dataLog); // insert into tbl_user_logs

        $this->session->set_flashdata('msg', 'section/s was successfully deleted.');
        redirect(base_url().'sections'); //redirect back to sections page
	} */
}
