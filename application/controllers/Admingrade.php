<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admingrade extends CI_Controller {

	public function index()
	{	
        $data['sy'] = $this->grades_model->getSchoolYear();
        $data['sub'] = $this->admingrade_model->subList();
		$this->load->view('templates/header');
		$this->load->view('admingrade/index', $data);
		$this->load->view('templates/footer');
	}
	public function viewGrade()
	{	
        $data['grade'] = $this->admingrade_model->studentGradeList();
		$this->load->view('admingrade/ajax/view', $data);
	}
	public function changeGrade()
	{	
        $this->admingrade_model->changeGrade();
	}
}
