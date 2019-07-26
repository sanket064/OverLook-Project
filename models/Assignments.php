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
	// $sql = "SELECT *
	// FROM assignments 
	// LEFT JOIN teacher_assignment 
	// ON assignments.assignment_id = teacher_assignment.teacher_assignment_assignment_id
	// WHERE assignments.assignment_teacher_name = '$teacher_name'";
	$sql = "SELECT * FROM users 
	LEFT JOIN student_assignment 
	ON users.user_id = student_assignment.student_assignment_student_id
	WHERE student_assignment.student_assignment_teacher = '$teacher_name'";
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