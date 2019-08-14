<?php
Class Assignments extends Model {

   // ALL STUDENT RELATED MODELS BELOW THIS LINE -------------------------------------------------------------------------------------
	public static function getAllStudentAssignments()
	{
		$student_id = $_SESSION['user_id'];
		$sql = "SELECT 
		users.user_first_name, 
		users.user_last_name, 
		assignments.assignment_id, 
		assignments.assignment_name, 
		assignments.assignment_description,
		assignments.assignment_teacher_name, 
		assignments.assignment_class_id, 
		assignments.assignment_term, 
		assignments.assignment_credits, 
		assignments.assignment_date_due, 
		classes.classes_id, 
		classes.classes_name, 
		student_assignment.student_assignment_id, 
		student_assignment.student_assignment_marks, 
		student_assignment.student_assignment_comments, 
		student_assignment.student_assignment_date_submitted FROM users 
		LEFT JOIN student_assignment ON users.user_id = student_assignment.student_assignment_student_id LEFT JOIN assignments ON assignments.assignment_id = student_assignment.student_assignment_assignment_id LEFT JOIN classes ON assignments.assignment_class_id = classes.classes_id 
		WHERE student_assignment.student_assignment_student_id = $student_id";
		
		
		$results = mysqli_query(ConnectToDb::con(), $sql);

		while($record = mysqli_fetch_assoc($results))
		{
			$arrAssignments[] = $record;
			//print_r($record);
		}
		return $arrAssignments;
	}
	public static function getAllPendingStudentAssignments()
	{
		$student_id = $_SESSION['user_id'];
		$sql = "SELECT 
		users.user_first_name, 
		users.user_last_name, 
		assignments.assignment_id, 
		assignments.assignment_name, 
		assignments.assignment_description,
		assignments.assignment_teacher_name, 
		assignments.assignment_class_id, 
		assignments.assignment_term, 
		assignments.assignment_credits, 
		assignments.assignment_date_due, 
		classes.classes_id, 
		classes.classes_name, 
		student_assignment.student_assignment_id, 
		student_assignment.student_assignment_marks, 
		student_assignment.student_assignment_comments, 
		student_assignment.student_assignment_date_submitted FROM users 
		LEFT JOIN student_assignment ON users.user_id = student_assignment.student_assignment_student_id LEFT JOIN assignments ON assignments.assignment_id = student_assignment.student_assignment_assignment_id LEFT JOIN classes ON assignments.assignment_class_id = classes.classes_id 
		WHERE student_assignment.student_assignment_student_id = $student_id AND student_assignment.student_assignment_date_submitted IS NULL";
		
		
		$results = mysqli_query(ConnectToDb::con(), $sql);

		while($record = mysqli_fetch_assoc($results))
		{
			$arrAssignments[] = $record;
			//print_r($record);
		}
		return $arrAssignments;
	}

	public static function getAllSubmittedStudentAssignments()
	{
		$student_id = $_SESSION['user_id'];
		$sql = "SELECT 
		users.user_first_name, 
		users.user_last_name, 
		assignments.assignment_id, 
		assignments.assignment_name, 
		assignments.assignment_description,
		assignments.assignment_teacher_name, 
		assignments.assignment_class_id, 
		assignments.assignment_term, 
		assignments.assignment_credits, 
		assignments.assignment_date_due, 
		classes.classes_id, 
		classes.classes_name, 
		student_assignment.student_assignment_id, 
		student_assignment.student_assignment_marks, 
		student_assignment.student_assignment_comments, 
		student_assignment.student_assignment_date_submitted FROM users 
		LEFT JOIN student_assignment ON users.user_id = student_assignment.student_assignment_student_id LEFT JOIN assignments ON assignments.assignment_id = student_assignment.student_assignment_assignment_id LEFT JOIN classes ON assignments.assignment_class_id = classes.classes_id 
		WHERE student_assignment.student_assignment_student_id = $student_id AND student_assignment.student_assignment_date_submitted IS NOT NULL";
		
		
		$results = mysqli_query(ConnectToDb::con(), $sql);

		while($record = mysqli_fetch_assoc($results))
		{
			$arrAssignments[] = $record;
			//print_r($record);
		}
		return $arrAssignments;
	}
	public static function getAllStudents () {
		$sql = "SELECT * FROM users WHERE user_role = 'Student'";
		$results = mysqli_query(ConnectToDb::con(), $sql);

		while($record = mysqli_fetch_assoc($results))
		{
			$arrStudents[] = $record;
			// print_r($record);
		}
		return $arrStudents;
	}
	public static function countSubmittedAssignments() {
	$user_id = $_SESSION['user_id'];
	$number_of_submitted_students = "SELECT COUNT(1) FROM `student_assignment` WHERE  student_assignment_date_submitted IS NOT NULL AND student_assignment_student_id = $user_id";
	$submitted_student_assignment_count = mysqli_query(ConnectToDb::con(), $number_of_submitted_students);
	$assignment_submitted_count = mysqli_fetch_assoc($submitted_student_assignment_count);
	return $assignment_submitted_count;
	}
	public static function countPendingAssignments() {
	$user_id = $_SESSION['user_id'];

	$number_of_not_submitted_students = "SELECT COUNT(1) FROM `student_assignment` WHERE student_assignment_date_submitted IS NULL AND student_assignment_student_id = $user_id";
	$not_submitted_student_assignment_count = mysqli_query(ConnectToDb::con(), $number_of_not_submitted_students);
	$assignment_not_submitted_count = mysqli_fetch_assoc($not_submitted_student_assignment_count);
	return $assignment_not_submitted_count;
	
	}
	public static function submitStudentAssignment(){
		$assignment_id = $_GET['assignment_id'];
		$sql = "SELECT * FROM assignments WHERE assignment_id = $assignment_id";
		$results = mysqli_query(ConnectToDb::con(), $sql);

		while($record = mysqli_fetch_assoc($results))
		{
			$submitAssignment[] = $record;
			// print_r($record);
		}
		return $submitAssignment;
	}
	public static function updateStudentAssignment() {
		$student_assignment_id = $_GET['student_assignment_id'];
		$date_submitted = gmDate('Y-m-d');
		if(isset($_POST['submit'])){

			$assignment_submission = $_FILES['student_assignment']['name'];
			$assignment_submission_temp = $_FILES['student_assignment']['tmp_name'];
			move_uploaded_file($assignment_submission_temp, "assets/$assignment_submission");
			if(empty($assignment_submission)){
                $query = "SELECT * FROM student_assignment WHERE student_assignment_id = $student_assignment_id ";
                $select_image = mysqli_query(ConnectToDb::con(), $query);
                while($row = mysqli_fetch_assoc($select_image)){
                    $post_image = $row['student_assignment'];
                }
			}
			$query = "UPDATE student_assignment SET ";
			$query .="student_assignment = '{$assignment_submission}', ";
			$query .="student_assignment_date_submitted = '{$date_submitted}' ";
			$query .= "WHERE student_assignment_id = $student_assignment_id ";
			mysqli_real_escape_string(ConnectToDb::con(), $query);
			$update_assignment = mysqli_query(ConnectToDb::con(),$query);

			
		}
		header("Location: index.php?controller=pages&action=dashboard&submission=true");
		// If the image field is empty then we check the
		
	}
    
    public static function averageGrade() {
		$user_id = $_SESSION['user_id'];
        $results = mysqli_query(ConnectToDb::con(), "SELECT AVG(student_assignment_marks) FROM student_assignment WHERE student_assignment_student_id = $user_id");
		$arrAverageGrade = mysqli_fetch_assoc($results);
		
		
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
	student_assignment.student_assignment_id,
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
	public static function getNumberOfTeacherClasses () {
		$teacher_name = $_SESSION['first_name'];
		$sql = "SELECT COUNT(1) FROM classes WHERE classes_teacher = '$teacher_name'";
		$results = mysqli_query(ConnectToDb::con(), $sql);
		// print_r($results);
		while($record = mysqli_fetch_assoc($results))
		{
			$arrTeacherNumberOfClasses[] = $record;
			// print_r($record);
		}
		return $arrTeacherNumberOfClasses;
	
		}

	public static function viewAllTeacherAssignments() {
		$teacher_name = $_SESSION['first_name'];
		$sql = "SELECT * FROM assignments WHERE assignment_teacher_name = '$teacher_name'";
		$results = mysqli_query(ConnectToDb::con(), $sql);
		while($record = mysqli_fetch_assoc($results))
		{
			$allTeacherAssignments[] = $record;
		}
		return $allTeacherAssignments;
	}
	
	public static function getAllTeacherCourses () {
		$teacher_name = $_SESSION['first_name'];
		$sql = "SELECT * FROM classes WHERE classes_teacher = '$teacher_name'";
		$results = mysqli_query(ConnectToDb::con(), $sql);
		while($record = mysqli_fetch_assoc($results))
		{
			$allTeacherCourses[] = $record;
		}
		return $allTeacherCourses;
	}
	public static function getSingleTeacherCourse () {
		$class_id = $_GET['class_id'];
		$teacher_name = $_SESSION['first_name'];
		$sql = "SELECT * FROM classes WHERE classes_teacher = '$teacher_name' AND classes_id = ";
		$results = mysqli_query(ConnectToDb::con(), $sql);
		while($record = mysqli_fetch_assoc($results))
		{
			$allTeacherCourses[] = $record;
		}
		return $allTeacherCourses;
	}
	public static function getCurrentTeacherCourse () {
		$edit_assignment_id = $_GET['assignment_class_id'];
		 $sql = "SELECT * FROM classes WHERE classes_id = '$edit_assignment_id'";
		$results = mysqli_query(ConnectToDb::con(), $sql);
		while($record = mysqli_fetch_assoc($results))
		{
			$currentTeacherCourses[] = $record;
		}
		return $currentTeacherCourses;
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
			$sql_get_assignment_id = "SELECT * FROM assignments WHERE assignment_name = '$assignment_name'";
			$results = mysqli_query(ConnectToDb::con(), $sql_get_assignment_id);
			$get_assignment_id = mysqli_fetch_assoc($results);
			$assignment_id = $get_assignment_id['assignment_id'];
		
			$sql_get_all_students = "SELECT * FROM users WHERE user_role = 'Student'";
			$results = mysqli_query(ConnectToDb::con(), $sql_get_all_students);

			while($record = mysqli_fetch_assoc($results))
			{
				$student_id = $record['user_id'];
				$sql_student_assignment = "INSERT INTO student_assignment (
					student_assignment_student_id,
					student_assignment_assignment_id) VALUES ($student_id, $assignment_id )";
				$studentresults = mysqli_query(ConnectToDb::con(), $sql_student_assignment);	
				
			}
			
			
			
			header("Location: index.php?controller=pages&action=viewAllTeacherAssignments&success=true");
            
        }

	}
	public static function editAssignment() {
		$edit_assignment_id = $_GET['assignment_id'];

		$sql = "SELECT * FROM assignments WHERE assignment_id = $edit_assignment_id";
		$result = mysqli_query(ConnectToDb::con(), $sql);
		// $edit_assignment = mysqli_fetch_assoc($result);
		while($record = mysqli_fetch_assoc($result))
		{
			$edit_assignment[] = $record;
			
		}
		return $edit_assignment;

	}
	public static function updateAssignment() {
		if(isset($_POST['submit'])){
			$edit_assignment_id = $_GET['assignment_id'];
			$assignment_name = $_POST['assignment_name'];
			$assignment_description = $_POST['assignment_description'];
			$assignment_teacher_name = $_POST['assignment_teacher_name'];
			$assignment_date_due = $_POST['assignment_date_due'];
			$assignment_credits = $_POST['assignment_credits'];
			$assignment_term = $_POST['assignment_term'];
			$assignment_class_name = $_POST['assignment_class_name'];
			$sql_get_class_id = "SELECT * FROM classes WHERE classes_name = '$assignment_class_name'";
			$results = mysqli_query(ConnectToDb::con(), $sql_get_class_id);
			$assignment_class_id = mysqli_fetch_assoc($results);
			$assignment_classes_id = $assignment_class_id['classes_id'];
		
			echo $sql = "UPDATE assignments 
				SET
				assignment_name = '$assignment_name', 
				assignment_description = '$assignment_description', 
				assignment_teacher_name = '$assignment_teacher_name', 
				assignment_date_due = '$assignment_date_due', 
				assignment_credits = $assignment_credits,
				assignment_term = $assignment_term,
				assignment_class_id = $assignment_classes_id WHERE assignment_id = $edit_assignment_id";
				
			$result = mysqli_query(ConnectToDb::con(), $sql);


			header("Location: index.php?controller=pages&action=viewAllTeacherAssignments&editsuccess=true");
            
        }
	}
	public static function deleteAssignment() {
		$edit_assignment_id = $_GET['assignment_id'];

		$sql = "DELETE FROM assignments WHERE assignment_id = $edit_assignment_id";
		$result = mysqli_query(ConnectToDb::con(), $sql);
		header("Location: index.php?controller=pages&action=viewAllTeacherAssignments&delete=true");
	}
	public static function gradeAssignment() {
		$student_assignment_id = $_GET['student_assignment_id'];
		$sql = "SELECT
		users.user_first_name,
		users.user_last_name,
		assignments.assignment_name,
		student_assignment.student_assignment_id,
		student_assignment.student_assignment,
		student_assignment.student_assignment_marks,
		student_assignment.student_assignment_comments,
		student_assignment.student_assignment_date_submitted
		FROM
			users
		LEFT JOIN student_assignment ON users.user_id = student_assignment.student_assignment_student_id
		LEFT JOIN assignments ON assignments.assignment_id = student_assignment.student_assignment_assignment_id
		WHERE
		student_assignment.student_assignment_id = $student_assignment_id";
		$result = mysqli_query(ConnectToDb::con(), $sql);
		// $edit_assignment = mysqli_fetch_assoc($result);
		while($record = mysqli_fetch_assoc($result))
		{
			$gradeAssignment[] = $record;
			
		}
		return $gradeAssignment;
	}
	public static function createGrade() {
		if(isset($_POST['submit'])){
	
			$student_assignment_id = $_GET['student_assignment_id'];
			$student_assignment_marks = $_POST['student_assignment_marks'];
			$student_assignment_comments = $_POST['student_assignment_comments'];

			$sql = "UPDATE student_assignment SET  student_assignment_marks = $student_assignment_marks,
			student_assignment_comments = '$student_assignment_comments'
			WHERE student_assignment_id = $student_assignment_id";
		
			$result = mysqli_query(ConnectToDb::con(), $sql);
			header("Location: index.php?controller=pages&action=gradeStudentAssignment&student_assignment_id=$student_assignment_id&editsuccess=true");
			
		}
	}
} 


?>