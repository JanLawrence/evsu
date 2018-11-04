<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
	public function index($sub = '')
	{
        if($sub == ''){
            show_404();
        }
        $prefix = '-login';
		//if the file do not exist show 404 error page
		if(!file_exists(APPPATH.'views/login/'.$sub.$prefix.'.php')){
			// if method/function exist load function
			if(method_exists($this, $sub)){
                $this->{$sub}();
				return;
			} else { // else show 404 error
				show_404();
			}
        }
        if(isset($this->session->userdata['user'])){
            if($sub == 'admin'){
                redirect(base_url().'teachers');
            } else if($sub == 'teacher'){
                redirect(base_url().'announcements');
            } else if($sub == 'student'){
                redirect(base_url().'announcements/announcementList');
            } else if($sub == 'parent'){
                redirect(base_url().'students/studentgrade');
            }
        } else {
            //set validation rules
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'callback_validate['.$sub.']');
    
            if($this->form_validation->run() == TRUE){ // validation success
                // get tbl_credential data to be set to "user" session
                $user = $this->input->post('username');
                $query = $this->db->get_where('tbl_credentials', array('username' => $user));
                $data = $query->result();
                $this->session->set_userdata('user', $data[0]);

                $this->db->set('login_stat', 'in'); // update status to logged in from tbl_credentials
                $this->db->where('id', $data[0]->id);
                $this->db->update('tbl_credentials'); //update status to logged in from tbl_credentials

                // redirect based on user_type
                if($sub == 'admin'){
                    redirect(base_url().'teachers');
                } else if($sub == 'teacher'){
                    redirect(base_url().'announcements');
                } else if($sub == 'student'){
                    redirect(base_url().'announcements/announcementList');
                } else if($sub == 'parent'){
                    redirect(base_url().'students/studentgrade');
                }
            } else {
                $this->load->view('login/'.$sub.$prefix);
            }
        }

    }
    public function validate($pass, $type){ // validate username and password, will be used in callback for form validation
        $user = $this->input->post('username');
        if($user != ''){
            $query = $this->db->get_where('tbl_credentials', array('username' => $user, 'user_type' => $type, 'confirm' => 'yes', 'status' => 'saved'));
            $data = $query->result();
            if(empty($data)){
                $this->form_validation->set_message('validate', 'Invalid Username');
                return FALSE;
            } else {
                if($pass != ''){
                    if($pass == $this->encryptpass->pass_crypt($data[0]->password, 'd')){
                        return TRUE;
                    } else {
                        $this->form_validation->set_message('validate', 'Invalid Password');
                        return FALSE;
                    }
                } else {
                    $this->form_validation->set_message('validate', 'Invalid Password');
                    return FALSE;
                }
            }
        } else {
            $this->form_validation->set_message('validate', 'Invalid Username');
            return FALSE;
        }
    }
    public function logout(){
        $session = $this->session->userdata['user'];

        $this->db->set('login_stat', 'out'); // update status to logged in from tbl_credentials
        $this->db->where('id', $session->id);
        $this->db->update('tbl_credentials'); //update status to logged in from tbl_credentials
        //destroy session
        $this->session->sess_destroy();
        //redirect to homepage
        redirect(base_url().'home/'.$session->user_type);
    }
}