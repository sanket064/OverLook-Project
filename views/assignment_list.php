<div class="container">
    <h2 class="my-5 pl-3">Assignments</h2>
    <div class="row">
        <?php 
        // $total_marks = ($this->arrAverageGrade);
        // print_r("total marks are: " . $total_marks);
		foreach($this->arrAssignments as $assignment)
		{
            // print_r($assignment);
            ?>

        <div class="col">
            <h1 class="my-3">Term <?=$assignment['assignment_term']?></h1>
            <h1 class="my-3">Assignment Name: <?=$assignment['assignment_name']?></h1>
            <h1 class="my-3">Credits: <?=$assignment['assignment_credits']?></h1>
            <h1 class="my-3">Teacher Name: <?=$assignment['assignment_teacher_name']?></h1>
            <h1 class="my-3">Details: <?=$assignment['assignment_description']?></h1>
            <?php 
            if (empty($assignment['assignment_date_submitted'])) {
                // if assignment has not been submitted by a student, then show the date it is due & the description
                ?>
                <h1 class="my-3 alert-warning">Date Due:<?=$assignment['assignment_date_due']?></h1>
                <h1 class="my-3 alert-warning">Description: <?=$assignment['assignment_description']?></h1>
                <?php
            } else {
                // Show the date it has been submitted
                ?>
                <h1 class="my-3">Date Submitted: <?=$assignment['assignment_date_submitted']?></h1>
                
                <?php
            }
            ?>

            <?php 
            if (empty($assignment['assignment_marks'])){
                // If marks have not been given yet then show the following:
                ?>
                <h1 class="my-3">Grade Pending</h1>
                <?php
            } else if ($assignment['assignment_marks'] < 50) {
                // If grade has been submitted by teacher then we will show it, If student gets lower than 50% we will show a failed display
                ?>
                <h1 class="my-3 alert-danger">Grade: <?=$assignment['assignment_marks']?>%</h1>
                <h1 class="my-3 alert-danger">Comments: <?=$assignment['assignment_comments']?></h1>
                <?php
            } else if ($assignment['assignment_marks'] >= 50) {
                // If student passes (over 50) then we show success
                ?>
                <h1 class="my-3 alert-success">Grade: <?=$assignment['assignment_marks']?>%</h1>
                <h1 class="my-3 alert-success">Comments: <?=$assignment['assignment_comments']?></h1>
                <?php
            }
            ?>
            
           
            
            
            
        </div>

        <?php
		}
		?>
    </div>
</div>