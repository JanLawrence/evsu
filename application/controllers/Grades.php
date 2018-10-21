<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grades extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	// public function index()
	// {	
	// 	$this->load->view('templates/header');
	// 	$this->load->view('grades/grades');
	// 	$this->load->view('templates/footer');
	// }
	public function index($sub = 'grades', $id = 0)
	{	
		// default prefix is empty if not '-teacher' is concatenated
		$prefix = $sub == 'grades' ? '' : '-grade';

		//if the file do not exist show 404 error page
		if(!file_exists(APPPATH.'views/grades/'.$sub.$prefix.'.php')){
			// if method/function exist load function
			if(method_exists($this, $sub)){
				$this->{$sub}();
				exit;
			} else { // else show 404 error
				show_404();
			}
		}

		//set validation rules
		$this->form_validation->set_rules('grading', 'Grading', 'required');
		$this->form_validation->set_rules('school_year', 'Year', 'required');
		$this->form_validation->set_rules('subject', 'Subject', 'required');
		$this->form_validation->set_rules('grade[]', 'Grade', 'required');
		
		//if validation is success
        if($this->form_validation->run() == TRUE){
			if($sub == 'add'){ //if add page, load model addGrade()
				//load grades_model -> addGrade() function
				$this->grades_model->addGrade();
			}
		} else { //if validation failed, page will load again
			// get data
			$data['subjects'] = $this->teachers_model->getAllDataSubjects();
			$data['students'] = $this->grades_model->studentPerTeacher();
			$data['grades'] = $this->grades_model->studentGradeList();
			// load page
			$this->load->view('templates/header');
			$this->load->view('grades/'.$sub.$prefix, $data);
			$this->load->view('templates/footer');
		}
		
	}
}
