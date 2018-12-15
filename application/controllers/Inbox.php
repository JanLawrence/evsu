<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inbox extends CI_Controller {

	public function index()
	{	
        $userData = $this->session->userdata['user'];
        if($userData->user_type == 'teacher'){
            $data['inbox'] = $this->inbox_model->getTeacherInbox();
        } else if($userData->user_type == 'parent'){
            $data['inbox'] = $this->inbox_model->getParentInbox();
        }

		$this->load->view('templates/header');
		$this->load->view('inbox/inbox.php', $data);
		$this->load->view('templates/footer');
    }
    public function chat($id = 0){
        if($id != 0){
            $data['chat'] = $this->inbox_model->getChat($id);
            $data['user'] = $this->inbox_model->getUser($id);
            $data['id'] = $id;
            $this->load->view('templates/header');
            $this->load->view('inbox/chat.php', $data);
            $this->load->view('templates/footer');
        } else {
            show_404();
        }
    }
    public function addChat(){
        $this->inbox_model->addChat();
    }
}
