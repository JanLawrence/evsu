<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logs extends CI_Controller {

	public function userlogs()
	{
        //get user logs 
        $from = isset($_GET['from']) ? $_GET['from'] : date('Y-m-d');
		$to = isset($_GET['to']) ? $_GET['to'] : date('Y-m-d');
        $this->db->select('ul.*, c.username, c.id cred_id')
        ->from('tbl_user_logs ul')
        ->join('tbl_credentials c', 'c.user_id = ul.user_id AND c.user_type = ul.user_type', 'left');
        $this->db->where('DATE(ul.transaction_date) >= "'.$from.'" && DATE(ul.transaction_date) <= "'.$to.'"');
        $query = $this->db->get(); // get results of query
        $logs = $query->result();

        $data['logs'] = $logs;
        $this->load->view('templates/header');
		$this->load->view('logs/user-logs', $data);
		$this->load->view('templates/footer');
    }
    
}
