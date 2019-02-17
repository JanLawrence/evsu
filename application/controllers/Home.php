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

                //user login logs
                $dataLog = array(
                    'user_id' => $data[0]->user_id,
                    'user_type' => $data[0]->user_type,
                    'transaction' => 'Login',
                    'transaction_date' => date('Y-m-d H:i:s')
                );
                $this->db->insert('tbl_user_logs', $dataLog); // insert into tbl_user_logs

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
                $data = array(
                    'username'          => $this->input->post('username'),
                    'password'            => $this->input->post('password'),
                );
                $this->load->view('login/'.$sub.$prefix, $data);
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
        
        //user logout logs
        $dataLog = array(
            'user_id' => $session->user_id,
            'user_type' => $session->user_type,
            'transaction' => 'Logout',
            'transaction_date' => date('Y-m-d H:i:s')
        );
        $this->db->insert('tbl_user_logs', $dataLog); // insert into tbl_user_logs

        $this->db->set('login_stat', 'out'); // update status to logged in from tbl_credentials
        $this->db->where('id', $session->id);
        $this->db->update('tbl_credentials'); //update status to logged in from tbl_credentials
        //destroy session
        $this->session->sess_destroy();
        //redirect to homepage
        redirect(base_url());
    }
    public function studentList(){
        $sql = "SELECT stud.first_name, stud.middle_name, stud.last_name, stud.id student_id, IF(b.bio IS NOT NULL, b.bio, '') bio
                FROM 
                    tbl_students stud
                INNER JOIN 
                    tbl_credentials c
                ON c.user_id = stud.id AND user_type ='student'
                LEFT JOIN 
                    tbl_bio b
                ON b.student_id = stud.id";
        $query = $this->db->query($sql);
        echo json_encode($query->result());
    }
    public function studentBio(){
        $student = $_REQUEST['student_id'];
        $sql = "SELECT stud.first_name, stud.middle_name, stud.last_name, stud.id student_id, IF(b.bio IS NOT NULL, b.bio, '') bio
                FROM 
                    tbl_students stud
                INNER JOIN 
                    tbl_credentials c
                ON c.user_id = stud.id AND user_type ='student'
                LEFT JOIN 
                    tbl_bio b
                ON b.student_id = stud.id
                WHERE stud.id = $student";
        $query = $this->db->query($sql);
        echo json_encode($query->result());
    }
    public function studentAttendance(){
        $data = array(
            'student_id' => $_REQUEST['student_id'],
            'attendance_date' => date('Y-m-d'),
            'type' => $_REQUEST['type'],
            'meridiem' => $_REQUEST['meridiem'],
            'time' => date('Y-m-d H:i:s'),
            'created_by' => 0,
            'date_created' => date('Y-m-d H:i:s')
        );
        $this->db->insert('tbl_attendance', $data); // insert into tbl_attendance
    }
    public function studentInsertBio(){
        $data = array(
            'student_id' => $_REQUEST['student_id'],
            'bio' => $_REQUEST['bio'],
            'created_by' => 0,
            'date_created' => date('Y-m-d H:i:s')
        );
        $this->db->insert('tbl_bio', $data); // insert into tbl_bio
    }
}