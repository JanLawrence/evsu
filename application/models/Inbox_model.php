<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inbox_model extends CI_Model{
    public function __construct(){
        $this->user = isset($this->session->userdata['user']) ? $this->session->userdata['user'] : ''; //get session
    }
    public function getTeacherInbox(){
          //query that joins teacher and subject
        $this->db->select('g.*, sub.subject_name, CONCAT(stud.first_name," ",stud.middle_name," ",stud.last_name) stud_name')
          ->from('tbl_teacher t')
          ->join('tbl_teacher_student ts', 'ts.teacher_id = t.id', 'left')
          ->join('tbl_student_guardian sg', 'sg.student_id = ts.student_id', 'left')
          ->join('tbl_guardian g', 'g.id = sg.guardian_id', 'left')
          ->join('tbl_teacher_subjects ss', 'ss.teacher_id = t.id', 'left')
          ->join('tbl_subject sub', 'sub.id = ss.subject_id', 'left')
          ->join('tbl_students stud', 'stud.id = ts.student_id', 'left')
          ->where('g.registered', 'yes')
          ->where('g.`status`', 'saved')
          ->where('t.id', $this->user->user_id)
          ->group_by('t.id');
         
         $query = $this->db->get(); // get results of query
         return $query->result();

    }
    public function getParentInbox(){
          //query that joins teacher and subject
        $this->db->select('t.*, sub.subject_name')
          ->from('tbl_guardian g')
          ->join('tbl_student_guardian sg', 'g.id = sg.guardian_id', 'left')
          ->join('tbl_teacher_student ts', 'ts.student_id = sg.student_id', 'left')
          ->join('tbl_teacher t', 't.id = ts.teacher_id', 'left')
          ->join('tbl_teacher_subjects ss', 'ss.teacher_id = t.id', 'left')
          ->join('tbl_subject sub', 'sub.id = ss.subject_id', 'left')
          ->where('t.registered', 'yes')
          ->where('t.`status`', 'saved')
          ->where('g.id', $this->user->user_id)
          ->group_by('t.id');
         
         $query = $this->db->get(); // get results of query
         return $query->result();

    }
    public function getChat($id){
          //query that joins teacher and subject
        $this->db->select('c.*, cc.content, cc.created_by content_user, cc.date_created content_date, cc.user_type, , CONCAT(t.first_name," ",t.middle_name," ",t.last_name) teacher_name , CONCAT(g.first_name," ",g.middle_name," ",g.last_name) parent_name')
          ->from('tbl_chat c')
          ->join('tbl_chat_content cc', 'cc.chat_id = c.id', 'inner')
          ->join('tbl_teacher t', 't.id = cc.created_by AND cc.user_type = "teacher"', 'left')
          ->join('tbl_guardian g', 'g.id = cc.created_by AND cc.user_type = "guardian"', 'left')
          ->where('c.teacher_id', $this->user->user_type == 'teacher' ?  $this->user->user_id : $id)
          ->where('c.parent_id', $this->user->user_type == 'parent' ?  $this->user->user_id : $id);
         $query = $this->db->get(); // get results of query
         return $query->result();

    }
    public function getUser($id){
        if( $this->user->user_type == 'teacher'){
            $this->db->select('g.id, CONCAT(g.first_name," ",g.middle_name," ",g.last_name) name')
            ->from('tbl_guardian g')
            ->where('g.id',  $id);
            $query = $this->db->get(); // get results of query
            return $query->result();
        } else {
            $this->db->select('t.id, CONCAT(t.first_name," ",t.middle_name," ",t.last_name) name')
            ->from('tbl_teacher t')
            ->where('t.id',  $id);
            $query = $this->db->get(); // get results of query
            return $query->result();
        }

    }
    public function addChat(){
        $check = $this->db->get_where('tbl_chat', array('teacher_id' =>  $this->user->user_type == 'teacher' ?  $this->user->user_id : $_POST['id'], 'parent_id' =>  $this->user->user_type == 'parent' ?  $this->user->user_id : $_POST['id']));
        if(empty($check->result())){

            $data = array(
                'teacher_id' =>  $this->user->user_type == 'teacher' ?  $this->user->user_id : $_POST['id'],
                'parent_id' => $this->user->user_type == 'teacher' ?  $this->user->user_id : $_POST['id'],
                'created_by' => $this->user->user_id,
                'date_created' => date('Y-m-d H:i:s')
            );
            
            $this->db->insert('tbl_chat', $data); // insert into tbl_chat
            $chatid = $this->db->insert_id(); // getting the id of the inserted data
            $data2 = array(
                'chat_id' => $chatid,
                'content' => $_POST['content'],
                'user_type' => $this->user->user_type == 'parent' ? 'guardian' : $this->user->user_type,
                'created_by' => $this->user->user_id,
                'date_created' => date('Y-m-d H:i:s')
            );
            $this->db->insert('tbl_chat_content', $data2); // insert into tbl_chat_content

        } else {
            $chat = $check->result();
            $data2 = array(
                'chat_id' => $chat[0]->id,
                'content' => $_POST['content'],
                'user_type' => $this->user->user_type == 'parent' ? 'guardian' : $this->user->user_type,
                'created_by' => $this->user->user_id,
                'date_created' => date('Y-m-d H:i:s')
            );
            $this->db->insert('tbl_chat_content', $data2); // insert into tbl_chat_content
        }
        redirect(base_url().'inbox/chat/'.$_POST['id']); //redirect back to teacher page
    }
}