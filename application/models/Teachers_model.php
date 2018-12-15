<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teachers_model extends CI_Model{
    
    public function getAllDataTeachers($id){
        //query that joins teacher and subject
        $this->db->select('t.*, c.login_stat')
         ->from('tbl_teacher t')
         ->join('tbl_credentials c', 'c.user_id = t.id AND c.user_type = "teacher"', 'inner');
        if($id != 0){ // if id not equal to 0 the query will filter per teacher id 
            $this->db->where('t.id', $id);
        }
        $query = $this->db->get(); // get results of query
        return $query->result();
    }
    public function getAllDataSubjects(){
        $query = $this->db->get_where('tbl_subject', array('status' => 'saved')); // get all data for tbl_subject
        return $query->result();
    }
	public function addTeacher(){
        $userData = $this->session->userdata['user'];
        // data that will be inserted to tbl_teacher
        $data = array(
            'first_name' => $_POST['firstName'],
            'middle_name' => $_POST['middleName'],
            'last_name' => $_POST['lastName'],
            'phone' => $_POST['phone'],
            // 'advisory' => $_POST['advisory'],
            'address' => $_POST['address'],
            'email' => $_POST['email'],
            'school_id_no' => 1,
            'license_no' => 1,
            'registered' => 'yes',
            'created_by' => $userData->user_id,
            'date_created' => date('Y-m-d H:i:s')
        );
        
        $this->db->insert('tbl_teacher', $data); // insert into tbl_teacher
        $teacherId = $this->db->insert_id(); // getting the id of the inserted data

        // data that will be inserted to tbl_credentials
        $data = array(
            'username' => 'teacher_'.$teacherId,
            'password' => $this->encryptpass->pass_crypt('pass-123'),
            'user_type' => 'teacher',
            'confirm' => 'yes',
            'user_id' => $teacherId,
            'created_by' => $userData->user_id,
            'date_created' => date('Y-m-d H:i:s')
        );
        
        $this->db->insert('tbl_credentials', $data); // insert into tbl_credentials
        
        // data that will be inserted to tbl_teacher_subjects
        // $dataSubject = array(
        //     'teacher_id' => $teacherId,
        //     'subject_id' => $_POST['subject'],
        //     'created_by' => $userData->user_id,
        //     'date_created' => date('Y-m-d H:i:s')
        // );
        
        // $this->db->insert('tbl_teacher_subjects', $dataSubject); // insert into tbl_teacher_subjects
        
        $dataLog = array(
            'user_id' => $userData->user_id,
            'user_type' => $userData->user_type,
            'transaction' => 'Add New Teacher',
            'transaction_date' => date('Y-m-d H:i:s')
        );
        $this->db->insert('tbl_user_logs', $dataLog); // insert into tbl_user_logs

        $this->session->set_flashdata('msg', 'Teacher was successfully saved.');
        redirect(base_url().'teachers'); //redirect back to teacher page
	}
    public function editTeacher($id){
        $userData = $this->session->userdata['user'];
        
        // data that will be updated to tbl_teacher
        $this->db->set('first_name', $_POST['firstName']);
        $this->db->set('middle_name', $_POST['middleName']);
        $this->db->set('last_name', $_POST['lastName']);
        $this->db->set('phone', $_POST['phone']);
        // $this->db->set('advisory', $_POST['advisory']);
        $this->db->set('address', $_POST['address']);
        $this->db->set('email', $_POST['email']);
        $this->db->set('school_id_no', 1);
        $this->db->set('license_no', 1);
        $this->db->set('modified_by', $userData->user_id);
        $this->db->set('date_modified', date('Y-m-d H:i:s'));
        $this->db->where('id', $id);
        $this->db->update('tbl_teacher'); //update tbl_teacher
        
        // data that will be updated to tbl_teacher_subjects
        // $this->db->set('subject_id', $_POST['subject']);
        // $this->db->set('modified_by', $userData->user_id);
        // $this->db->set('date_modified', date('Y-m-d H:i:s'));
        // $this->db->where('teacher_id', $id);
        // $this->db->update('tbl_teacher_subjects'); // update tbl_teacher_subjects

        $dataLog = array(
            'user_id' => $userData->user_id,
            'user_type' => $userData->user_type,
            'transaction' => 'Edit Teacher Details',
            'transaction_date' => date('Y-m-d H:i:s')
        );
        $this->db->insert('tbl_user_logs', $dataLog); // insert into tbl_user_logs

        $this->session->set_flashdata('msg', 'Teacher was successfully updated.');
        redirect(base_url().'teachers'); //redirect back to teacher page
    }
    public function delete(){
        $userData = $this->session->userdata['user'];
        foreach($_POST['teacherId'] as $each){ // looping the ids for tbl_teacher
            //$this->db->delete('tbl_teacher', array('id' => $each)); // delete from tbl_teacher
            $this->db->set('status', 'deleted'); // delete from tbl_teacher
            $this->db->where('id', $each);
            $this->db->update('tbl_teacher'); //delete tbl_teacher

            $query = $this->db->get_where('tbl_teacher', array('id' => $each));
            $dataInsert = $query->result();
            $data = array(
                'first_name' => $dataInsert[0]->first_name,
                'middle_name' => $dataInsert[0]->middle_name,
                'last_name' => $dataInsert[0]->last_name,
                'phone' => $dataInsert[0]->phone,
                // 'advisory' => $dataInsert[0]->advisory,
                'address' => $dataInsert[0]->address,
                'email' => $dataInsert[0]->email,
                'school_id_no' => $dataInsert[0]->school_id_no,
                'license_no' => $dataInsert[0]->license_no,
                'status' => 'deleted',
                'registered' => $dataInsert[0]->registered,
                'created_by' => $userData->user_id,
                'date_created' => date('Y-m-d H:i:s')
            );
            
            $this->db->insert('tbl_teacher_deactivated', $data); // insert into tbl_teacher_deactivated
    
            $query = $this->db->get_where('tbl_credentials', array('user_id' => $each, 'user_type' => 'teacher'));
            $data = $query->result();
            $this->db->set('status', 'deleted'); // delete from tbl_credentials
            $this->db->where('id', $data[0]->id);
            $this->db->update('tbl_credentials'); //delete tbl_credentials
        }
        
        
        $dataLog = array(
            'user_id' => $userData->user_id,
            'user_type' => $userData->user_type,
            'transaction' => 'Deactivate Teacher',
            'transaction_date' => date('Y-m-d H:i:s')
        );
        $this->db->insert('tbl_user_logs', $dataLog); // insert into tbl_user_logs
        
        $this->session->set_flashdata('msg', 'Teacher/s was successfully deactivated.');
        redirect(base_url().'teachers'); //redirect back to teacher page
	}
}
