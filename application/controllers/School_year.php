<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class School_year extends CI_Controller {

	public function index($sub = 'school_year', $id = 0)
	{	
		// default prefix is empty if not '-subject' is concatenated
		$prefix = $sub == 'school_year' ? '' : '-school_year';

		//if the file do not exist show 404 error page
		if(!file_exists(APPPATH.'views/school_year/'.$sub.$prefix.'.php')){
			// if method/function exist load function
			if(method_exists($this, $sub)){
				$this->{$sub}();
				return;
			} else { // else show 404 error
				show_404();
			}
		}

		//set validation rules
		$this->form_validation->set_rules('from', 'From', 'required');
		$this->form_validation->set_rules('to', 'To', 'required');

		//if validation is success
        if($this->form_validation->run() == TRUE){
			if($sub == 'add'){ //if add page, load model addSubject()
				//load teachers_model -> addSubject() function
				$this->school_year_model->addSY();
			} else if($sub == 'edit') { //if edit page, load model editSubject()
				//load subjects_model -> editSubject() function
				$this->school_year_model->editSY($id);
			}
		} else { //if validation failed, page will load again
			// get data
			$data['school_year'] = $this->school_year_model->showSchoolYear($id);
			// load page
			$this->load->view('templates/header');
			$this->load->view('school_year/'.$sub.$prefix, $data);
			$this->load->view('templates/footer');
		}
		
	}
	public function delete(){
		//load subjects_model -> delete() function
		$this->school_year_model->delete();
	}

	
}
