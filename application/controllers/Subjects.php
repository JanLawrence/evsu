<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subjects extends CI_Controller {

	public function index($sub = 'subjects', $id = 0)
	{	
		// default prefix is empty if not '-subject' is concatenated
		$prefix = $sub == 'subjects' ? '' : '-subject';

		//if the file do not exist show 404 error page
		if(!file_exists(APPPATH.'views/subjects/'.$sub.$prefix.'.php')){
			// if method/function exist load function
			if(method_exists($this, $sub)){
				$this->{$sub}();
				return;
			} else { // else show 404 error
				show_404();
			}
		}

		//set validation rules
		$this->form_validation->set_rules('subject', 'Subject', 'required');
		// $this->form_validation->set_rules('section', 'Section', 'required');
		$this->form_validation->set_rules('grade', 'Grade', 'required');

		//if validation is success
        if($this->form_validation->run() == TRUE){
			if($sub == 'add'){ //if add page, load model addSubject()
				//load teachers_model -> addSubject() function
				$this->subjects_model->addSubject();
			} else if($sub == 'edit') { //if edit page, load model editSubject()
				//load subjects_model -> editSubject() function
				$this->subjects_model->editSubject($id);
			}
		} else { //if validation failed, page will load again
			// get data
			$data['subjects'] = $this->subjects_model->showSubj($id);
			// $data['teacher'] = $this->section_model->showTeacher();
			$data['section'] = $this->section_model->showSection($id=0);
			// load page
			$this->load->view('templates/header');
			$this->load->view('subjects/'.$sub.$prefix, $data);
			$this->load->view('templates/footer');
		}
		
	}
	public function delete(){
		//load subjects_model -> delete() function
		$this->subjects_model->delete();
	}

	
}
