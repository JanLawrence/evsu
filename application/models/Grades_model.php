<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grades_model extends CI_Model{
    
    public function studentGradeList(){
        $user = $this->session->userdata['user'];
        // questudent_idry that joins student and grading periods
        $this->db->select("t_stud.student_id,subj.subject_name,
                    CONCAT(student.last_name, ', ', student.first_name, ' ', student.last_name) student,
                IF(1st.grade IS NULL, 'N/A', 1st.grade) first_grade,
                IF(2nd.grade IS NULL, 'N/A', 2nd.grade) second_grade,
                IF(3rd.grade IS NULL, 'N/A', 3rd.grade) third_grade,	
                IF(4th.grade IS NULL, 'N/A', 4th.grade) fourth_grade,
                ((IF(1st.grade IS NULL, 0, 1st.grade) +  IF(2nd.grade IS NULL, 0, 2nd.grade)+  IF(3rd.grade IS NULL, 0, 3rd.grade)  + IF(4th.grade IS NULL, 0, 4th.grade)) / 4) average ,
                CASE
                    WHEN ((IF(1st.grade IS NULL, 0, 1st.grade) +  IF(2nd.grade IS NULL, 0, 2nd.grade)+  IF(3rd.grade IS NULL, 0, 3rd.grade)  + IF(4th.grade IS NULL, 0, 4th.grade)) / 4) >= 75 THEN 'Passed'
                    WHEN ((IF(1st.grade IS NULL, 0, 1st.grade) +  IF(2nd.grade IS NULL, 0, 2nd.grade)+  IF(3rd.grade IS NULL, 0, 3rd.grade)  + IF(4th.grade IS NULL, 0, 4th.grade)) / 4) < 75 THEN 'Failed'
                    ELSE ''
                END remarks
          ")
        ->from("tbl_students student")
        ->join("tbl_teacher_student t_stud", "ON t_stud.student_id = student.id","left")
        ->join("tbl_teacher_subjects t_subj", "ON t_subj.teacher_id = t_stud.teacher_id","left")
        ->join("tbl_subject subj", "ON subj.id = t_subj.subject_id","left")
        
        ->join("tbl_students_grade 1st", "ON 1st.teacher_student_id = t_stud.id AND 1st.teacher_subjects_id = t_subj.id AND 1st.period = '1st' AND 1st.year=".$_REQUEST['year'],"left")
        ->join("tbl_students_grade 2nd", "ON 2nd.teacher_student_id = t_stud.id AND 2nd.teacher_subjects_id = t_subj.id AND 2nd.period = '2nd' AND 2nd.year=".$_REQUEST['year'],"left")
        ->join("tbl_students_grade 3rd", "ON 3rd.teacher_student_id = t_stud.id AND 3rd.teacher_subjects_id = t_subj.id AND 3rd.period = '3rd' AND 3rd.year=".$_REQUEST['year'],"left")
        ->join("tbl_students_grade 4th", "ON 4th.teacher_student_id = t_stud.id AND 4th.teacher_subjects_id = t_subj.id AND 4th.period = '4th' AND 4th.year=".$_REQUEST['year'],"left");
        $this->db->where('student.id', $_REQUEST['id']);
        $this->db->where('t_stud.teacher_id',$user->user_id);

        $query = $this->db->get();
        return $query->result();
    }
  
    public function studentPerTeacher(){
        $user = $this->session->userdata['user'];
        $this->db->select('t.*');
        $this->db->from('tbl_teacher t');
        $this->db->where('t.id', $user->user_id);
        $query = $this->db->get(); // get results of query
        $userData = $query->result();
        // questudent_idry that joins student and grading periods
        $this->db->select("t_stud.student_id,
            CONCAT(student.last_name, ', ', student.first_name, ' ', student.last_name) student")
        ->from("tbl_students student")
        ->join("tbl_teacher_student t_stud", "ON t_stud.student_id = student.id","left");
        $this->db->where('student.status', 'saved');
        $this->db->where('t_stud.teacher_id',$userData[0]->id);

        $query = $this->db->get();
        return $query->result();
    }
    public function getSchoolYear(){
        $query = $this->db->get_where('tbl_school_year', array('status' => 'saved'));
        return $query->result();
    }
    public function getSections(){
        $query = $this->db->get_where('tbl_section', array('grade' => $_POST['grade']));
        echo json_encode($query->result());
    }
	public function addGrade(){
        $user = $this->session->userdata['user'];
        $this->db->select('t.*');
        $this->db->from('tbl_teacher t');
        $this->db->where('t.id', $user->user_id);
        $query = $this->db->get(); // get results of query
        $userData = $query->result();
        // data that will be inserted to tbl_students_grade
        foreach ($_POST['grade'] as $key => $each) {

            $teacherstud_id = $this->db->get_where('tbl_teacher_student', array('student_id' => $_POST['stud_id'][$key], 'teacher_id' => $userData[0]->id));
            $teacherstud_id = $teacherstud_id->result();
            $teachersubj_id = $this->db->get_where('tbl_teacher_subjects', array('section_id' => $_POST['section'], 'subject_id' => $_POST['subject'], 'teacher_id' => $userData[0]->id, 'grade' => $_POST['gradelevel']));
            $teachersubj_id = $teachersubj_id->result();
            $data = array(
                'teacher_student_id' => $teacherstud_id[0]->id,
                'teacher_subjects_id' => $teachersubj_id[0]->id,
                'period' => $_POST['grading'],
                'year' => $_POST['school_year'],
                'grade' => $each,
                'created_by' => 1,
                'date_created' => date('Y-m-d H:i:s')
            );

            $this->db->insert('tbl_students_grade', $data); // insert into tbl_students_grade
        } 
        
        $userData = $this->session->userdata['user'];
        $dataLog = array(
            'user_id' => $userData->user_id,
            'user_type' => $userData->user_type,
            'transaction' => 'Save new grades',
            'transaction_date' => date('Y-m-d H:i:s')
        );
        $this->db->insert('tbl_user_logs', $dataLog); // insert into tbl_user_logs
        
        $this->session->set_flashdata('msg', 'Grades was successfully saved.');
        redirect(base_url().'grades/add'); //redirect back to grade page
	}
   /*  public function delete(){
        foreach($_POST['teacherId'] as $each){ // looping the ids for tbl_teacher
            $this->db->delete('tbl_teacher', array('id' => $each)); // delete from tbl_teacher
        }
        redirect(base_url().'teachers'); //redirect back to teacher page
    } */
    
}
