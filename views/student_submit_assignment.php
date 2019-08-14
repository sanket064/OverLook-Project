<h1 class="pt-5 pb-5 h2-subhead">Submit Your Assignment</h1>

<?php
foreach($this->submitStudentAssignment as $assignment) {
	$student_assignment_id = $_GET['student_assignment_id'];
	?>
	<section id="pending_section">
	<div class="container ">
        <div class="row mt-2 mb-2 ">
          <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">   
            <h1 class="course_header">Date Due: <?= $assignment['assignment_date_due']; ?></h1>
            <h1 class="credit_header">Credits | <?= $assignment['assignment_credits']?>  </h1>
            <h1 class="assignment_header"><?= $assignment['assignment_name']; ?></h1>
            <h3 class="description_header">Description</h3>
            <p class="course_description"><?= $assignment['assignment_description']; ?></p>
          </div>
        </div>
		<form action="index.php?controller=assignments&action=updateStudentAssignment&student_assignment_id=<?= $student_assignment_id; ?>" method="post" enctype="multipart/form-data">
			<div class="form-group mt-5">
				<input type="file" name="student_assignment" />
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-light mt-5 mb-5" name="submit" value="Upload Assignment" />
		</div>
		</form>
      </div> 
     </section>
	
	<?php
}
?>

