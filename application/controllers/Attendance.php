<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance extends CI_Controller {

	public function index()
	{	
        $from = isset($_REQUEST['from']) ? $_REQUEST['from'] : '';
        $to = isset($_REQUEST['to']) ? $_REQUEST['to'] : '';
        $data['attendance'] = $this->getAttendance($from,$to);
        // load page
        $this->load->view('templates/header');
        $this->load->view('attendance/index', $data);
        $this->load->view('templates/footer');		
    }
	public function teacher()
	{	
        $from = isset($_REQUEST['from']) ? $_REQUEST['from'] : '';
        $to = isset($_REQUEST['to']) ? $_REQUEST['to'] : '';
        $data['attendance'] = $this->getAttendanceTeacher($from,$to);
        // load page
        $this->load->view('templates/header');
        $this->load->view('attendance/teacher', $data);
        $this->load->view('templates/footer');		
    }
	public function viewGrade()
	{	
        $data['grade'] = $this->grades_model->studentGradeList4();
        $this->load->view('advisory/ajax/view', $data);
    }
	public function exportGrade()
	{	
        $data['grade'] = $this->grades_model->studentGradeList4();
        $this->load->view('advisory/ajax/export', $data);
    }
    public function studentsPerTeacher($id){
        $sql = "SELECT 
                    stud.*
                FROM tbl_students stud
                INNER JOIN 
                    tbl_section sec
                ON sec.id = stud.section_id
                INNER JOIN
                    tbl_teacher t
                ON t.id = sec.teacher_id
                WHERE t.id = $id";
         $query = $this->db->query($sql);
         return $query->result();
    }
    public function getAttendance($from = '', $to = ''){
        $user = $this->session->userdata['user'];
        if($user->user_type == 'student'){
            $student = "student_id = ".$user->user_id;
        } else if($user->user_type == 'parent'){
            $get = $this->db->get_where('tbl_student_guardian', array('guardian_id' => $user->user_id));
            $result = $get->result();
            $student = "student_id = ".$result[0]->student_id;
        } else if($user->user_type == 'teacher'){
            $result = $this->studentsPerTeacher($user->user_id);
            $arr = array();
            foreach($result as $each){
                $arr[] = $each->id;
            }
            $student = "student_id IN (".implode(',', $arr).")";
        } else if($user->user_type == 'admin'){
            $student = "student_id LIKE '%%'";
        }
        $sql = "SELECT
                    stud.id student_id,
                    CONCAT(stud.last_name,', ',stud.first_name,' ',stud.middle_name) name,
                    dateTrans.date date,
                    TIME(timeinam.time) time_in_am,
                    TIME(timeinpm.time) time_in_pm,
                    TIME(timeoutam.time) time_out_am,
                    TIME(timeoutpm.time) time_out_pm
                FROM
                    tbl_students stud
                INNER JOIN(
                    SELECT
                        student_id,
                        attendance_date date
                    FROM
                        tbl_attendance
                    WHERE
                        $student
                    AND
                        attendance_date >= '$from' && attendance_date <= '$to'
                    GROUP BY
                        attendance_date
                ) dateTrans
                ON dateTrans.student_id = stud.id 
                LEFT JOIN
                (
                    SELECT
                        *
                    FROM
                        tbl_attendance
                    WHERE
                        type = 'in'
                    AND 
                        meridiem = 'am'
                ) timeinam
                ON dateTrans.date = timeinam.attendance_date AND timeinam.student_id = dateTrans.student_id
                LEFT JOIN
                (
                    SELECT
                        *
                    FROM
                        tbl_attendance
                    WHERE
                        type = 'in'
                    AND 
                        meridiem = 'pm'
                ) timeinpm
                ON dateTrans.date = timeinpm.attendance_date AND timeinpm.student_id = dateTrans.student_id
                LEFT JOIN
                (
                    SELECT
                        *
                    FROM
                        tbl_attendance
                    WHERE
                        type = 'out'
                    AND 
                        meridiem = 'am'
                ) timeoutam
                ON dateTrans.date = timeoutam.attendance_date AND timeoutam.student_id = dateTrans.student_id
                LEFT JOIN
                (
                    SELECT
                        *
                    FROM
                        tbl_attendance
                    WHERE
                        type = 'out'
                    AND 
                        meridiem = 'pm'
                ) timeoutpm
                ON dateTrans.date = timeoutpm.attendance_date AND timeoutpm.student_id = dateTrans.student_id";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function getAttendanceTeacher($from = '', $to = ''){
       
        $teacher = "teacher_id LIKE '%%'";
        $sql = "SELECT
                    t.id teacher_id,
                    CONCAT(t.last_name,', ',t.first_name,' ',t.middle_name) name,
                    dateTrans.date date,
                    TIME(timeinam.time) time_in_am,
                    TIME(timeinpm.time) time_in_pm,
                    TIME(timeoutam.time) time_out_am,
                    TIME(timeoutpm.time) time_out_pm
                FROM
                    tbl_teacher t
                INNER JOIN(
                    SELECT
                        teacher_id,
                        attendance_date date
                    FROM
                        tbl_attendance_teacher
                    WHERE
                        $teacher
                    AND
                        attendance_date >= '$from' && attendance_date <= '$to'
                    GROUP BY
                        attendance_date
                ) dateTrans
                ON dateTrans.teacher_id = t.id 
                LEFT JOIN
                (
                    SELECT
                        *
                    FROM
                        tbl_attendance_teacher
                    WHERE
                        type = 'in'
                    AND 
                        meridiem = 'am'
                ) timeinam
                ON dateTrans.date = timeinam.attendance_date AND timeinam.teacher_id = dateTrans.teacher_id
                LEFT JOIN
                (
                    SELECT
                        *
                    FROM
                        tbl_attendance_teacher
                    WHERE
                        type = 'in'
                    AND 
                        meridiem = 'pm'
                ) timeinpm
                ON dateTrans.date = timeinpm.attendance_date AND timeinpm.teacher_id = dateTrans.teacher_id
                LEFT JOIN
                (
                    SELECT
                        *
                    FROM
                        tbl_attendance_teacher
                    WHERE
                        type = 'out'
                    AND 
                        meridiem = 'am'
                ) timeoutam
                ON dateTrans.date = timeoutam.attendance_date AND timeoutam.teacher_id = dateTrans.teacher_id
                LEFT JOIN
                (
                    SELECT
                        *
                    FROM
                        tbl_attendance_teacher
                    WHERE
                        type = 'out'
                    AND 
                        meridiem = 'pm'
                ) timeoutpm
                ON dateTrans.date = timeoutpm.attendance_date AND timeoutpm.teacher_id = dateTrans.teacher_id";
        $query = $this->db->query($sql);
        return $query->result();
    }
}