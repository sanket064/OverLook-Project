<div class="container">
    <h2 class="my-5 pl-3">Assignments</h2>
    <div class="row">
        <?php 
        // $total_marks = ($this->arrAverageGrade);
        // print_r("total marks are: " . $total_marks);
		foreach($this->arrAssignments as $assignment)
		{
            print_r($assignment);
            ?>

        <div class="col">
          <h1>Student Name: <?php echo $assignment['user_first_name'];  ?></h1>

           <?php 
           // IF STUDENT HAS SUBMITTED ASSIGNMENT, SHOW WHEN
           if($assignment['student_assignment_date_submitted'])
           {
            ?>
            <h1>Submitted on <?= $assignment['student_assignment_date_submitted']; ?> </h1>
            <?php } 
            // IF STUDENT HAS NOT SUBMITTED, SHOW ALERT
            else if($assignment['student_assignment_date_submitted'] == NULL)  {
                   ?>
                   <h1 class="alert-danger">Not submitted</h1>
                <?php
               }  ?>

          <h1>Marks: <?php echo $assignment['student_assignment_marks'];  ?></h1>
              
        </div>
        <?php
		}
		?>
    </div>
</div>