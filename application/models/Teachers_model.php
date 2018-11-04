<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teachers_model extends CI_Model{
    
    public function getAllDataTeachers($id){
        //query that joins teacher and subject
        $this->db->select('t.*, s.id subject_id , s.subject_name')
         ->from('tbl_teacher t')
         ->join('tbl_teacher_subjects ts', 'ts.teacher_id = t.id', 'inner')
         ->join('tbl_subject s', 's.id = ts.subject_id', 'inner');
        if($id != 0){ // if id not equal to 0 the query will filter per teacher id 
            $this->db->where('t.id', $id);
        }
        $query = $this->db->get(); // get results of query
        return $query->result();
    }
    public function getAllDataSubjects(){
        $query = $this->db->get('tbl_subject'); // get all data for tbl_subject
        return $query->result();
    }
	public function addTeacher(){

        // data that will be inserted to tbl_teacher
        $data = array(
            'first_name' => $_POST['firstName'],
            'middle_name' => $_POST['middleName'],
            'last_name' => $_POST['lastName'],
            'phone' => $_POST['phone'],
            'advisory' => $_POST['advisory'],
            'address' => $_POST['address'],
            'email' => $_POST['email'],
            'school_id_no' => 1,
            'license_no' => 1,
            'registered' => 'no',
            'created_by' => 1,
            'date_created' => date('Y-m-d H:i:s')
        );
        
        $this->db->insert('tbl_teacher', $data); // insert into tbl_teacher
        $teacherId = $this->db->insert_id(); // getting the id of the inserted data

        // data that will be inserted to tbl_credentials
        $data = array(
            'username' => 'teacher_'.$teacherId,
            'password' => $this->encryptpass->pass_crypt('pass-123'),
            'user_type' => 'teacher',
            'confirm' => 'no',
            'user_id' => $teacherId,
            'created_by' => 1,
            'date_created' => date('Y-m-d H:i:s')
        );
        
        $this->db->insert('tbl_credentials', $data); // insert into tbl_credentials
        
        // data that will be inserted to tbl_teacher_subjects
        $dataSubject = array(
            'teacher_id' => $teacherId,
            'subject_id' => $_POST['subject'],
            'created_by' => 1,
            'date_created' => date('Y-m-d H:i:s')
        );
        
        $this->db->insert('tbl_teacher_subjects', $dataSubject); // insert into tbl_teacher_subjects
        
        $userData = $this->session->userdata['user'];
        $dataLog = array(
            'user_id' => $userData->user_id,
            'user_type' => 'admin',
            'transaction' => 'Add Teacher',
            'transaction_date' => date('Y-m-d H:i:s')
        );
        $this->db->insert('tbl_user_logs', $dataLog); // insert into tbl_user_logs

        $this->session->set_flashdata('msg', 'Teacher was successfully saved.');
        redirect(base_url().'teachers'); //redirect back to teacher page
	}
    public function editTeacher($id){

        // data that will be updated to tbl_teacher
        $this->db->set('first_name', $_POST['firstName']);
        $this->db->set('middle_name', $_POST['middleName']);
        $this->db->set('last_name', $_POST['lastName']);
        $this->db->set('phone', $_POST['phone']);
        $this->db->set('advisory', $_POST['advisory']);
        $this->db->set('address', $_POST['address']);
        $this->db->set('email', $_POST['email']);
        $this->db->set('school_id_no', 1);
        $this->db->set('license_no', 1);
        $this->db->set('modified_by', 1);
        $this->db->set('date_modified', date('Y-m-d H:i:s'));
        $this->db->where('id', $id);
        $this->db->update('tbl_teacher'); //update tbl_teacher
        
        // data that will be updated to tbl_teacher_subjects
        $this->db->set('subject_id', $_POST['subject']);
        $this->db->set('modified_by', 1);
        $this->db->set('date_modified', date('Y-m-d H:i:s'));
        $this->db->where('teacher_id', $id);
        $this->db->update('tbl_teacher_subjects'); // update tbl_teacher_subjects

        $userData = $this->session->userdata['user'];
        $dataLog = array(
            'user_id' => $userData->user_id,
            'user_type' => 'admin',
            'transaction' => 'Edit Teacher',
            'transaction_date' => date('Y-m-d H:i:s')
        );
        $this->db->insert('tbl_user_logs', $dataLog); // insert into tbl_user_logs

        $this->session->set_flashdata('msg', 'Teacher was successfully updated.');
        redirect(base_url().'teachers'); //redirect back to teacher page
    }
    public function delete(){
        foreach($_POST['teacherId'] as $each){ // looping the ids for tbl_teacher
            $this->db->delete('tbl_teacher', array('id' => $each)); // delete from tbl_teacher
        }
        
        $userData = $this->session->userdata['user'];
        $dataLog = array(
            'user_id' => $userData->user_id,
            'user_type' => 'admin',
            'transaction' => 'Delete Teacher',
            'transaction_date' => date('Y-m-d H:i:s')
        );
        $this->db->insert('tbl_user_logs', $dataLog); // insert into tbl_user_logs
        
        $this->session->set_flashdata('msg', 'Teacher/s was successfully deleted.');
        redirect(base_url().'teachers'); //redirect back to teacher page
	}
}
