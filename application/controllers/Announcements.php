<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Announcements extends CI_Controller {

	public function index($sub = 'announcement', $id = 0)
	{	
		// default prefix is empty if not '-announcement' is concatenated
		$prefix = $sub == 'announcement' ? '' : '-announcement';

		//if the file do not exist show 404 error page
		if(!file_exists(APPPATH.'views/announcement/'.$sub.$prefix.'.php')){
			// if method/function exist load function
			if(method_exists($this, $sub)){
				$this->{$sub}();
				return;
			} else { // else show 404 error
				show_404();
			}
		}

		//set validation rules
		$this->form_validation->set_rules('date', 'Date', 'required');
		$this->form_validation->set_rules('subject', 'Subject', 'required');
		$this->form_validation->set_rules('subject_name', 'Announcement Subject', 'required');
		$this->form_validation->set_rules('announcement', 'Announcement', 'required');
		
		//if validation is success
        if($this->form_validation->run() == TRUE){
			if($sub == 'add'){ //if add page, load model addAnnouncement()
				//load announcements_model -> addAnnouncement() function
				$this->announcements_model->addAnnouncement();
			} else if($sub == 'edit') { //if edit page, load model editTeacher()
				//load announcements_model -> editAnnouncement() function
				$this->announcements_model->editAnnouncement($id);
			}
		} else { //if validation failed, page will load again
			// get data
			$data['announcement'] = $this->announcements_model->getAllDataAnnouncements($id);
			$data['subjects'] = $this->announcements_model->getAllDataSubjects();
			$data['genAnnouncements'] = $this->announcements_model->genAnnouncements($from='',$to='');
			// load page
			$this->load->view('templates/header');
			$this->load->view('announcement/'.$sub.$prefix, $data);
			$this->load->view('templates/footer');
		}
		
	}
	public function delete(){
		//load announcements_model -> delete() function
		$this->announcements_model->delete();
	}
	public function announcementList()
	{	
		$from = isset($_GET['from']) ? $_GET['from'] : date('Y-m-d');
		$to = isset($_GET['to']) ? $_GET['to'] : date('Y-m-d');
		$data['genAnnouncements'] = $this->announcements_model->genAnnouncements($from,$to);
		$this->load->view('templates/header');
		$this->load->view('announcement/admin-announcement',$data);
		$this->load->view('templates/footer');
	}
}
