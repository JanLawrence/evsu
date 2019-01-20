<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Advisory extends CI_Controller {

	public function index()
	{	
        $data['advisory'] = $this->advisory_model->getAdvisory();
        $data['sy'] = $this->grades_model->getSchoolYear();
        // load page
        $this->load->view('templates/header');
        $this->load->view('advisory/advisory', $data);
        $this->load->view('templates/footer');		
    }
	public function viewGrade()
	{	
        $data['grade'] = $this->grades_model->studentGradeList3();
        $this->load->view('advisory/ajax/view', $data);
    }
	public function exportGrade()
	{	
        $data['grade'] = $this->grades_model->studentGradeList3();
        $this->load->view('advisory/ajax/export', $data);
    }
}
