<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grades extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	// public function index()
	// {	
	// 	$this->load->view('templates/header');
	// 	$this->load->view('grades/grades');
	// 	$this->load->view('templates/footer');
	// }
	public function index($sub = 'grades', $id = 0)
	{	
		// default prefix is empty if not '-teacher' is concatenated
		$prefix = $sub == 'grades' ? '' : '-grade';

		//if the file do not exist show 404 error page
		if(!file_exists(APPPATH.'views/grades/'.$sub.$prefix.'.php')){
			// if method/function exist load function
			if(method_exists($this, $sub)){
				$this->{$sub}();
				exit;
			} else { // else show 404 error
				show_404();
			}
		}

		//set validation rules
		// $this->form_validation->set_rules('grading', 'Grading', 'required');
		$this->form_validation->set_rules('school_year', 'Year', 'required');
		$this->form_validation->set_rules('student', 'Student', 'required');
		// $this->form_validation->set_rules('grade_[]', 'Grade', 'required');
		// $this->form_validation->set_rules('grade[]', 'Grade', 'required');
		// $this->form_validation->set_rules('grade[]', 'Grade', 'required');
		// $this->form_validation->set_rules('grade[]', 'Grade', 'required');
		
		//if validation is success
        if($this->form_validation->run() == TRUE){
			if($sub == 'add'){ //if add page, load model addGrade()
				//load grades_model -> addGrade() function
				$this->grades_model->addGrade();
			}
		} else { //if validation failed, page will load again
			// get data
			$data['students'] = $this->grades_model->studentPerTeacher2();
			$data['section'] = $this->grades_model->sectionList();
			$data['sy'] = $this->grades_model->getSchoolYear();
			// load page
			$this->load->view('templates/header');
			$this->load->view('grades/'.$sub.$prefix, $data);
			$this->load->view('templates/footer');
		}
		
    }
    public function getSections(){
        $this->grades_model->getSections();
	}	
    public function returnStudentListPerSec(){
        $this->grades_model->returnStudentListPerSec();
	}	
    public function lockGrades(){
        $this->grades_model->lockGrades();
	}
    public function unlockGrades(){
        $this->grades_model->unlockGrades();
	}
	public function returnStudentGrades(){
		// $data = $this->grades_model->studentGradeList2();
		$data = $this->grades_model->studentGradeList22();
		// $this->load->view('grades/ajax/return', $data);
		$period_1_total = 0;
		$period_2_total = 0;
		$period_3_total = 0;
		$period_4_total = 0;
		echo '<table class="table table-hovered table-striped datatables" id="tableGrade">';
		echo	'<thead>';
			echo	'<tr>';
				echo	'<th>Subject</th>';
				echo	'<th>1st</th>';
				echo	'<th>2nd</th>';
				echo	'<th>3rd</th>';
				echo	'<th>4th</th>';
				echo	'<th>Average</th>';
			echo	'</tr>';
		echo	'</thead>';
		echo	'<tbody>';
		foreach($data as $each){
        echo '<tr>';
			echo '<td style="width:40%">'.$each->subject_name.'<input name="subject[]" required type="hidden" value="'.$each->sub_id.'"></td>';
			echo '<td style="width:10%"><input name="grade_1[]" class="gradeBox" type="text" value="'.$each->period_1.'"></td>';
			echo '<td style="width:10%"><input name="grade_2[]" class="gradeBox"  type="text" value="'.$each->period_2.'"></td>';
			echo '<td style="width:10%"><input name="grade_3[]" class="gradeBox"  type="text" value="'.$each->period_3.'"></td>';
			echo '<td style="width:10%"><input name="grade_4[]" class="gradeBox" type="text" value="'.$each->period_4.'"></td>';
			echo '<td style="width:10%"><span class="gradeAverage">'.(($each->period_1+$each->period_2+$each->period_3+$each->period_4) / 4).'</span></td>';
		echo '</tr>';
		$period_1_total += $each->period_1;
		$period_2_total += $each->period_2;
		$period_3_total += $each->period_3;
		$period_4_total += $each->period_4;
	} 
		echo '<tr>';
			echo '<td style="width:40%"><strong>Period Average: </strong></td>';
			echo '<td style="width:10%">'.$period_1_total / count($data).'</td>';
			echo '<td style="width:10%">'.$period_2_total / count($data).'</td>';
			echo '<td style="width:10%">'.$period_3_total / count($data).'</td>';
			echo '<td style="width:10%">'.$period_4_total / count($data).'</td>';
			echo '<td style="width:10%"></td>';
		echo '</tr>';
		echo	'</tbody>';
		echo	'</table>';
		echo	'<script>';
		echo	'';
		echo		'$("#tableGrade").on("blur", ".gradeBox", function(){
							var grades = $(".gradeBox");
							var total = 0;
							grades.each(function(){
								var value = parseInt($(this).val());
								total += value;
							})
							var average = total / 4;
							$(".gradeAverage").text(average);
					})';
		echo    '';
		echo	'</script>';
	}
	public function returnStudentGrades2(){
		// $data = $this->grades_model->studentGradeList2();
		$data = $this->grades_model->studentGradeList23();
		// $this->load->view('grades/ajax/return', $data);
		echo '<table class="table table-hovered table-striped datatables">';
		echo	'<thead>';
			echo	'<tr>';
				echo	'<th>Subject</th>';
				echo	'<th>1st</th>';
				echo	'<th>2nd</th>';
				echo	'<th>3rd</th>';
				echo	'<th>4th</th>';
			echo	'</tr>';
		echo	'</thead>';
		echo	'<tbody>';
		foreach($data as $each){
        echo '<tr>';
			echo '<td style="width:40%">'.$each->subject_name.'</td>';
			echo '<td style="width:10%">'.$each->period_1.'</td>';
			echo '<td style="width:10%">'.$each->period_2.'</td>';
			echo '<td style="width:10%">'.$each->period_3.'</td>';
			echo '<td style="width:10%">'.$each->period_4.'</td>';
		echo '</tr>';
        } 
		echo	'</tbody>';
		echo	'</table>';
	}
}
