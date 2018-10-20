<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller {

	public function index($sub = 'students', $id = 0)
	{	
		// default prefix is empty if not '-student' is concatenated
		$prefix = $sub == 'students' ? '' : '-student';

		//if the file do not exist show 404 error page
		if(!file_exists(APPPATH.'views/students/'.$sub.$prefix.'.php')){
			// if method/function exist load function
			if(method_exists($this, $sub)){
				$this->{$sub}();
				exit;
			} else { // else show 404 error
				show_404();
			}
		}

		//set validation rules
		$this->form_validation->set_rules('schoolId', 'School Id', 'required');
		$this->form_validation->set_rules('firstName', 'First Name', 'required');
		$this->form_validation->set_rules('lastName', 'Last Name', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[tbl_students.email]');
		$this->form_validation->set_rules('g_firstName', 'First Name', 'required');
		$this->form_validation->set_rules('g_lastName', 'Last Name', 'required');
		$this->form_validation->set_rules('g_email', 'Email', 'required|valid_email|is_unique[tbl_guardian.email]');

		//if validation is success
        if($this->form_validation->run() == TRUE){
			if($sub == 'add'){ //if add page, load model addStudent()
				//load students_model -> addStudent() function
				$this->students_model->addStudent();
			} else if($sub == 'edit') { //if edit page, load model editStudent()
				//load students_model -> editStudent() function
				$this->students_model->editStudent($id);
			}
		} else { //if validation failed, page will load again
			// get data
			$data['students'] = $this->students_model->getAllDataStudents($id);
			// load page
			$this->load->view('templates/header');
			$this->load->view('students/'.$sub.$prefix, $data);
			$this->load->view('templates/footer');
		}
		
	}
	public function delete(){
		//load students_model -> delete() function
		$this->students_model->delete();
	}
	public function studentlog(){
		$this->load->view('templates/header');
		$this->load->view('students/student-log');
		$this->load->view('templates/footer');
	}
}
