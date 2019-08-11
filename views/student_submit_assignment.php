<div class="container pt-5">
<?php
foreach($this->submitStudentAssignment as $assignment) {
	$student_assignment_id = $_GET['student_assignment_id'];
	?>
	<h1>Assignment Name: <?= $assignment['assignment_name']; ?></h1>
	<h1>Instructor: <?= $assignment['assignment_teacher_name']; ?></h1>
	<h1>Date Due: <?= $assignment['assignment_date_due']; ?></h1>
	<p>Description: <?= $assignment['assignment_description']; ?></p>
	<form action="index.php?controller=assignments&action=updateStudentAssignment&student_assignment_id=<?= $student_assignment_id; ?>" method="post" enctype="multipart/form-data">
	<h1 class="pt-5 pb-5">Submit Your Assignment</h1>
		<div class="form-group">
			<label for="title">Upload File</label>
			<input type="file" name="student_assignment" />
		</div>
		<div class="form-group">
			<input type="submit" class="btn btn-primary" name="submit" value="Upload Assignment" />
    </div>
	</form>
	<?php
}
?>

</div>