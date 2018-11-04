<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logs extends CI_Controller {

	public function userlogs()
	{
        //get user logs 
        $from = isset($_GET['from']) ? $_GET['from'] : date('Y-m-d');
		$to = isset($_GET['to']) ? $_GET['to'] : date('Y-m-d');
        $this->db->select("ul.*, 
                        CASE WHEN ul.user_type = 'admin'
                            THEN (SELECT CONCAT(last_name, ', ', first_name, ' ', middle_name) FROM tbl_admin WHERE id = ul.user_id)
                        WHEN ul.user_type = 'teacher'
                            THEN (SELECT CONCAT(last_name, ', ', first_name, ' ', middle_name) FROM tbl_teacher WHERE id = ul.user_id)
                        WHEN ul.user_type = 'student'
                            THEN (SELECT CONCAT(last_name, ', ', first_name, ' ', middle_name) FROM tbl_students WHERE id = ul.user_id)
                        WHEN ul.user_type = 'parent'
                            THEN (SELECT CONCAT(last_name, ', ', first_name, ' ', middle_name) FROM tbl_guardian WHERE id = ul.user_id)
                        END AS whole_name
                        ")
        ->from('tbl_user_logs ul');
        $this->db->where('DATE(ul.transaction_date) >= "'.$from.'" && DATE(ul.transaction_date) <= "'.$to.'"');
        $query = $this->db->get(); // get results of query
        $logs = $query->result();

        $data['logs'] = $logs;
        $this->load->view('templates/header');
		$this->load->view('logs/user-logs', $data);
		$this->load->view('templates/footer');
    }
    
}
