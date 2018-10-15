<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teachers_model extends CI_Model{

	public function delete(){
        echo "<pre>";
        print_r($_POST);
        exit;
	}
	public function addTeacher(){

        $data = array(
            'first_name' => $_POST['firstName'],
            'middle_name' => $_POST['middleName'],
            'last_name' => $_POST['lastName'],
            'phone' => $_POST['phone'],
            'advisory' => $_POST['advisory'],
            'address' => $_POST['address'],
            'email' => $_POST['email'],
            'school_id_no' => 1,
            'license_no' => 1,
            'email' => $_POST['email'],
            'created_by' => 1,
            'date_created' => date('Y-m-d')
        );
    
        $this->db->insert('tbl_teacher', $data);
        redirect(base_url().'teachers');
	}
}
