<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students_model extends CI_Model{
    
    public function getAllDataStudents($id){
        //query that joins teacher and subject
        $this->db->select('s.*, g.id guardian_id , g.first_name g_fname, g.last_name g_lname, g.middle_name g_mname, g.registered g_registered')
         ->from('tbl_students s')
         ->join('tbl_student_guardian sg', 'sg.student_id = s.id', 'inner')
         ->join('tbl_guardian g', 'g.id = sg.guardian_id', 'inner');
        if($id != 0){ // if id not equal to 0 the query will filter per teacher id 
            $this->db->where('s.id', $id);
        }
        $query = $this->db->get(); // get results of query
        return $query->result();
    }
	public function addStudent(){
        // data that will be inserted to tbl_student`
        $data = array(
            'school_id' => $_POST['schoolId'],
            'first_name' => $_POST['firstName'],
            'middle_name' => $_POST['middleName'],
            'last_name' => $_POST['lastName'],
            'phone' => $_POST['phone'],
            'address' => $_POST['address'],
            'email' => $_POST['email'],
            'created_by' => 1,
            'date_created' => date('Y-m-d H:i:s')
        );
        
        $this->db->insert('tbl_students', $data); // insert into tbl_student`
        $studentId = $this->db->insert_id(); // getting the id of the inserted data
        
        // data that will be inserted to tbl_guardian`
        $dataGuardian= array(
            'first_name' => $_POST['g_firstName'],
            'middle_name' => $_POST['g_middleName'],
            'last_name' => $_POST['g_lastName'],
            'email' => $_POST['email'],
            'registered' => 'no',
            'created_by' => 1,
            'date_created' => date('Y-m-d H:i:s')
        );
        
        $this->db->insert('tbl_guardian', $dataGuardian); // insert into tbl_guardian
        $guardianId = $this->db->insert_id(); // getting the id of the inserted data
        
        // data that will be inserted to tbl_student_guardian
        $dataStudentGuardian = array(
            'student_id' => $studentId,
            'guardian_id' => $guardianId,
            'created_by' => 1,
            'date_created' => date('Y-m-d H:i:s')
        );
        
        $this->db->insert('tbl_student_guardian', $dataStudentGuardian); // insert into tbl_student_guardian
        
        redirect(base_url().'students'); //redirect back to student page
	}
    public function editStudent($id){

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

        redirect(base_url().'students'); //redirect back to student page
    }
    public function delete(){
        foreach($_POST['studentId'] as $each){ // looping the ids for tbl_teacher
            $this->db->delete('tbl_student', array('id' => $each)); // delete from tbl_teacher
        }
        redirect(base_url().'students'); //redirect back to student page
	}
}
