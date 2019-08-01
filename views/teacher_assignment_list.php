<div class="container">
    <h2 class="my-5 pl-3">Assignments</h2>
    <div class="row">
        <?php 
		foreach($this->arrAssignments as $assignment)
		{
            // print_r($assignment);
            ?>
        <div class="col">
            <h1>Assignment Name: <?= $assignment['assignment_name'];  ?> </h1>
          <h1>Student Name: <?php echo $assignment['user_first_name'].' '.$assignment['user_last_name'];  ?></h1>

           <?php 
           // IF STUDENT HAS SUBMITTED ASSIGNMENT, SHOW WHEN
           if($assignment['student_assignment_date_submitted'])
           {
            ?>
            <h1 class="alert-success">Submitted on <?= $assignment['student_assignment_date_submitted']; ?> </h1>
            <h1 class="alert-success">Marks: <?php echo $assignment['student_assignment_marks'];  ?></h1>
            <?php } 
            // IF STUDENT HAS NOT SUBMITTED, SHOW ALERT
            else if($assignment['student_assignment_date_submitted'] == NULL)  {
                   ?>
                   <h1 class="alert-danger">Not submitted</h1>
                <?php
               }  ?>

              
        </div>
        <?php
		}
		?>
    </div>
</div>