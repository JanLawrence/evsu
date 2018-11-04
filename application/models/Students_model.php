<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students_model extends CI_Model{
    public function __construct(){
        $this->user = isset($this->session->userdata['user']) ? $this->session->userdata['user'] : ''; //get session
    }
    public function getAllDataStudents($id){
        //query that joins teacher and subject
        $this->db->select('s.*, g.id guardian_id , g.first_name g_fname, g.last_name g_lname, g.middle_name g_mname, g.registered g_registered, g.email g_email')
         ->from('tbl_students s')
         ->join('tbl_student_guardian sg', 'sg.student_id = s.id', 'inner')
         ->join('tbl_guardian g', 'g.id = sg.guardian_id', 'inner');
        if($id != 0){ // if id not equal to 0 the query will filter per teacher id 
            $this->db->where('s.id', $id);
        }
        $query = $this->db->get(); // get results of query
        return $query->result();
    }
    public function genStudentList(){
        //query that joins teacher and subject
        $this->db->select('s.*, g.id guardian_id , g.first_name g_fname, g.last_name g_lname, g.middle_name g_mname, g.registered g_registered, g.email g_email')
            ->from('tbl_students s')
            ->join('tbl_student_guardian sg', 'sg.student_id = s.id', 'inner')
            ->join('tbl_guardian g', 'g.id = sg.guardian_id', 'inner');
            $this->db->where('s.created_by', $this->user->id);
        $query = $this->db->get(); // get results of query
        return $query->result();
    }
    public function studentsList(){
        $this->db->select('s.id, CONCAT(s.last_name, ", ", s.first_name, " ", s.middle_name) student');
        $query = $this->db->get('tbl_students s');
        return $query->result();
    }
    public function gengrades(){
        $user = $this->session->userdata['user'];
        if($user->user_type == 'student'){
            $this->db->select('s.*');
            $this->db->from('tbl_students s');
            $this->db->where('s.id', $user->user_id);
            $query = $this->db->get(); // get results of query
            $userData = $query->result();
        } else if ($user->user_type == 'parent'){
            $this->db->select('g.*');
            $this->db->from('tbl_guardian g');
            $this->db->where('g.id', $user->user_id);
            $query = $this->db->get(); // get results of query
            $userData = $query->result();

            $this->db->select('sg.*');
            $this->db->from('tbl_student_guardian sg');
            $this->db->where('sg.guardian_id', $userData[0]->id);
            $query = $this->db->get(); // get results of query
            $studentData = $query->result();
        }

        $year = isset($_POST['school_year']) ? $_POST['school_year'] : date('Y').' - '.date('Y', strtotime(date('Y'). '+ 1 year'));
        $this->db->select("t_stud.student_id,
            sub.subject_name,
            IF(first_grade.grade IS NULL,'',first_grade.grade)first_grade,
            IF(second_grade.grade IS NULL,'',second_grade.grade)second_grade,
            IF(third_grade.grade IS NULL,'',third_grade.grade)third_grade,
            IF(fourth_grade.grade IS NULL,'',fourth_grade.grade)fourth_grade")
        ->from("tbl_students stud")
        ->join("tbl_teacher_student t_stud","ON t_stud.student_id = stud.id","left")
        ->join("tbl_teacher_subjects t_sub","ON t_sub.teacher_id = t_stud.teacher_id","left")
        ->join("tbl_subject sub","ON sub.id = t_sub.subject_id","left")
        ->join("tbl_students_grade first_grade","ON first_grade.teacher_student_id = t_stud.id
            AND first_grade.period = '1st' AND first_grade.YEAR = '".$year."'","left")
        ->join("tbl_students_grade second_grade","ON second_grade.teacher_student_id = t_stud.id
            AND second_grade.period = '2nd' AND second_grade.YEAR = '".$year."'","left")
        ->join("tbl_students_grade third_grade","ON third_grade.teacher_student_id = t_stud.id
            AND third_grade.period = '3rd' AND third_grade.YEAR = '".$year."'","left")
        ->join("tbl_students_grade fourth_grade","ON fourth_grade.teacher_student_id = t_stud.id
            AND fourth_grade.period = '4th' AND fourth_grade.YEAR = '".$year."'","left")
        ->join("tbl_student_guardian guardian","ON guardian.student_id = stud.id","left");
        if($user->user_type == 'student'){
            $this->db->where("stud.id",$userData[0]->id);
        } else if($user->user_type == 'parent') {
            $this->db->where("stud.id",$studentData[0]->student_id);
            $this->db->where("guardian.guardian_id",$userData[0]->id);
        }
        $this->db->order_by("sub.subject_name");
        
        $query = $this->db->get();
        return $query->result();
    }
	public function addStudent(){
        $user = $this->session->userdata['user'];
        $this->db->select('t.*');
        $this->db->from('tbl_teacher t');
        $this->db->where('t.id', $user->user_id);
        $query = $this->db->get(); // get results of query
        $userData = $query->result();
        // data that will be inserted to tbl_students
        $data = array(
            'school_id' => $_POST['schoolId'],
            'first_name' => $_POST['firstName'],
            'middle_name' => $_POST['middleName'],
            'last_name' => $_POST['lastName'],
            'phone' => $_POST['phone'],
            'address' => $_POST['address'],
            'email' => $_POST['email'],
            'created_by' => $this->user->id,
            'date_created' => date('Y-m-d H:i:s')
        );
        
        $this->db->insert('tbl_students', $data); // insert into tbl_students
        $studentId = $this->db->insert_id(); // getting the id of the inserted data

        // data that will be inserted to tbl_credentials
        $data = array(
            'username' => 'student_'.$studentId,
            'password' => $this->encryptpass->pass_crypt('pass-123'),
            'user_type' => 'student',
            'confirm' => 'no',
            'user_id' => $studentId,
            'created_by' => $this->user->id,
            'date_created' => date('Y-m-d H:i:s')
        );
        
        $this->db->insert('tbl_credentials', $data); // insert into tbl_credentials
        
        // data that will be inserted to tbl_guardian
        $dataGuardian= array(
            'first_name' => $_POST['g_firstName'],
            'middle_name' => $_POST['g_middleName'],
            'last_name' => $_POST['g_lastName'],
            'email' => $_POST['g_email'],
            'registered' => 'no',
            'created_by' => $this->user->id,
            'date_created' => date('Y-m-d H:i:s')
        );
        
        $this->db->insert('tbl_guardian', $dataGuardian); // insert into tbl_guardian
        $guardianId = $this->db->insert_id(); // getting the id of the inserted data
        
        
        // data that will be inserted to tbl_credentials
        $data = array(
            'username' => 'guardian_'.$guardianId,
            'password' => $this->encryptpass->pass_crypt('pass-123'),
            'user_type' => 'parent',
            'confirm' => 'no',
            'user_id' => $guardianId,
            'created_by' => $this->user->id,
            'date_created' => date('Y-m-d H:i:s')
        );
        
        $this->db->insert('tbl_credentials', $data); // insert into tbl_credentials
        

        // data that will be inserted to tbl_student_guardian
        $dataStudentGuardian = array(
            'student_id' => $studentId,
            'guardian_id' => $guardianId,
            'created_by' => $this->user->id,
            'date_created' => date('Y-m-d H:i:s')
        );
        
        $this->db->insert('tbl_student_guardian', $dataStudentGuardian); // insert into tbl_student_guardian

        // data that will be inserted to tbl_teacher_student
        $dataStudentGuardian = array(
            'teacher_id' => $userData[0]->id,
            'student_id' => $studentId,
            'created_by' => $this->user->id,
            'date_created' => date('Y-m-d H:i:s')
        );
        
        $this->db->insert('tbl_teacher_student', $dataStudentGuardian); // insert into tbl_teacher_student
        
        $userData = $this->session->userdata['user'];
        $dataLog = array(
            'user_id' => $userData->user_id,
            'user_type' => 'teacher',
            'transaction' => 'Add Student and Guardian',
            'transaction_date' => date('Y-m-d H:i:s')
        );
        $this->db->insert('tbl_user_logs', $dataLog); // insert into tbl_user_logs

        $this->session->set_flashdata('msg', 'Student was successfully saved.');
        redirect(base_url().'students'); //redirect back to student page
	}
    public function editStudent($id){
        // data that will be updated to tbl_students
        $this->db->set('school_id', $_POST['schoolId']);
        $this->db->set('first_name', $_POST['firstName']);
        $this->db->set('middle_name', $_POST['middleName']);
        $this->db->set('last_name', $_POST['lastName']);
        $this->db->set('phone', $_POST['phone']);
        $this->db->set('address', $_POST['address']);
        $this->db->set('email', $_POST['email']);
        $this->db->set('modified_by', $this->user->id);
        $this->db->set('date_modified', date('Y-m-d H:i:s'));
        $this->db->where('id', $id);
        $this->db->update('tbl_students'); //update tbl_students
        
        $studentInfo = $this->getAllDataStudents($id);

        // data that will be updated to tbl_guardian
        $this->db->set('first_name', $_POST['g_firstName']);
        $this->db->set('middle_name', $_POST['g_middleName']);
        $this->db->set('last_name', $_POST['g_lastName']);
        $this->db->set('email', $_POST['g_email']);
        $this->db->set('modified_by', $this->user->id);
        $this->db->set('date_modified', date('Y-m-d H:i:s'));
        $this->db->where('id', $studentInfo[0]->guardian_id);
        $this->db->update('tbl_guardian'); //update tbl_guardian

        $userData = $this->session->userdata['user'];
        $dataLog = array(
            'user_id' => $userData->user_id,
            'user_type' => 'teacher',
            'transaction' => 'Edit Student and Guardian',
            'transaction_date' => date('Y-m-d H:i:s')
        );
        $this->db->insert('tbl_user_logs', $dataLog); // insert into tbl_user_logs

        $this->session->set_flashdata('msg', 'Student was successfully updated.');
        redirect(base_url().'students'); //redirect back to student page
    }
    public function delete(){
        foreach($_POST['studentId'] as $each){ // looping the ids for tbl_teacher
            $this->db->delete('tbl_students', array('id' => $each)); // delete from tbl_teacher
            $studentInfo = $this->getAllDataStudents($id);
            $this->db->delete('tbl_guardian', array('id' => $studentInfo[0]->guardian_id)); // delete from tbl_guardian
        }

        $userData = $this->session->userdata['user'];
        $dataLog = array(
            'user_id' => $userData->user_id,
            'user_type' => 'teacher',
            'transaction' => 'Delete Student and Guardian',
            'transaction_date' => date('Y-m-d H:i:s')
        );
        $this->db->insert('tbl_user_logs', $dataLog); // insert into tbl_user_logs

        $this->session->set_flashdata('msg', 'Student/s was successfully deleted.');
        redirect(base_url().'students'); //redirect back to student page
    }
}
