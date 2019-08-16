<h1 class="pt-5 pb-5 h2-subhead">Submit Your Assignment</h1>

<?php
foreach($this->submitStudentAssignment as $assignment) {
	$student_assignment_id = $_GET['student_assignment_id'];

	$query = "SELECT * FROM student_assignment WHERE student_assignment_id = $student_assignment_id ";
	$select_image = mysqli_query(ConnectToDb::con(), $query);
	while($row = mysqli_fetch_assoc($select_image)){
		$post_image = $row['student_assignment'];
		$student_assignment_date_submitted = $row['student_assignment_date_submitted'];
		if ($post_image != NULL) {
			echo '<section id="submitted_section">';
		} else {
			echo '<section id="pending_section">';
		}
?>
	
	<div class="container ">
        <div class="row mt-2 mb-2 ">
          <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">   
            <h1 class="course_header">Date Due: <?= $assignment['assignment_date_due']; ?></h1>
						<h1 class="credit_header">Credits | <?= $assignment['assignment_credits']?>  </h1>
						<?php
						if ($post_image != NULL) {
							?>
							<h1 class="assignment_header-submitted"><?= $assignment['assignment_name']; ?></h1>
							<?php
						} else {
							?>
							<h1 class="assignment_header"><?= $assignment['assignment_name']; ?></h1>
							<?php
						}
						?>
            
            <h3 class="description_header">Description</h3>
            <p class="course_description"><?= $assignment['assignment_description']; ?></p>
          </div>
        </div>
		<form action="index.php?controller=assignments&action=updateStudentAssignment&student_assignment_id=<?= $student_assignment_id; ?>" method="post" enctype="multipart/form-data">
			<div class="form-group mt-5">
				<?php
							if ($post_image != NULL) {
								echo '<h3 class="credit_header pb-5">Submitted on ' . $student_assignment_date_submitted  . '</h3>';
							}
							echo "<input type='file' name='student_assignment' required />";
					}

				?>
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

