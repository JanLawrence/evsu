<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Section extends CI_Controller {

	public function index($sub = 'section', $id = 0)
	{	
		// default prefix is empty if not '-subject' is concatenated
		$prefix = $sub == 'section' ? '' : '-section';

		//if the file do not exist show 404 error page
		if(!file_exists(APPPATH.'views/section/'.$sub.$prefix.'.php')){
			// if method/function exist load function
			if(method_exists($this, $sub)){
				$this->{$sub}();
				return;
			} else { // else show 404 error
				show_404();
			}
		}

		//set validation rules
		$this->form_validation->set_rules('section', 'Section', 'required'. ($sub == 'add' ? '|is_unique[tbl_section.section]' : ''));
		// $this->form_validation->set_rules('section', 'Section', 'required');
		$this->form_validation->set_rules('grade', 'Grade', 'required');
		$this->form_validation->set_rules('teacher', 'teacher', 'required');
		
		//if validation is success
        if($this->form_validation->run() == TRUE){
			if($sub == 'add'){ //if add page, load model addSubject()
				//load teachers_model -> addSubject() function
				$this->section_model->addSection();
			} else if($sub == 'edit') { //if edit page, load model editSubject()
				//load subjects_model -> editSubject() function
				$this->section_model->editSection($id);
			}
		} else { //if validation failed, page will load again
			// get data
			$data['section'] = $this->section_model->showSection($id);
			$data['teacher'] = $this->section_model->showTeacher();
			// load page
			$this->load->view('templates/header');
			$this->load->view('section/'.$sub.$prefix, $data);
			$this->load->view('templates/footer');
		}
		
	}
	public function delete(){
		//load subjects_model -> delete() function
		$this->section_model->delete();
	}
	public function gradePerSection(){
		$teacher = $this->session->userdata['user'];
		$query = $this->db->get_where('tbl_section', array('grade' => $_REQUEST['grade'],'status' => 'saved', 'teacher_id' => $teacher->user_id));
		echo json_encode($query->result());
	}
	// public function showTeacher(){
	// 	$this->teachers_model->getAllDataTeachers();
	// }
	
}
