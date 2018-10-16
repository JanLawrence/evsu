<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teachers extends CI_Controller {

	public function index($sub = 'teachers', $id = 0)
	{	
		// default prefix is empty if not '-teacher' is concatenated
		$prefix = $sub == 'teachers' ? '' : '-teacher';

		//if the file do not exist show 404 error page
		if(!file_exists(APPPATH.'views/teachers/'.$sub.$prefix.'.php')){
			// if method/function exist load function
			if(method_exists($this, $sub)){
				$this->{$sub}();
				exit;
			} else { // else show 404 error
				show_404();
			}
		}

		//set validation rules
		$this->form_validation->set_rules('firstName', 'First Name', 'required');
		$this->form_validation->set_rules('lastName', 'Last Name', 'required');
		$this->form_validation->set_rules('advisory', 'Advisory', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('subject', 'Subject', 'required');
		
		//if validation is success
        if($this->form_validation->run() == TRUE){
			if($sub == 'add'){ //if add page, load model addTeacher()
				//load teachers_model -> addTeacher() function
				$this->teachers_model->addTeacher();
			} else if($sub == 'edit') { //if edit page, load model editTeacher()
				//load teachers_model -> editTeacher() function
				$this->teachers_model->editTeacher($id);
			}
		} else { //if validation failed, page will load again
			// get data
			$data['teachers'] = $this->teachers_model->getAllDataTeachers($id);
			$data['subjects'] = $this->teachers_model->getAllDataSubjects();
			// load page
			$this->load->view('templates/header');
			$this->load->view('teachers/'.$sub.$prefix, $data);
			$this->load->view('templates/footer');
		}
		
	}
	public function delete(){
		//load teachers_model -> delete() function
		$this->teachers_model->delete();
	}
}
