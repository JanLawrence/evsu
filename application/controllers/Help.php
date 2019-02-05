<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Help extends CI_Controller {
    
    public function index(){
        $data['list'] = $this->list();
        $this->load->view('templates/header');
        $this->load->view('help/index', $data);
        $this->load->view('templates/footer');
    }
    public function add()
	{
        $user = $this->session->userdata['user'];
        if(isset($_FILES['file']) && $_FILES['file']['tmp_name']!=''){ //validation if all condition statement are true proceed to sub statement
            if($_FILES['file']['type'] != 'application/pdf'){
               echo 2;
               exit;
           } 
       }
		if(isset($_FILES['file']) && $_FILES['file']['tmp_name']!=''){//if statement is true
			//insert attachment
			list($fileName , $ext) = explode('.', $_FILES['file']['name']);
			$tmpName  = $_FILES['file']['tmp_name'];            
			$fileSize = $_FILES['file']['size'];                
			$fileType = $_FILES['file']['type'];   
			$fileNewTemp = file_get_contents($tmpName);     
			if(!get_magic_quotes_gpc())
			{  
				$fileName = addslashes($fileName);
			}
			
			$data = array(
				'portal' => $_POST['portal'],
				'title' => $_POST['title'],
				'name' => $fileName,
				'type' => $fileType,
				'size' => $fileSize,
				'content' => $fileNewTemp,
				'created_by' => $user->id,
				'date_created' => date('Y-m-d H:i:s')
			);
			$this->db->insert('tbl_help', $data);

        } else {
            echo 1;
        }
    }
    public function download(){
		//for attachment download
		$query = $this->db->get_where('tbl_help', array('id'=> $_REQUEST['id']));
		$help = $query->result();
		$name = $help[0]->name;
		$type = $help[0]->type;
		$size = $help[0]->size;
		$content = $help[0]->content;
			header("Content-Disposition: attachment; filename=".$name.".pdf");
			header("Content-Type: $type");
			header("Content-Length: $size");
			ob_clean();
			flush();
			echo $content;
			
	} 
    public function list(){
        $query = $this->db->get('tbl_help');
        return $query->result();
	} 
}