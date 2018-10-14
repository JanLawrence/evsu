<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errorpage extends CI_Controller {

	public function index()
	{
		$this->load->database();
		$query = $this->db->get('tbl_user');
		
		echo "<pre>";
		print_r($query->result_array());

		// $this->load->view('error_message');
	}
}
