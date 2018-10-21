<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grades_model extends CI_Model{
    
    public function studentGradeList(){
        // query that joins student and grading periods
        $this->db->select("t_stud.student_id,
            CONCAT(student.last_name, ', ', student.first_name, ' ', student.last_name) student,
            IF(1st.grade IS NULL, '',1st.grade) first_grade,
            IF(2nd.grade IS NULL, '',2nd.grade) second_grade,
            IF(3rd.grade IS NULL, '',3rd.grade) third_grade,	
            IF(4th.grade IS NULL, '',4th.grade) fourth_grade")
        ->from("tbl_students student")
        ->join("tbl_teacher_student t_stud", "ON t_stud.student_id = student.id","left")
        ->join("tbl_students_grade 1st", "ON 1st.teacher_student_id = t_stud.id
            AND 1st.period = '1st'","left")
        ->join("tbl_students_grade 2nd", "ON 2nd.teacher_student_id = t_stud.id
            AND 2nd.period = '2nd'","left")
        ->join("tbl_students_grade 3rd", "ON 3rd.teacher_student_id = t_stud.id
            AND 3rd.period = '3rd'","left")
        ->join("tbl_students_grade 4th", "ON 4th.teacher_student_id = t_stud.id
            AND 4th.period = '4th'","left");
        $this->db->where('t_stud.teacher_id',1);

        $query = $this->db->get();
        return $query->result();
    }

	public function addGrade(){
        // data that will be inserted to tbl_students_grade
        foreach ($_POST['grade'] as $key => $each) {
            $this->db->select('id')
            ->from('tbl_teacher_student');
            $this->db->where('student_id',$_POST['stud_id'][$key]);
            $this->db->where('teacher_id',1);

            $teacherstud_id = $this->db->get();
            $teacherstud_id = $teacherstud_id->result();
            
            $data = array(
                'teacher_student_id' => $teacherstud_id[0]->id,
                'period' => $_POST['grading'],
                'year' => $_POST['school_year'],
                'grade' => $each,
                'created_by' => 1,
                'date_created' => date('Y-m-d H:i:s')
            );

            $this->db->insert('tbl_students_grade', $data); // insert into tbl_students_grade
        } 
        redirect(base_url().'grades'); //redirect back to grade page
	}
   /*  public function delete(){
        foreach($_POST['teacherId'] as $each){ // looping the ids for tbl_teacher
            $this->db->delete('tbl_teacher', array('id' => $each)); // delete from tbl_teacher
        }
        redirect(base_url().'teachers'); //redirect back to teacher page
	} */
}
