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

	// ALL TEACHER RELATED MODELS BELOW THIS LINE -------------------------------------------------------------------------------------

    public static function getAllTeacherAssignments() {
	// Getting all assignments for a specific teacher
	$teacher_name = $_SESSION['first_name'];
	// $sql = "SELECT *
	// FROM assignments 
	// LEFT JOIN teacher_assignment 
	// ON assignments.assignment_id = teacher_assignment.teacher_assignment_assignment_id
	// WHERE assignments.assignment_teacher_name = '$teacher_name'";
	// echo $sql = "SELECT * FROM users 
	// LEFT JOIN student_assignment 
	// ON users.user_id = student_assignment.student_assignment_student_id
	// WHERE student_assignment.student_assignment_teacher = '$teacher_name'";
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
} 


?>