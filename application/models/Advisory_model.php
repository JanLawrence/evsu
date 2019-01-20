<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Advisory_model extends CI_Model{
    
    public function getAdvisory(){
        $user = $this->session->userdata['user'];
        //query that joins teacher and subject
        $this->db->select('s.*, IF(sg.id IS NULL, "no", "yes") status_grade')
         ->from('tbl_teacher_student ts')
         ->join('tbl_students s', 's.id = ts.student_id', 'inner')
         ->join('tbl_credentials c', 'c.user_id = s.id AND c.user_type = "student"', 'inner')
         ->join('tbl_students_grade sg', 'sg.teacher_student_id = ts.id', 'left')
         ->where('ts.teacher_id' , $user->user_id)
         ->where('c.confirm' , 'yes');

        //  ->group_by('ts.teacher_id' , 's.id');
        $query = $this->db->get(); // get results of query
        return $query->result();
    }
}