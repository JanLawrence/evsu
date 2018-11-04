<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index($sub = 'users', $id = 0)
	{	
		// default prefix is empty if not '-users' is concatenated
		$prefix = $sub == 'users' ? '' : '-user';

		//if the file do not exist show 404 error page
		if(!file_exists(APPPATH.'views/users/'.$sub.$prefix.'.php')){
			// if method/function exist load function
			if(method_exists($this, $sub)){
				$this->{$sub}();
				return;
			} else { // else show 404 error
				show_404();
			}
		}

		//set validation rules
		$this->form_validation->set_rules('firstName', 'First Name', 'required');
		$this->form_validation->set_rules('lastName', 'Last Name', 'required');
		$this->form_validation->set_rules('type', 'Last Name', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|callback_usernamecheck['.$id.']');
		$this->form_validation->set_rules('oldpassword', 'Old Password', 'callback_oldpass');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confirmpass', 'Confirm Password', 'callback_confirmpass');
		
		//if validation is success
        if($this->form_validation->run() == TRUE){
			if($sub == 'add'){ //if add page, load model addUser()
				//load users_model -> addUser() function
				$this->users_model->addUser();
			} else if($sub == 'edit') { //if edit page, load model editUser()
				//load users_model -> editUser() function
				$this->users_model->editUser($id);
			}
		} else { //if validation failed, page will load again
			// get data
			$data['users'] = $this->users_model->getAllDataUsers($id);
			// load page
			$this->load->view('templates/header');
			$this->load->view('users/'.$sub.$prefix, $data);
			$this->load->view('templates/footer');
		}
		
	}
	public function delete(){
		//load teachers_model -> delete() function
		$this->teachers_model->delete();
	}
	public function usernamecheck($username,$id){
		$query = $this->db->get_where('tbl_credentials', array('user_id' => $id, 'user_type' => 'admin'));
		$data = $query->result();
		if(!empty($data)){
			return TRUE;
		} else {
			$query2 = $this->db->get_where('tbl_credentials', array('username' => $username));
			$data2 = $query2->result();
			if(!empty($data2)){
				$this->form_validation->set_message('usernamecheck', 'Username existing');
				return FALSE;
			} else {
				return TRUE;
			}
		}
	}	
	public function oldpass($pass){
		$username = $this->input->post('username');
		$query = $this->db->get_where('tbl_credentials', array('username'=>$username));
		$data = $query->result();
		$oldpass = $this->encryptpass->pass_crypt($data[0]->password, 'd'); 
		if($oldpass == $pass){
			return TRUE;
		} else {
			$this->form_validation->set_message('oldpass', 'Invalid Password');
			return FALSE;
		}
	}	
	public function confirmpass($cpass){
		$pass = $this->input->post('password');
		if($cpass != ''){
			if($pass == $cpass){
				return TRUE;
			} else {
				$this->form_validation->set_message('confirmpass', 'Password do not match');
				return FALSE;
			}
		} else {
			$this->form_validation->set_message('confirmpass', 'Password do not match');
			return FALSE;
		}
	}
}
