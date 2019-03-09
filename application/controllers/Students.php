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
				return;
			} else { // else show 404 error
				show_404();
			}
		}

		//set validation rules
		$this->form_validation->set_rules('schoolId', 'School Id', 'required'. ($sub == 'add' ? '|is_unique[tbl_students.school_id]' : ''));
		$this->form_validation->set_rules('firstName', 'First Name', 'required');
		$this->form_validation->set_rules('lastName', 'Last Name', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('grade', 'Grade', 'required');
		$this->form_validation->set_rules('section', 'Section', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email'. ($sub == 'add' ? '|is_unique[tbl_students.email]' : ''));
		$this->form_validation->set_rules('g_firstName', 'First Name', 'required');
		$this->form_validation->set_rules('g_lastName', 'Last Name', 'required');
		$this->form_validation->set_rules('g_email', 'Email', 'required|valid_email'. ($sub == 'add' ? '|is_unique[tbl_students.email]' : ''));

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
			$data['genStudentList'] = $this->students_model->genStudentList();
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
	public function info(){
		$session = $this->session->userdata['user'];

		$student = $this->db->get_where('tbl_student_guardian', array('guardian_id' => $session->user_id));
		$student = $student->result();

		$data['students'] = $this->students_model->getAllDataStudents($student[0]->student_id);
		$this->load->view('templates/header');
		$this->load->view('students/student-info', $data);
		$this->load->view('templates/footer');
	}
	public function studentgrade(){
		$year = isset($_GET['school_year']) ? $_GET['school_year'] : 1;
		$data['sy'] = $this->grades_model->getSchoolYear();
		$data['grades'] = $this->students_model->gengrades3($year);
		$this->load->view('templates/header');
		$this->load->view('students/student-grade', $data);
		$this->load->view('templates/footer');
	}
	public function studentattendance(){
		$this->load->view('templates/header');
		$this->load->view('students/student-attendance');
		$this->load->view('templates/footer');
	}
	// public function gengrades(){
	// 	$data['grades'] = $this->students_model->gengrades();
	// }
}
