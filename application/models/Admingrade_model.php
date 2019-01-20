<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admingrade_model extends CI_Model{
    public function __construct(){
        $this->user = isset($this->session->userdata['user']) ? $this->session->userdata['user'] : ''; //get session
    }
    public function subList(){
        $sql = "SELECT 
                    ts.grade,
                    sec.id section_id,
                    sec.section,
                    sub.id sub_id,
                    sub.subject_name,
                    t.id sub_t_id,
                    CONCAT(t.last_name,', ',t.first_name,' ',t.last_name) as sub_t_name,
                    t_adviser.id t_adviser_id,
                    CONCAT(t_adviser.last_name,', ',t_adviser.first_name,' ',t_adviser.last_name) as t_adviser_name
                FROM 
                    tbl_teacher_subjects ts
                LEFT JOIN
                    tbl_teacher t
                ON t.id = ts.teacher_id
                LEFT JOIN
                    tbl_subject sub
                ON sub.id = ts.subject_id
                LEFT JOIN
                    tbl_section sec
                ON sec.id = ts.section_id
                LEFT JOIN
                    tbl_teacher t_adviser
                ON t_adviser.id = sec.teacher_id
                ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function studentGradeList(){
        $teacher = $_POST['teacher'];
        $subject = $_POST['subject'];
        $section = $_POST['section'];
        $grade = $_POST['grade'];
        $year = $_POST['year'];
        $sql = "SELECT * FROM tbl_students s
                LEFT JOIN 
                    tbl_teacher_student ts
                ON 
                    ts.student_id = s.id
                LEFT JOIN 
                    tbl_credentials c
                ON 
                    c.user_id = s.id AND c.user_type = 'student'
                LEFT JOIN 
                    (SELECT sg.*, sg.id student_grade_id
                        FROM tbl_students_grade sg
                        LEFT JOIN 
                            tbl_teacher_student ts
                        ON ts.id = sg.teacher_student_id
                        LEFT JOIN
                            tbl_teacher_subjects tsub
                        ON tsub.id = sg.teacher_subjects_id
                        WHERE ts.teacher_id =  $teacher
                        AND tsub.subject_id = $subject
                        AND tsub.section_id = $section
                        AND tsub.grade = $grade
                        AND sg.`year` = $year
                    
                    ) g
                ON g.teacher_student_id = ts.id
                WHERE ts.teacher_id = $teacher
                AND c.confirm = 'yes'";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function changeGrade(){
        $data = $this->studentGradeList();
        foreach($data as $each){
            $this->db->set('locked', 'no');
            $this->db->set('modified_by', $this->user->user_id);
            $this->db->set('date_modified', date('Y-m-d H:i:s'));
            $this->db->where('id', $each->student_grade_id);
            $this->db->update('tbl_students_grade');
        }
    }
}