<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedbacks_model extends CI_Model{
    
    public function getAllDataFeedbacks($id){
        //query that joins teacher and subject
        $this->db->select('f.*, t.first_name t_fname , t.last_name t_lname, t.middle_name t_mname,  s.id subject_id , s.subject_name')
         ->from('tbl_feedback f')
         ->join('tbl_teacher t', 't.id = f.teacher_id', 'inner')
         ->join('tbl_teacher_subjects ts', 't.id = ts.teacher_id', 'inner')
         ->join('tbl_subject s', 's.id = ts.subject_id', 'inner');
        if($id != 0){ // if id not equal to 0 the query will filter per feedback id 
            $this->db->where('f.id', $id);
        }
        $query = $this->db->get(); // get results of query
        return $query->result();
    }
    public function getAllDataTeachers(){
        $query = $this->db->get('tbl_teacher'); // get all data for tbl_teacher
        return $query->result();
    }
	public function addFeedback(){
        $user = $this->session->userdata['user'];
        $this->db->select('s.*');
        $this->db->from('tbl_students s');
        $this->db->where('s.id', $user->user_id);
        $query = $this->db->get(); // get results of query
        $userData = $query->result();

        // data that will be inserted to tbl_feedback
        $data = array(
            'student_id' => $userData[0]->id,
            'teacher_id' => $_POST['teacher'],
            'feedback' => $_POST['feedback'],
            'created_by' => 1,
            'date_created' => date('Y-m-d H:i:s')
        );
        
        $this->db->insert('tbl_feedback', $data); // insert into tbl_feedback
        $studentId = $this->db->insert_id(); // getting the id of the inserted data

        redirect(base_url().'feedbacks'); //redirect back to feedbacks page
	}
    public function delete(){
        foreach($_POST['feedbackId'] as $each){ // looping the ids for tbl_feedback
            $this->db->delete('tbl_feedback', array('id' => $each)); // delete from tbl_feedback
        }
        redirect(base_url().'feedbacks'); //redirect back to feedbacks page
    }
}
