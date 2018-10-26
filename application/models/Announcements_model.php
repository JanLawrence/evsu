<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Announcements_model extends CI_Model{
    
    public function getAllDataAnnouncements($id){
        //query that joins teacher and subject
        $this->db->select('a.*, s.id subject_id , s.subject_name')
         ->from('tbl_announcement a')
         ->join('tbl_subject s', 's.id = a.subject_id', 'inner');
        if($id != 0){ // if id not equal to 0 the query will filter per announement id 
            $this->db->where('a.id', $id);
        }
        $query = $this->db->get(); // get results of query
        return $query->result();
    }
    public function getAllDataSubjects(){
        $query = $this->db->get('tbl_subject'); // get all data for tbl_subject
        return $query->result();
    }
	public function addAnnouncement(){
        // data that will be inserted to tbl_announcement
        $data = array(
            'date' => $_POST['date'],
            'subject_id' => $_POST['subject'],
            'subject' => $_POST['subject_name'],
            'announcement' => $_POST['announcement'],
            'created_by' => 1,
            'date_created' => date('Y-m-d H:i:s')
        );
        
        $this->db->insert('tbl_announcement', $data); // insert into tbl_announcement
        $studentId = $this->db->insert_id(); // getting the id of the inserted data

        $userData = $this->session->userdata['user'];
        $dataLog = array(
            'user_id' => $userData->user_id,
            'user_type' => 'teacher',
            'transaction' => 'Add Announcement',
            'transaction_date' => date('Y-m-d H:i:s')
        );
        $this->db->insert('tbl_user_logs', $dataLog); // insert into tbl_user_logs

        redirect(base_url().'announcements'); //redirect back to announcements page
	}
    public function editAnnouncement($id){
        // data that will be updated to tbl_announcement
        $this->db->set('date', $_POST['date']);
        $this->db->set('subject_id', $_POST['subject']);
        $this->db->set('subject', $_POST['subject_name']);
        $this->db->set('announcement', $_POST['announcement']);
        $this->db->set('modified_by', 1);
        $this->db->set('date_modified', date('Y-m-d H:i:s'));
        $this->db->where('id', $id);
        $this->db->update('tbl_announcement'); //update tbl_announcement
        
        $userData = $this->session->userdata['user'];
        $dataLog = array(
            'user_id' => $userData->user_id,
            'user_type' => 'teacher',
            'transaction' => 'Edit Announcement',
            'transaction_date' => date('Y-m-d H:i:s')
        );
        $this->db->insert('tbl_user_logs', $dataLog); // insert into tbl_user_logs

        redirect(base_url().'announcements'); //redirect back to student page
    }
    public function delete(){
        foreach($_POST['announcementId'] as $each){ // looping the ids for tbl_teacher
            $this->db->delete('tbl_announcement', array('id' => $each)); // delete from tbl_teacher
        }

        $userData = $this->session->userdata['user'];
        $dataLog = array(
            'user_id' => $userData->user_id,
            'user_type' => 'teacher',
            'transaction' => 'Delete Announcement',
            'transaction_date' => date('Y-m-d H:i:s')
        );
        $this->db->insert('tbl_user_logs', $dataLog); // insert into tbl_user_logs

        redirect(base_url().'announcements'); //redirect back to student page
    }
}
