<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedbacks extends CI_Controller {

	public function index($sub = 'feedbacks', $id = 0)
	{	
		// default prefix is empty if not '-feedback' is concatenated
		$prefix = $sub == 'feedbacks' ? '' : '-feedback';

		//if the file do not exist show 404 error page
		if(!file_exists(APPPATH.'views/feedbacks/'.$sub.$prefix.'.php')){
			// if method/function exist load function
			if(method_exists($this, $sub)){
				$this->{$sub}();
				return;
			} else { // else show 404 error
				show_404();
			}
		}

		//set validation rules
		$this->form_validation->set_rules('teacher', 'Teacher', 'required');
		$this->form_validation->set_rules('feedback', 'Feedback', 'required');
		
		//if validation is success
        if($this->form_validation->run() == TRUE){
			if($sub == 'add'){ //if add page, load model addFeedback()
				//load feedbacks_model -> addFeedback() function
				$this->feedbacks_model->addFeedback();
			}
		} else { //if validation failed, page will load again
			// get data
			$data['feedbacks'] = $this->feedbacks_model->getAllDataFeedbacks($id);
			$data['feedbacksList'] = $this->feedbacks_model->genFeedback('','');
			$data['teachers'] = $this->feedbacks_model->getAllDataTeachers();
			// load page
			$this->load->view('templates/header');
			$this->load->view('feedbacks/'.$sub.$prefix, $data);
			$this->load->view('templates/footer');
		}
		
	}
	public function delete(){
		//load feedbacks_model -> delete() function
		$this->feedbacks_model->delete();
	}
	public function feedbackList()
	{	
		$from = isset($_GET['from']) ? $_GET['from'] : date('Y-m-d');
		$to = isset($_GET['to']) ? $_GET['to'] : date('Y-m-d');
		$data['feedbacksList'] = $this->feedbacks_model->genFeedback($from,$to);
		$this->load->view('templates/header');
		$this->load->view('feedbacks/admin-feedback',$data);
		$this->load->view('templates/footer');
	}
}
