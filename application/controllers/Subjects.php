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
		$this->form_validation->set_rules('subject', 'Subject', 'required'. ($sub == 'add' ? '|is_unique[tbl_subject.subject_name]' : ''));
		
		//if validation is success
        if($this->form_validation->run() == TRUE){
			if($sub == 'add'){ //if add page, load model addSubject()
				//load teachers_model -> addSubject() function
				$this->teachers_model->addSubject();
			} else if($sub == 'edit') { //if edit page, load model editSubject()
				//load teachers_model -> editSubject() function
				$this->teachers_model->editSubject($id);
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
