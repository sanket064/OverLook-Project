<?php

Class Pages extends Controller {

	public function __construct()
	{}

	public function main()
	{
		

			$this->nav = $this->loadView("header");
		
			$this->mainbody .= $this->loadView("userLogin");	
			// $this->mainbody .= $this->loadView("userRegistration");
			include("views/template.php");
		
		
	}


	public function dashboard()
	{
		if(isset($_SESSION['user_name']) &&  isset($_SESSION['first_name']) && isset($_SESSION['last_name'])) 
		{

			$this->nav = $this->loadView("header");
			if ($_SESSION['user_role'] != 'Teacher'){
				$this->arrAssignments = Assignments::getAllStudentAssignments();
				$this->PendingAssignmentCount = Assignments::countPendingAssignments();
				$this->SubmittedAssignmentCount = Assignments::countSubmittedAssignments();
				$this->AverageGrade = Assignments::averageGrade();
				$this->mainbody .= $this->loadView("home");
				$this->mainbody .= $this->loadView("student_assignment_list");
			} else {
				// View all Assignments (based on teacher_class/course)
				$this->getAllTeacherAssignments = Assignments::viewAllTeacherAssignments();
				$this->arrTeacherNumberOfAssignments = Assignments::getNumberOfTeacherAssignments();
				$this->arrTeacherNumberOfClasses = Assignments::getNumberOfTeacherClasses();
				
				$this->mainbody .= $this->loadView("teacher_header");
				$this->arrAssignments = Assignments::getAllTeacherAssignments();
				$this->mainbody .= $this->loadView("teacher_student_assignment_list");
			}
			include("views/template.php");
		} else {
			header("Location: index.php?error=true");
		}
	}
	
	public function ViewAllAssignments(){
		$this->nav = $this->loadView("header");
		$this->arrAssignments = Assignments::getAllStudentAssignments();
		$this->mainbody .= $this->loadView("student_assignment_list");
		include("views/template.php");
	}
	public function viewPendingAssignment() {
		$this->nav = $this->loadView("header");
		$this->arrAssignments = Assignments::getAllPendingStudentAssignments();
		$this->mainbody .= $this->loadView("pending");

		include("views/template.php");
	}
	public function viewSubmittedAssignment() {
		$this->nav = $this->loadView("header");
		$this->arrAssignments = Assignments::getAllSubmittedStudentAssignments();
		$this->mainbody .= $this->loadView("student_submitted");

		include("views/template.php");
	}
	public function viewAllTeacherCourses() {
		$this->nav = $this->loadView("header");
		$this->arrCourses = Assignments::getAllTeacherCourses();
		$this->mainbody .= $this->loadView("teacher_view_courses");

		include("views/template.php");
	}
	public function editTeacherCourses() {
		$this->nav = $this->loadView("header");
		$this->arrCourses = Assignments::getAllTeacherCourses();
		$this->mainbody .= $this->loadView("teacher_edit_class");

		include("views/template.php");
	}

	public function createAssignment() {
		$this->nav = $this->loadView("header");
		$this->getAllStudents = Assignments::getAllStudents();
		$this->getAllTeacherCourses = Assignments::getAllTeacherCourses();
		$this->mainbody .= $this->loadView("teacher_create_assignment");
		include("views/template.php");
	}
	public function editAssignment() {
		$this->nav = $this->loadView("header");
		$this->getAllTeacherCourses = Assignments::getAllTeacherCourses();
		$this->getCurrentTeacherCourse = Assignments::getCurrentTeacherCourse();

		$this->editAssignment = Assignments::editAssignment();
		$this->mainbody .= $this->loadView("teacher_edit_assignment");
		include("views/template.php");
	}
	public function viewAllTeacherAssignments() {
		$this->nav = $this->loadView("header");
		$this->getAllTeacherAssignments = Assignments::viewAllTeacherAssignments();
		$this->mainbody .= $this->loadView("teacher_view_assignment");
		include("views/template.php");
	}
	public function gradeStudentAssignment() {
		$this->nav = $this->loadView("header");
		$this->getStudentAssignment = Assignments::gradeAssignment();
		$this->mainbody .= $this->loadView("teacher_grade_assignment");
		// $this->deleteAssignments = Assignments::deleteAssignment();
		include("views/template.php");
	}
	public function studentSubmitAssignment() {
		$this->nav = $this->loadView("header");
		$this->submitStudentAssignment = Assignments::submitStudentAssignment();
		$this->mainbody .= $this->loadView("student_submit_assignment");

		include("views/template.php");
	}

	public function registerUser() {
		
		$this->nav = $this->loadView("header");
		$this->mainbody .= $this->loadView("register");	
		include("views/template.php");
	}

	public function search() {

		$this->mainbody .= $this->loadView("search");
	}



}

?>