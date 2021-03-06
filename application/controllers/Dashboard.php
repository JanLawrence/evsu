<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
	public function index()
	{	
		$students = $this->db->get_where('tbl_students', array('status' => 'saved'));
		$students= $students->result();
		$guardian = $this->db->get_where('tbl_guardian', array('status' => 'saved', 'registered' => 'yes'));
		$guardian= $guardian->result();
		$teacher = $this->db->get_where('tbl_teacher', array('status' => 'saved', 'registered' => 'yes'));
		$teacher= $teacher->result();

		$data['students'] = $students;
		$data['teachers'] = $teacher;
		$data['parents'] = $guardian;

		$this->load->view('templates/header');
		$this->load->view('dashboard/dashboard', $data);
		$this->load->view('templates/footer');
	}
}
