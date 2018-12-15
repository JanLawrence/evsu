<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function index($sub = '', $id = 0)
	{
        if($sub == ''){
            show_404();
        }
		//if the file do not exist show 404 error page
		if(!file_exists(APPPATH.'views/register/'.$sub.'.php')){
			// if method/function exist load function
			if(method_exists($this, $sub)){
                $this->{$sub}();
				return;
			} else { // else show 404 error
				show_404();
			}
        }
        if($sub == 'parent'){
            $pass = $this->input->post('password');
            $this->form_validation->set_rules('firstName', 'First Name', 'required');
            $this->form_validation->set_rules('lastName', 'Last Name', 'required');
            $this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('username', 'Username', 'required|callback_usernamecheck['.$sub.'_'.$id.']');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'callback_validate['.$pass.']');
            //if validation is success
            if($this->form_validation->run() == TRUE){
                //load register_model -> editParent() function
                $this->register_model->editParent($id);
            } else { //if validation failed, page will load again
                // get data
                $data['guardian'] = $this->register_model->getGuardianData($id);
                // load page
                $this->load->view('register/'.$sub, $data);
            }
        } else if($sub == 'teacher'){
            $pass = $this->input->post('password');
            //set validation rules
            $this->form_validation->set_rules('firstName', 'First Name', 'required');
            $this->form_validation->set_rules('lastName', 'Last Name', 'required');
            $this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            // $this->form_validation->set_rules('subject', 'Subject', 'required');
            $this->form_validation->set_rules('username', 'Username', 'required|callback_usernamecheck['.$sub.'_'.$id.']');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'callback_validate['.$pass.']');
            
            //if validation is success
            if($this->form_validation->run() == TRUE){
                //load register_model -> editTeacher() function
                $this->register_model->editTeacher($id);
            } else { //if validation failed, page will load again
                // get data
                $data['teacher'] = $this->register_model->getTeacherData($id);
                // $data['subjects'] = $this->register_model->getAllDataSubjects();
                // load page
                $this->load->view('register/'.$sub, $data);
            }
        } else if($sub == 'student'){
            $pass = $this->input->post('password');
            //set validation rules
            $this->form_validation->set_rules('schoolId', 'School Id', 'required');
            $this->form_validation->set_rules('firstName', 'First Name', 'required');
            $this->form_validation->set_rules('lastName', 'Last Name', 'required');
            $this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('username', 'Username', 'required|callback_usernamecheck['.$sub.'_'.$id.']');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'callback_validate['.$pass.']');
            
            //if validation is success
            if($this->form_validation->run() == TRUE){
                //load register_model -> editStudent() function
                $this->register_model->editStudent($id);
            } else { //if validation failed, page will load again
                // get data
                $data['students'] = $this->register_model->getStudentData($id);
                // load page
                $this->load->view('register/'.$sub, $data);
            }
        }

    }
    function validate($confirmPass, $pass){
        if(!empty($confirmPass)){
            if($pass == $confirmPass){
                return TRUE;
            } else {
                $this->form_validation->set_message('validate', 'Confirm Password do not match');
                return FALSE;
            }
        } else {
            $this->form_validation->set_message('validate', 'The Confirm Password field is required');
            return FALSE;
        }
    }
    function changepass(){
        $oldpass = $_POST['oldpass'];
        $pass = $_POST['pass'];
        $confirmpass = $_POST['confirmpass'];
        $userData = $this->session->userdata['user'];
        $realpass = $this->encryptpass->pass_crypt($userData->password, 'd');
        if($realpass == $oldpass){

            $this->db->set('password', $this->encryptpass->pass_crypt($_POST['pass']));
            $this->db->where('username', $userData->username);
            $this->db->update('tbl_credentials'); //update status to logged in from tbl_credentials
   
            $query = $this->db->get_where('tbl_credentials', array('username' => $userData->username));
            $data = $query->result();
            $this->session->set_userdata('user', $data[0]);


        } else {
            echo 1;
        }
    }
    public function usernamecheck($username,$subid){
        $sub = explode('_', $subid)[0];
        $user_id = explode('_', $subid)[1];
        $query = $this->db->get_where('tbl_credentials', array('user_id' => $user_id, 'user_type' => $sub));
        
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
}
