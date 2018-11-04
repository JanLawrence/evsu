<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_model extends CI_Model{
    
    public function getGuardianData($id){
        //query that joins teacher and subject
        $this->db->select('g.*, c.username, c.id cred_id, c.password')
         ->from('tbl_guardian g')
         ->join('tbl_credentials c', 'c.user_id = g.id AND user_type = "parent"', 'inner');
        if($id != 0){ // if id not equal to 0 the query will filter per guardian id 
            $this->db->where('g.id', $id);
        }
        $query = $this->db->get(); // get results of query
        return $query->result();
    }
    public function getStudentData($id){
        //query that joins teacher and subject
        $this->db->select('s.*, c.username, c.id cred_id, c.password')
         ->from('tbl_students s')
         ->join('tbl_credentials c', 'c.user_id = s.id AND user_type = "student"', 'inner');
        if($id != 0){ // if id not equal to 0 the query will filter per guardian id 
            $this->db->where('s.id', $id);
        }
        $query = $this->db->get(); // get results of query
        return $query->result();
    }
    public function getTeacherData($id){
        //query that joins teacher and subject
        $this->db->select('t.*, c.username, c.id cred_id, c.password, , s.id subject_id , s.subject_name')
         ->from('tbl_teacher t')
         ->join('tbl_credentials c', 'c.user_id = t.id AND user_type = "teacher"', 'inner')
         ->join('tbl_teacher_subjects ts', 'ts.teacher_id = t.id', 'inner')
         ->join('tbl_subject s', 's.id = ts.subject_id', 'inner');
        if($id != 0){ // if id not equal to 0 the query will filter per teacher id 
            $this->db->where('t.id', $id);
        }
        $query = $this->db->get(); // get results of query
        return $query->result();
    }
    public function getAdminData($id){
        //query that joins teacher and subject
        $this->db->select('a.*, c.username, c.id cred_id, c.password')
         ->from('tbl_admin a')
         ->join('tbl_credentials c', 'c.user_id = a.id AND user_type = "admin"', 'inner');
        if($id != 0){ // if id not equal to 0 the query will filter per teacher id 
            $this->db->where('a.id', $id);
        }
        $query = $this->db->get(); // get results of query
        return $query->result();
    }
    public function getAllDataSubjects(){
        $query = $this->db->get('tbl_subject'); // get all data for tbl_subject
        return $query->result();
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
        $this->db->set('school_id_no', $_POST['schoolId']);
        $this->db->set('license_no', $_POST['licenseNo']);
        $this->db->set('modified_by', $id);
        $this->db->set('date_modified', date('Y-m-d H:i:s'));
        $this->db->set('registered', 'yes');
        $this->db->where('id', $id);
        $this->db->update('tbl_teacher'); //update tbl_teacher
        
        // data that will be updated to tbl_teacher_subjects
        $this->db->set('subject_id', $_POST['subject']);
        $this->db->set('modified_by', $id);
        $this->db->set('date_modified', date('Y-m-d H:i:s'));
        $this->db->where('teacher_id', $id);
        $this->db->update('tbl_teacher_subjects'); // update tbl_teacher_subjects

        // data that will be updated to tbl_credentials
        $this->db->set('username', $_POST['username']);
        $this->db->set('modified_by', $id);
        $this->db->set('date_modified', date('Y-m-d H:i:s'));
        $this->db->where('id', $_POST['cred_id']);
        $this->db->update('tbl_credentials'); // update tbl_credentials

        $query = $this->db->get_where('tbl_credentials', array('username' => $_POST['username']));
        $data = $query->result();
        $this->session->set_userdata('user', $data[0]);
        
        $this->session->set_flashdata('msg', 'Account was successfully updated.');
        redirect(base_url().'account/teacher/'.$id);
    }
    public function editParent($id){
        // data that will be updated to tbl_guardian
        $this->db->set('first_name', $_POST['firstName']);
        $this->db->set('middle_name', $_POST['middleName']);
        $this->db->set('last_name', $_POST['lastName']);
        $this->db->set('email', $_POST['email']);
        $this->db->set('address', $_POST['address']);
        $this->db->set('contact_number', $_POST['phone']);
        $this->db->set('access_id', $_POST['accessId']);
        $this->db->set('verification_id', $_POST['verId']);
        $this->db->set('modified_by', $id);
        $this->db->set('registered', 'yes');
        $this->db->set('date_modified', date('Y-m-d H:i:s'));
        $this->db->where('id', $id);
        $this->db->update('tbl_guardian'); //update tbl_guardian

        // data that will be updated to tbl_credentials
        $this->db->set('username', $_POST['username']);
        $this->db->set('modified_by', $id);
        $this->db->set('date_modified', date('Y-m-d H:i:s'));
        $this->db->where('id', $_POST['cred_id']);
        $this->db->update('tbl_credentials'); // update tbl_credentials

        $query = $this->db->get_where('tbl_credentials', array('username' => $_POST['username']));
        $data = $query->result();
        $this->session->set_userdata('user', $data[0]);

        $this->session->set_flashdata('msg', 'Account was successfully updated.');
        redirect(base_url().'account/parent/'.$id);
    }
    public function editStudent($id){
        // data that will be updated to tbl_students
        $this->db->set('school_id', $_POST['schoolId']);
        $this->db->set('first_name', $_POST['firstName']);
        $this->db->set('middle_name', $_POST['middleName']);
        $this->db->set('last_name', $_POST['lastName']);
        $this->db->set('phone', $_POST['phone']);
        $this->db->set('address', $_POST['address']);
        $this->db->set('email', $_POST['email']);
        $this->db->set('modified_by', $id);
        $this->db->set('date_modified', date('Y-m-d H:i:s'));
        $this->db->where('id', $id);
        $this->db->update('tbl_students'); //update tbl_students

        // data that will be updated to tbl_credentials
        $this->db->set('username', $_POST['username']);
        $this->db->set('modified_by', $id);
        $this->db->set('date_modified', date('Y-m-d H:i:s'));
        $this->db->where('id', $_POST['cred_id']);
        $this->db->update('tbl_credentials'); // update tbl_credentials

        $query = $this->db->get_where('tbl_credentials', array('username' => $_POST['username']));
        $data = $query->result();
        $this->session->set_userdata('user', $data[0]);

        $this->session->set_flashdata('msg', 'Account was successfully updated.');
        redirect(base_url().'account/student/'.$id);
    }
    public function editAdmin($id){
        // data that will be updated to tbl_students
        $this->db->set('first_name', $_POST['firstName']);
        $this->db->set('middle_name', $_POST['middleName']);
        $this->db->set('last_name', $_POST['lastName']);
        $this->db->set('modified_by', $id);
        $this->db->set('date_modified', date('Y-m-d H:i:s'));
        $this->db->where('id', $id);
        $this->db->update('tbl_admin'); //update tbl_students

        // data that will be updated to tbl_credentials
        $this->db->set('username', $_POST['username']);
        $this->db->set('modified_by', $id);
        $this->db->set('date_modified', date('Y-m-d H:i:s'));
        $this->db->where('id', $_POST['cred_id']);
        $this->db->update('tbl_credentials'); // update tbl_credentials

        $query = $this->db->get_where('tbl_credentials', array('username' => $_POST['username']));
        $data = $query->result();
        $this->session->set_userdata('user', $data[0]);

        $this->session->set_flashdata('msg', 'Account was successfully updated.');
        redirect(base_url().'account/admin/'.$id);
    }
}