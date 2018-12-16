<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Advisory_model extends CI_Model{
    
    public function getAdvisory(){
        $user = $this->session->userdata['user'];
        //query that joins teacher and subject
        $this->db->select('s.*')
         ->from('tbl_teacher_student ts')
         ->join('tbl_students s', 's.id = ts.student_id', 'inner')
         ->where('ts.teacher_id' , $user->user_id);
        $query = $this->db->get(); // get results of query
        return $query->result();
    }
}