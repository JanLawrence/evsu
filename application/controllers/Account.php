<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	public function index($sub = '', $id = 0)
	{
        if($sub == ''){
            show_404();
        }
		//if the file do not exist show 404 error page
		if(!file_exists(APPPATH.'views/accounts/'.$sub.'.php')){
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
            //if validation is success
            if($this->form_validation->run() == TRUE){
                //load account_model -> editParent() function
                $this->account_model->editParent($id);
            } else { //if validation failed, page will load again
                // get data
                $data['guardian'] = $this->account_model->getGuardianData($id);
                // load page
                $this->load->view('templates/header');
                $this->load->view('accounts/'.$sub, $data);
                $this->load->view('templates/footer');
            }
        } else if($sub == 'teacher'){
            $pass = $this->input->post('password');
            //set validation rules
            $this->form_validation->set_rules('firstName', 'First Name', 'required');
            $this->form_validation->set_rules('lastName', 'Last Name', 'required');
            $this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('subject', 'Subject', 'required');
            $this->form_validation->set_rules('username', 'Username', 'required|callback_usernamecheck['.$sub.'_'.$id.']');
            
            //if validation is success
            if($this->form_validation->run() == TRUE){
                //load account_model -> editTeacher() function
                $this->account_model->editTeacher($id);
            } else { //if validation failed, page will load again
                // get data
                $data['teacher'] = $this->account_model->getTeacherData($id);
                $data['subjects'] = $this->account_model->getAllDataSubjects();
                // load page
                $this->load->view('templates/header');
                $this->load->view('accounts/'.$sub, $data);
                $this->load->view('templates/footer');
            }
        } else if($sub == 'student'){
            $pass = $this->input->post('password');
            //set validation rules
            $this->form_validation->set_rules('schoolId', 'School Id', 'required');
            $this->form_validation->set_rules('firstName', 'First Name', 'required');
            $this->form_validation->set_rules('lastName', 'Last Name', 'required');
            $this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('username', 'Username', 'required|callback_usernamecheck['.$sub.'_'.$id.']');
            
            //if validation is success
            if($this->form_validation->run() == TRUE){
                //load account_model -> editStudent() function
                $this->account_model->editStudent($id);
            } else { //if validation failed, page will load again
                // get data
                $data['students'] = $this->account_model->getStudentData($id);
                // load page
                $this->load->view('templates/header');
                $this->load->view('accounts/'.$sub, $data);
                $this->load->view('templates/footer');
            }
        } else if($sub == 'admin'){
            $pass = $this->input->post('password');
            //set validation rules
            $this->form_validation->set_rules('firstName', 'First Name', 'required');
            $this->form_validation->set_rules('lastName', 'Last Name', 'required');
            $this->form_validation->set_rules('username', 'Username', 'required|callback_usernamecheck['.$sub.'_'.$id.']');
            
            //if validation is success
            if($this->form_validation->run() == TRUE){
                //load account_model -> editAdmin() function
                $this->account_model->editAdmin($id);
            } else { //if validation failed, page will load again
                // get data
                $data['admin'] = $this->account_model->getAdminData($id);
                // load page
                $this->load->view('templates/header');
                $this->load->view('accounts/'.$sub, $data);
                $this->load->view('templates/footer');
            }
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
