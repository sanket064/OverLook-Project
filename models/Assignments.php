<?php
Class Assignments extends Model {

   // ALL STUDENT RELATED MODELS BELOW THIS LINE -------------------------------------------------------------------------------------
	public static function getAllStudentAssignments()
	{
		$sql = "SELECT * FROM assignments 
		LEFT JOIN student_assignment 
		ON assignments.assignment_id = student_assignment.student_assignment_assignment_id
		WHERE student_assignment.student_assignment_student_id =".$_SESSION['user_id'];

		$results = mysqli_query(ConnectToDb::con(), $sql);

		while($record = mysqli_fetch_assoc($results))
		{
			$arrAssignments[] = $record;
			//print_r($record);
		}
		return $arrAssignments;
    }
    
    public static function averageGrade() {
        $results = mysqli_query(ConnectToDb::con(), "SELECT AVG(assignment_marks) FROM assignments");

		$arrAverageGrade = mysqli_fetch_assoc($results);
		// print_r($arrAverageGrade);
		return $arrAverageGrade;
    }
	
	// ALL TEACHER RELATED MODELS BELOW THIS LINE -------------------------------------------------------------------------------------

    public static function getAllTeacherAssignments() {
	// Getting all assignments for a specific teacher
	$teacher_name = $_SESSION['first_name'];
	$sql = "SELECT
    users.user_first_name,
    users.user_last_name,
    assignments.assignment_name,
    student_assignment.student_assignment_marks,
    student_assignment.student_assignment_comments,
    student_assignment.student_assignment_date_submitted
	FROM
		users
	LEFT JOIN student_assignment ON users.user_id = student_assignment.student_assignment_student_id
	LEFT JOIN assignments ON assignments.assignment_id = student_assignment.student_assignment_assignment_id
	WHERE
		assignments.assignment_teacher_name = '$teacher_name'";
		
	$results = mysqli_query(ConnectToDb::con(), $sql);

	while($record = mysqli_fetch_assoc($results))
	{
		$arrAssignments[] = $record;
		//print_r($record);
	}
	return $arrAssignments;
        
	}
	public static function getNumberOfTeacherAssignments () {
	$teacher_name = $_SESSION['first_name'];
	$sql = "SELECT COUNT(1) FROM assignments WHERE assignment_teacher_name = '$teacher_name'";
	$results = mysqli_query(ConnectToDb::con(), $sql);
	// print_r($results);
	while($record = mysqli_fetch_assoc($results))
	{
		$arrTeacherNumberOfAssignments[] = $record;
		// print_r($record);
	}
	return $arrTeacherNumberOfAssignments;

	}

	public static function viewAllTeacherAssignments() {
		$teacher_name = $_SESSION['first_name'];
		$sql = "SELECT * FROM assignments WHERE assignment_teacher_name = '$teacher_name'";
		$results = mysqli_query(ConnectToDb::con(), $sql);
		while($record = mysqli_fetch_assoc($results))
		{
			$allTeacherAssignments[] = $record;
			// print_r($record);
		}
		return $allTeacherAssignments;
		// $sql_get_class_id = "SELECT * FROM classes WHERE classes_name = '$assignment_course'";
		// $assignment_class_id = mysqli_fetch_assoc($results);
		// $assignment_classes_id = $assignment_class_id['classes_id'];
	}

	public static function getAllTeacherCourses () {
		$teacher_name = $_SESSION['first_name'];
		$sql = "SELECT * FROM classes WHERE classes_teacher = '$teacher_name'";
		$results = mysqli_query(ConnectToDb::con(), $sql);
		while($record = mysqli_fetch_assoc($results))
		{
			$allTeacherCourses[] = $record;
			// print_r($record);
		}
		return $allTeacherCourses;
	}

	public static function createAssignment() {
        
		
		if(isset($_POST['submit'])){
			// print_r($_POST);
			// die;
			$assignment_name = $_POST['assignment_name'];
			$assignment_description = $_POST['assignment_description'];
			$assignment_teacher_name = $_POST['assignment_teacher_name'];
			$assignment_date_due = $_POST['assignment_date_due'];
			$assignment_credits = $_POST['assignment_credits'];
			$assignment_term = $_POST['assignment_term'];
			$assignment_course = $_POST['assignment_course'];
			$sql_get_class_id = "SELECT * FROM classes WHERE classes_name = '$assignment_course'";
			$results = mysqli_query(ConnectToDb::con(), $sql_get_class_id);
			$assignment_class_id = mysqli_fetch_assoc($results);
			$assignment_classes_id = $assignment_class_id['classes_id'];
		
			$sql = "INSERT INTO assignments (
				assignment_name, 
				assignment_description, 
				assignment_teacher_name, 
				assignment_date_due, 
				assignment_credits, 
				assignment_term, 
				assignment_class_id
				) VALUES (
					'$assignment_name',
					'$assignment_description',
					'$assignment_teacher_name',
					'$assignment_date_due',
					$assignment_credits,
					$assignment_term,
					$assignment_classes_id
				)";
			$result = mysqli_query(ConnectToDb::con(), $sql);

			header("Location: index.php?controller=pages&action=viewAllTeacherAssignments&success=true");
            
        }

    }
} 


?>