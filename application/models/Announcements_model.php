<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Announcements_model extends CI_Model{
    public function __construct(){
        $this->user = isset($this->session->userdata['user']) ? $this->session->userdata['user'] : ''; //get session
    }
    public function getAllDataAnnouncements($id){
        //query that joins tbl_announcement and subject
        $this->db->select('a.*, s.id subject_id , s.subject_name')
         ->from('tbl_announcement a')
         ->join('tbl_subject s', 's.id = a.subject_id', 'inner')
         ->where('a.status', 'saved')
         ->where('s.status', 'saved');
        if($id != 0){ // if id not equal to 0 the query will filter per announement id 
            $this->db->where('a.id', $id);
        }
        $query = $this->db->get(); // get results of query
        return $query->result();
    }
    public function genAnnouncements($from,$to){
        //query for announcements
        $this->db->select('a.*, s.id subject_id , s.subject_name, CONCAT(t.last_name, ", ", t.first_name, " ", t.middle_name) name')
         ->from('tbl_announcement a')
         ->join('tbl_subject s', 's.id = a.subject_id', 'inner')
         ->join('tbl_credentials cred', 'cred.id = a.created_by', 'inner')
         ->join('tbl_teacher t','t.id = cred.user_id','inner');
        if ($this->user->user_type == 'student'){
        $this->db->join('tbl_teacher_student ts', 'ts.teacher_id = t.id','inner');
        }
        $this->db->where('a.status', 'saved')
         ->where('s.status', 'saved')
         ->where('cred.status', 'saved')
         ->where('t.status', 'saved');

        //user type conditions 
        if($this->user->user_type == 'teacher'){ 
            $this->db->where('a.created_by', $this->user->id);
        }elseif($this->user->user_type == 'admin'){
            $this->db->where('a.date >= "'.$from.'" && a.date <= "'.$to.'"');
        }elseif($this->user->user_type == 'student'){
            $this->db->where('ts.student_id', $this->user->user_id);
            $this->db->where('a.date >= "'.$from.'" && a.date <= "'.$to.'"');
        }
        $this->db->order_by('a.date','DESC');

        $query = $this->db->get(); // get results of query
        return $query->result();
    }
    public function getAllDataSubjects(){
        //get subjects data
        $this->db->select('s.*')
        ->from('tbl_teacher_subjects ts')
        ->join('tbl_subject s','s.id = ts.subject_id','inner')
        ->where('s.status', 'saved');
        //user type conditions 
        if($this->user->user_type){
            $this->db->where('ts.teacher_id',$this->user->user_id);
        }
        $this->db->order_by('s.subject_name');

        $query = $this->db->get(); // get results of query
        return $query->result();
    }
    // public function genAnnouncements{
    //     //reports to be displayed to admin
    // }

	public function addAnnouncement(){
        // data that will be inserted to tbl_announcement
        $data = array(
            'date' => $_POST['date'],
            'subject_id' => $_POST['subject'],
            'subject' => $_POST['subject_name'],
            'announcement' => $_POST['announcement'],
            'created_by' => $this->user->id,
            'date_created' => date('Y-m-d H:i:s')
        );
        
        $this->db->insert('tbl_announcement', $data); // insert into tbl_announcement
        $studentId = $this->db->insert_id(); // getting the id of the inserted data

        $userData = $this->session->userdata['user'];
        $dataLog = array(
            'user_id' => $userData->user_id,
            'user_type' => $userData->user_type,
            'transaction' => 'Send Announcement',
            'transaction_date' => date('Y-m-d H:i:s')
        );
        $this->db->insert('tbl_user_logs', $dataLog); // insert into tbl_user_logs

        $this->session->set_flashdata('msg', 'Announcement was successfully saved.');
        redirect(base_url().'announcements'); //redirect back to announcements page
	}
    public function editAnnouncement($id){
        // data that will be updated to tbl_announcement
        $this->db->set('date', $_POST['date']);
        $this->db->set('subject_id', $_POST['subject']);
        $this->db->set('subject', $_POST['subject_name']);
        $this->db->set('announcement', $_POST['announcement']);
        $this->db->set('modified_by', $this->user->id);
        $this->db->set('date_modified', date('Y-m-d H:i:s'));
        $this->db->where('id', $id);
        $this->db->update('tbl_announcement'); //update tbl_announcement
        
        $userData = $this->session->userdata['user'];
        $dataLog = array(
            'user_id' => $userData->user_id,
            'user_type' => $userData->user_type,
            'transaction' => 'Edit Announcement',
            'transaction_date' => date('Y-m-d H:i:s')
        );
        $this->db->insert('tbl_user_logs', $dataLog); // insert into tbl_user_logs

        $this->session->set_flashdata('msg', 'Announcement was successfully updated.');
        redirect(base_url().'announcements'); //redirect back to student page
    }
    public function genAnnouncementLog(){
        $userData = $this->session->userdata['user'];
        $dataLog = array(
            'user_id' => $userData->user_id,
            'user_type' => $userData->user_type,
            'transaction' => 'View Announcements',
            'transaction_date' => date('Y-m-d H:i:s')
        );
        $this->db->insert('tbl_user_logs', $dataLog); // insert into tbl_user_logs
    }
    public function delete(){
        foreach($_POST['announcementId'] as $each){ // looping the ids for tbl_announcement
            $this->db->set('status', 'deleted'); // delete from tbl_announcement
            $this->db->where('id', $each);
            $this->db->update('tbl_announcement'); //delete tbl_announcement
        }

        $userData = $this->session->userdata['user'];
        $dataLog = array(
            'user_id' => $userData->user_id,
            'user_type' => $userData->user_type,
            'transaction' => 'Delete Announcement',
            'transaction_date' => date('Y-m-d H:i:s')
        );
        $this->db->insert('tbl_user_logs', $dataLog); // insert into tbl_user_logs

        $this->session->set_flashdata('msg', 'Announcement/s was successfully deleted.');
        redirect(base_url().'announcements'); //redirect back to student page
    }
}
