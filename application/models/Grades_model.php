<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grades_model extends CI_Model{
    
    // public function studentGradeList(){
    //     $user = $this->session->userdata['user'];
    //     // questudent_idry that joins student and grading periods
    //     $this->db->select("t_stud.student_id,subj.subject_name,
    //                 CONCAT(student.last_name, ', ', student.first_name, ' ', student.last_name) student,
    //             IF(1st.grade IS NULL, 'N/A', 1st.grade) first_grade,
    //             IF(2nd.grade IS NULL, 'N/A', 2nd.grade) second_grade,
    //             IF(3rd.grade IS NULL, 'N/A', 3rd.grade) third_grade,	
    //             IF(4th.grade IS NULL, 'N/A', 4th.grade) fourth_grade,
    //             ((IF(1st.grade IS NULL, 0, 1st.grade) +  IF(2nd.grade IS NULL, 0, 2nd.grade)+  IF(3rd.grade IS NULL, 0, 3rd.grade)  + IF(4th.grade IS NULL, 0, 4th.grade)) / 4) average ,
    //             CASE
    //                 WHEN ((IF(1st.grade IS NULL, 0, 1st.grade) +  IF(2nd.grade IS NULL, 0, 2nd.grade)+  IF(3rd.grade IS NULL, 0, 3rd.grade)  + IF(4th.grade IS NULL, 0, 4th.grade)) / 4) >= 75 THEN 'Passed'
    //                 WHEN ((IF(1st.grade IS NULL, 0, 1st.grade) +  IF(2nd.grade IS NULL, 0, 2nd.grade)+  IF(3rd.grade IS NULL, 0, 3rd.grade)  + IF(4th.grade IS NULL, 0, 4th.grade)) / 4) < 75 THEN 'Failed'
    //                 ELSE ''
    //             END remarks
    //       ")
    //     ->from("tbl_students student")
    //     ->join("tbl_teacher_student t_stud", "ON t_stud.student_id = student.id","left")
    //     ->join("tbl_teacher_subjects t_subj", "ON t_subj.teacher_id = t_stud.teacher_id","left")
    //     ->join("tbl_subject subj", "ON subj.id = t_subj.subject_id","left")
        
    //     ->join("tbl_students_grade 1st", "ON 1st.teacher_student_id = t_stud.id AND 1st.teacher_subjects_id = t_subj.id AND 1st.period = '1st' AND 1st.year=".$_REQUEST['year'],"left")
    //     ->join("tbl_students_grade 2nd", "ON 2nd.teacher_student_id = t_stud.id AND 2nd.teacher_subjects_id = t_subj.id AND 2nd.period = '2nd' AND 2nd.year=".$_REQUEST['year'],"left")
    //     ->join("tbl_students_grade 3rd", "ON 3rd.teacher_student_id = t_stud.id AND 3rd.teacher_subjects_id = t_subj.id AND 3rd.period = '3rd' AND 3rd.year=".$_REQUEST['year'],"left")
    //     ->join("tbl_students_grade 4th", "ON 4th.teacher_student_id = t_stud.id AND 4th.teacher_subjects_id = t_subj.id AND 4th.period = '4th' AND 4th.year=".$_REQUEST['year'],"left");
    //     $this->db->where('student.id', $_REQUEST['id']);
    //     $this->db->where('t_stud.teacher_id',$user->user_id);

    //     $query = $this->db->get();
    //     return $query->result();
    // }
    public function sectionList(){
        $user = $this->session->userdata['user'];
        $list = $this->db->get_where('tbl_section', array('teacher_id' => $user->user_id));
        return $list->result();
    }
    public function studentPerTeacher2(){
        $user = $this->session->userdata['user'];
        $sql = "SELECT 
                    stud.*
                FROM tbl_students stud
                INNER JOIN 
                    tbl_section sec
                ON sec.id = stud.section_id
                INNER JOIN
                    tbl_teacher t
                ON t.id = sec.teacher_id
                WHERE t.id = $user->user_id";
         $query = $this->db->query($sql);
         return $query->result();
    }
    public function returnStudentListPerSec(){
        $user = $this->session->userdata['user'];
        $sql = "SELECT 
                    stud.*
                FROM tbl_students stud
                INNER JOIN 
                    tbl_section sec
                ON sec.id = stud.section_id
                INNER JOIN
                    tbl_teacher t
                ON t.id = sec.teacher_id
                WHERE t.id = $user->user_id
                AND sec.id = ".$_POST['section'];
         $query = $this->db->query($sql);
         echo json_encode($query->result());
    }
    public function studentGradeList2(){
        $user = $this->session->userdata['user'];
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
                    (SELECT sg.*
                        FROM tbl_students_grade sg
                        LEFT JOIN 
                            tbl_teacher_student ts
                        ON ts.id = sg.teacher_student_id
                        LEFT JOIN
                            tbl_teacher_subjects tsub
                        ON tsub.id = sg.teacher_subjects_id
                        WHERE ts.teacher_id =  $user->user_id
                        AND tsub.subject_id = $subject
                        AND tsub.section_id = $section
                        AND tsub.grade = $grade
                        AND sg.`year` = $year
                    
                    ) g
                ON g.teacher_student_id = ts.id
                WHERE ts.teacher_id = $user->user_id
                AND c.confirm = 'yes'";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function studentGradeList22(){
        $user = $this->session->userdata['user'];
        $student = $_POST['student'];
        $year = $_POST['year'];
        $section = $_POST['section'];
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
                WHERE t.id = $user->user_id
                AND sec.id = $section
                ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function studentGradeList23(){
        $teacher = $_POST['teacher'];
        $student = $_POST['student'];
        $year = $_POST['year'];
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
                WHERE t.id = $teacher
                ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function studentGradeList3(){
        $user = $this->session->userdata['user'];
        $stud = $_REQUEST['id'];
        $year = $_REQUEST['year'];
        $sql = "SELECT *, s.id student_id FROM tbl_students s
                    LEFT JOIN 
                        tbl_teacher_student ts
                    ON 
                        ts.student_id = s.id
                    LEFT JOIN 
                        (SELECT sg.*, sub.subject_name,
                            (sg.period_1 + sg.period_2 + sg.period_3 + sg.period_4) / 4 average,
                            CASE
                                WHEN ((sg.period_1 + sg.period_2 + sg.period_3 + sg.period_4) / 4) >= 75 THEN 'Passed'
                                WHEN ((sg.period_1 + sg.period_2 + sg.period_3 + sg.period_4) / 4) < 75 THEN 'Failed'
                            ELSE ''
                            END remarks
                            FROM tbl_students_grade sg
                            LEFT JOIN 
                                tbl_teacher_student ts
                            ON ts.id = sg.teacher_student_id
                            LEFT JOIN
                                tbl_teacher_subjects tsub
                            ON tsub.id = sg.teacher_subjects_id
                            LEFT JOIN
                                tbl_subject sub
                            ON sub.id = tsub.subject_id
                        ) g
                    ON g.teacher_student_id = ts.id
                    WHERE ts.student_id = $stud
                    AND g.year = $year";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function studentGradeList4(){
        $user = $this->session->userdata['user'];
        $stud = $_REQUEST['id'];
        $year = $_REQUEST['year'];
        $sql = "SELECT 
                    grade.*, sub.subject_name,
                    (grade.period_1 + grade.period_2 + grade.period_3 + grade.period_4) / 4 average,
                    CASE
                        WHEN ((grade.period_1 + grade.period_2 + grade.period_3 + grade.period_4) / 4) >= 75 THEN 'Passed'
                        WHEN ((grade.period_1 + grade.period_2 + grade.period_3 + grade.period_4) / 4) < 75 THEN 'Failed'
                    ELSE ''
                    END remarks
                FROM tbl_subject sub
                LEFT JOIN (
                    SELECT 
                        *
                    FROM tbl_students_grade sg
                    WHERE sg.student_id = $stud
                    AND sg.year = $year
                ) grade
                ON grade.subject_id = sub.id
                INNER JOIN 
                    tbl_section sec
                ON sec.id = sub.section_id
                INNER JOIN
                    tbl_teacher t
                ON t.id = sec.teacher_id
                WHERE t.id = $user->user_id";
        $query = $this->db->query($sql);
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
        $user = $this->session->userdata['user'];
        $query = $this->db->get_where('tbl_section', array('grade' => $_POST['grade'], 'teacher_id' => $user->user_id));
        echo json_encode($query->result());
    }
	public function addGrade(){
        // data that will be inserted to tbl_students_grade
        $userData = $this->session->userdata['user'];
        foreach ($_POST['grade_1'] as $key => $each) {
            $query = $this->db->get_where('tbl_students_grade', array('subject_id' => $_POST['subject'][$key], 'student_id' =>  $_POST['student'], 'year' => $_POST['school_year']));
            $check = $query->result();
            if(empty($check)){
                $data = array(
                    'subject_id' => $_POST['subject'][$key],
                    'student_id' => $_POST['student'],
                    'year' => $_POST['school_year'],
                    'period_1' => $each,
                    'period_2' => $_POST['grade_2'][$key],
                    'period_3' => $_POST['grade_3'][$key],
                    'period_4' => $_POST['grade_4'][$key],
                    'created_by' => $userData->user_id,
                    'date_created' => date('Y-m-d H:i:s')
                );
                $this->db->insert('tbl_students_grade', $data); // insert into tbl_students_grade
                $studentgradeId = $this->db->insert_id(); 
                $data2 = array(
                    'students_grade_id' => $studentgradeId,
                    'period_1' => 'no',
                    'period_2' => 'no',
                    'period_3' => 'no',
                    'period_4' => 'no',
                    'created_by' => $userData->user_id,
                    'date_created' => date('Y-m-d H:i:s')
                );
                $this->db->insert('tbl_lock_grade', $data2); // insert into tbl_students_grade
            } else {
                $querylock = $this->db->get_where('tbl_lock_grade', array('students_grade_id' => $check[0]->id));
                $lock = $querylock->result();
                if($lock[0]->period_1 == 'no'){
                    $this->db->set('period_1', $each);
                }
                if($lock[0]->period_2 == 'no'){
                    $this->db->set('period_2', $_POST['grade_2'][$key]);
                }
                if($lock[0]->period_3 == 'no'){
                    $this->db->set('period_3', $_POST['grade_3'][$key]);
                }
                if($lock[0]->period_4 == 'no'){
                    $this->db->set('period_4', $_POST['grade_4'][$key]);
                }
                $this->db->set('modified_by', $userData->user_id);
                $this->db->set('date_modified', date('Y-m-d H:i:s'));
                $this->db->where('id', $check[0]->id);
                $this->db->update('tbl_students_grade');
            }
        } 
        
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
    public function lockGrades(){
        $userData = $this->session->userdata['user'];
        $querylock = $this->db->get_where('tbl_lock_grade', array('created_by' => $userData->user_id));
        $lock = $querylock->result();
        foreach($lock as $each){
            $this->db->set('period_1', isset($_POST['period_1']) ? 'yes' : 'no');
            $this->db->set('period_2', isset($_POST['period_2']) ? 'yes' : 'no');
            $this->db->set('period_3', isset($_POST['period_3']) ? 'yes' : 'no');
            $this->db->set('period_4', isset($_POST['period_4']) ? 'yes' : 'no');
            $this->db->set('modified_by', $userData->user_id);
            $this->db->set('date_modified', date('Y-m-d H:i:s'));
            $this->db->where('id', $lock[0]->id);
            $this->db->update('tbl_lock_grade');
        }
    }
    public function unlockGrades(){
        $userData = $this->session->userdata['user'];
        $querylock = $this->db->get_where('tbl_lock_grade', array('created_by' => $_REQUEST['id']));
        $lock = $querylock->result();
        foreach($lock as $each){
            $this->db->set('period_1', 'no');
            $this->db->set('period_2', 'no');
            $this->db->set('period_3', 'no');
            $this->db->set('period_4', 'no');
            $this->db->set('modified_by', $userData->user_id);
            $this->db->set('date_modified', date('Y-m-d H:i:s'));
            $this->db->where('id', $lock[0]->id);
            $this->db->update('tbl_lock_grade');
        }
    }
   /*  public function delete(){
        foreach($_POST['teacherId'] as $each){ // looping the ids for tbl_teacher
            $this->db->delete('tbl_teacher', array('id' => $each)); // delete from tbl_teacher
        }
        redirect(base_url().'teachers'); //redirect back to teacher page
    } */
    
}
