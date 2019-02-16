<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students_model extends CI_Model{
    public function __construct(){
        $this->user = isset($this->session->userdata['user']) ? $this->session->userdata['user'] : ''; //get session
    }
    public function getAllDataStudents($id){
        //query that joins teacher and subject
        $this->db->select('s.*, g.id guardian_id ,sec.id sec_id, sec.section, sec.grade, g.first_name g_fname, g.last_name g_lname, g.middle_name g_mname, g.registered g_registered, g.email g_email')
         ->from('tbl_students s')
         ->join('tbl_student_guardian sg', 'sg.student_id = s.id', 'inner')
         ->join('tbl_guardian g', 'g.id = sg.guardian_id', 'inner')
         ->join('tbl_section sec', 'sec.id = s.section_id', 'left')
         ->where('s.status', 'saved')
         ->where('g.status', 'saved');
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
            /*->where('s.status', 'saved')
            ->where('g.status', 'saved');*/
        if($this->user->user_type == 'teacher'){
            $this->db->where('s.created_by', $this->user->id);
        }
        $query = $this->db->get(); // get results of query
        return $query->result();
    }
    public function studentsList(){
        $this->db->select('s.id, CONCAT(s.last_name, ", ", s.first_name, " ", s.middle_name) student')
            ->from('tbl_students s')
            ->where('s.status', 'saved');
        $query = $this->db->get(); // get results of query
        return $query->result();
    }
    public function gengrades3($year){
        $user = $this->session->userdata['user'];
        if($user->user_type == 'parent'){
            $queryCheck = $this->db->get_where('tbl_student_guardian', array('guardian_id' => $user->user_id));
            $data = $queryCheck->result();
            $student = $data[0]->student_id;
        } else {
            $student = $user->user_id;
        }
        $sql = "SELECT 
                    sub.id sub_id,
                    sub.subject_name,
                    grade.*
                FROM tbl_subject sub
                LEFT JOIN (
                    SELECT 
                        *
                    FROM tbl_students_grade sg
                    WHERE sg.student_id = $student
                    AND sg.year = $year
                ) grade
                ON grade.subject_id = sub.id
                INNER JOIN 
                    tbl_section sec
                ON sec.id = sub.section_id
                INNER JOIN
                    tbl_teacher t
                ON t.id = sec.teacher_id
                INNER JOIN 
                    tbl_students stud
                ON stud.section_id = sec.id";
         $query = $this->db->query($sql);
         return $query->result();
    }
    public function gengrades2($year){
        $user = $this->session->userdata['user'];
        if($user->user_type == 'student'){
            $userId = $user->user_id;
        } else {
            $this->db->select('tg.*');
            $this->db->from('tbl_student_guardian tg');
            $this->db->where('tg.guardian_id', $user->user_id);
            $query = $this->db->get(); // get results of query
            $userData = $query->result();

            $userId =$userData[0]->student_id;
        }
        // questudent_idry that joins student and grading periods
        $this->db->select("t_stud.student_id,subj.subject_name,
                    CONCAT(student.last_name, ', ', student.first_name, ' ', student.last_name) student,
                IF(1st.grade IS NULL, 'N/A', 1st.grade) first_grade,
                IF(2nd.grade IS NULL, 'N/A', 2nd.grade) second_grade,
                IF(3rd.grade IS NULL, 'N/A', 3rd.grade) third_grade,	
                IF(4th.grade IS NULL, 'N/A', 4th.grade) fourth_grade
          ")
        ->from("tbl_students student")
        ->join("tbl_teacher_student t_stud", "ON t_stud.student_id = student.id","left")
        ->join("tbl_teacher_subjects t_subj", "ON t_subj.teacher_id = t_stud.teacher_id","left")
        ->join("tbl_subject subj", "ON subj.id = t_subj.subject_id","left")
        
        ->join("tbl_students_grade 1st", "ON 1st.teacher_student_id = t_stud.id AND 1st.teacher_subjects_id = t_subj.id AND 1st.period = '1st' AND 1st.year=".$year,"left")
        ->join("tbl_students_grade 2nd", "ON 2nd.teacher_student_id = t_stud.id AND 2nd.teacher_subjects_id = t_subj.id AND 2nd.period = '2nd' AND 2nd.year=".$year,"left")
        ->join("tbl_students_grade 3rd", "ON 3rd.teacher_student_id = t_stud.id AND 3rd.teacher_subjects_id = t_subj.id AND 3rd.period = '3rd' AND 3rd.year=".$year,"left")
        ->join("tbl_students_grade 4th", "ON 4th.teacher_student_id = t_stud.id AND 4th.teacher_subjects_id = t_subj.id AND 4th.period = '4th' AND 4th.year=".$year,"left");
        $this->db->where('student.id',$userId);
        $query = $this->db->get();
        return $query->result();
    }
    public function gengrades(){
        $user = $this->session->userdata['user'];
        if($user->user_type == 'student'){
            $this->db->select('s.*');
            $this->db->from('tbl_students s');
            $this->db->where('s.id', $user->user_id);
            $this->db->where('s.status', 'saved');
            $query = $this->db->get(); // get results of query
            $userData = $query->result();
        } else if ($user->user_type == 'parent'){
            $this->db->select('g.*');
            $this->db->from('tbl_guardian g');
            $this->db->where('g.id', $user->user_id);
            $this->db->where('g.status', 'saved');
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
        ->join("tbl_student_guardian guardian","ON guardian.student_id = stud.id","left")
        ->where('stud.status', 'saved');
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
            'section_id' => $_POST['section'],
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
            'username' => $_POST['schoolId'],
            'password' => $this->encryptpass->pass_crypt('12345678'),
            'user_type' => 'student',
            'confirm' => 'yes',
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
            'registered' => 'yes',
            'created_by' => $this->user->id,
            'date_created' => date('Y-m-d H:i:s')
        );
        
        $this->db->insert('tbl_guardian', $dataGuardian); // insert into tbl_guardian
        $guardianId = $this->db->insert_id(); // getting the id of the inserted data
        
        
        // data that will be inserted to tbl_credentials
        $data = array(
            'username' => $_POST['g_lastName'],
            'password' => $this->encryptpass->pass_crypt('pass-123'),
            'user_type' => 'parent',
            'confirm' => 'yes',
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

        $userData = $this->session->userdata['user'];
        $dataLog = array(
            'user_id' => $userData->user_id,
            'user_type' => $userData->user_type,
            'transaction' => 'Add New Student and Guardian',
            'transaction_date' => date('Y-m-d H:i:s')
        );
        $this->db->insert('tbl_user_logs', $dataLog); // insert into tbl_user_logs

        $this->session->set_flashdata('msg', 'Student was successfully saved.');
        redirect(base_url().'students'); //redirect back to student page
	}
    public function editStudent($id){
        // data that will be updated to tbl_students
        $this->db->set('section_id', $_POST['section']);
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
            'user_type' => $userData->user_type,
            'transaction' => 'Edit Student Information',
            'transaction_date' => date('Y-m-d H:i:s')
        );
        $this->db->insert('tbl_user_logs', $dataLog); // insert into tbl_user_logs

        $this->session->set_flashdata('msg', 'Student was successfully updated.');
        redirect(base_url().'students'); //redirect back to student page
    }
    public function delete(){
        foreach($_POST['studentId'] as $each){ // looping the ids for tbl_students
            $studentInfo = $this->getAllDataStudents($each);

            //$this->db->delete('tbl_students', array('id' => $each)); // delete from tbl_students
            $this->db->set('status', 'deleted'); // delete from tbl_students
            $this->db->where('id', $each);
            $this->db->update('tbl_students'); //delete tbl_students

            //$this->db->delete('tbl_guardian', array('id' => $studentInfo[0]->guardian_id)); // delete from tbl_guardian
            $this->db->set('status', 'deleted'); // delete from tbl_guardian
            $this->db->where('id', $studentInfo[0]->guardian_id);
            $this->db->update('tbl_guardian'); //delete tbl_guardian

            $query = $this->db->get_where('tbl_credentials', array('user_id' => $each, 'user_type' => 'student'));
            $data = $query->result();
            $this->db->set('status', 'deleted'); // delete from tbl_credentials
            $this->db->where('id', $data[0]->id);
            $this->db->update('tbl_credentials'); //delete tbl_credentials

            $query2 = $this->db->get_where('tbl_credentials', array('user_id' => $studentInfo[0]->guardian_id, 'user_type' => 'student'));
            $data2 = $query2->result();
            $this->db->set('status', 'deleted'); // delete from tbl_credentials
            $this->db->where('id', $data2[0]->id);
            $this->db->update('tbl_credentials'); //delete tbl_credentials
        }

        $userData = $this->session->userdata['user'];
        $dataLog = array(
            'user_id' => $userData->user_id,
            'user_type' => $userData->user_type,
            'transaction' => 'Delete Student and Guardian',
            'transaction_date' => date('Y-m-d H:i:s')
        );
        $this->db->insert('tbl_user_logs', $dataLog); // insert into tbl_user_logs

        $this->session->set_flashdata('msg', 'Student/s was successfully deleted.');
        redirect(base_url().'students'); //redirect back to student page
    }
}
