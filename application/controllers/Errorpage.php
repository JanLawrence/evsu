<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errorpage extends CI_Controller {

	public function index()
	{
		show_404();
	}
}
