<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model{
    
    public function getAllDataUsers($id){
        //query that joins teacher and subject
        $this->db->select('a.*, c.username, c.password')
         ->from('tbl_admin a')
         ->join('tbl_credentials c', 'a.id = c.user_id', 'inner');
         $this->db->where('c.user_type', 'admin');
        if($id != 0){ // if id not equal to 0 the query will filter per teacher id 
            $this->db->where('a.id', $id);
        }
        $query = $this->db->get(); // get results of query
        return $query->result();
    }
	public function addUser(){
        
        $userData = $this->session->userdata['user'];
        // data that will be inserted to tbl_admin
        $data = array(
            'first_name' => $_POST['firstName'],
            'middle_name' => $_POST['middleName'],
            'last_name' => $_POST['lastName'],
            'admin_type' => $_POST['type'],
            'created_by' => $userData->user_id,
            'date_created' => date('Y-m-d H:i:s')
        );
        
        $this->db->insert('tbl_admin', $data); // insert into tbl_admin
        $userId = $this->db->insert_id(); // getting the id of the inserted data

        // data that will be inserted to tbl_credentials
        $data = array(
            'username' => $_POST['username'],
            'password' => $this->encryptpass->pass_crypt($_POST['password']),
            'user_type' => 'admin',
            'confirm' => 'yes',
            'user_id' => $userId,
            'created_by' => $userData->user_id,
            'date_created' => date('Y-m-d H:i:s')
        );
        
        $this->db->insert('tbl_credentials', $data); // insert into tbl_credentials

        $userData = $this->session->userdata['user'];
        $dataLog = array(
            'user_id' => $userData->user_id,
            'user_type' => 'admin',
            'transaction' => 'Add User',
            'transaction_date' => date('Y-m-d H:i:s')
        );
        $this->db->insert('tbl_user_logs', $dataLog); // insert into tbl_user_logs


        $this->session->set_flashdata('msg', 'User was successfully saved.');
        redirect(base_url().'users'); //redirect back to teacher page
	}
    public function editUser($id){
        $userData = $this->session->userdata['user'];
        // data that will be updated to tbl_admin
        $this->db->set('first_name', $_POST['firstName']);
        $this->db->set('middle_name', $_POST['middleName']);
        $this->db->set('last_name', $_POST['lastName']);
        $this->db->set('admin_type', $_POST['type']);
        $this->db->set('modified_by', $userData->user_id);
        $this->db->set('date_modified', date('Y-m-d H:i:s'));
        $this->db->where('id', $id);
        $this->db->update('tbl_admin'); //update tbl_admin
        
        $query = $this->db->get_where('tbl_credentials', array('user_id' => $id, 'user_type' => 'admin'));
		$data = $query->result();
        // data that will be updated to tbl_credentials
        $this->db->set('username', $_POST['username']);
        $this->db->set('password', $this->encryptpass->pass_crypt($_POST['password']));
        $this->db->set('modified_by', $userData->user_id);
        $this->db->set('date_modified', date('Y-m-d H:i:s'));
        $this->db->where('id', $data[0]->id);
        $this->db->update('tbl_credentials'); // update tbl_credentials

        $userData = $this->session->userdata['user'];
        $dataLog = array(
            'user_id' => $userData->user_id,
            'user_type' => 'admin',
            'transaction' => 'Edit User',
            'transaction_date' => date('Y-m-d H:i:s')
        );
        $this->db->insert('tbl_user_logs', $dataLog); // insert into tbl_user_logs

        $this->session->set_flashdata('msg', 'Parent was successfully updated.');
        redirect(base_url().'users'); //redirect back to teacher page
    }
    public function delete(){
        foreach($_POST['usersId'] as $each){ // looping the ids for tbl_teacher
            $this->db->delete('tbl_admin', array('id' => $each)); // delete from tbl_teacher
        }
        
        $userData = $this->session->userdata['user'];
        $dataLog = array(
            'user_id' => $userData->user_id,
            'user_type' => 'admin',
            'transaction' => 'Delete User',
            'transaction_date' => date('Y-m-d H:i:s')
        );
        $this->db->insert('tbl_user_logs', $dataLog); // insert into tbl_user_logs
        
        $this->session->set_flashdata('msg', 'Parent/s was successfully deleted.');
        redirect(base_url().'teachers'); //redirect back to teacher page
	}
}
