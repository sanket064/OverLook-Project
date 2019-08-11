<div class="container">
    <div class="row">
   
        <div class="col bg-dark text-light p-5">
        <a class="btn btn-primary" href="index.php?controller=pages&action=createAssignment">
        Create New Assignment</a>
        <?php
        foreach($this->arrTeacherNumberOfAssignments as $assignmenttwo)
        {
        ?> 
      
            <h1 class="pb-4 pt-4">Total Assignments: <?= $assignmenttwo['COUNT(1)']; ?></h1>
        
        <?php
        }
        ?>
            <a class="btn btn-primary" href="index.php?controller=pages&action=viewAllTeacherAssignments">
        View All Assignments</a>
        </div>
       

<?php
        foreach($this->arrTeacherNumberOfClasses as $numberOfClasses)
        {
        ?> 
        <div class="col bg-dark text-light p-5">
            <h1>Total Classes: <?= $numberOfClasses['COUNT(1)']; ?></h1>
        </div>
        <?php
        }
        ?>
        <?php
         // SUBMITTED STUDENT ASSIGNMENT COUNT --------------------------------------
      
         $number_of_submitted_students = "SELECT COUNT(1) FROM `student_assignment` WHERE  student_assignment_date_submitted IS NOT NULL
         ";
        $submitted_student_assignment_count = mysqli_query(ConnectToDb::con(), $number_of_submitted_students);
         $assignment_submitted_count = mysqli_fetch_assoc($submitted_student_assignment_count);
 
 
         // NOT SUBMITTED STUDENT ASSIGNMENT COUNT --------------------------------------
         $number_of_not_submitted_students = "SELECT COUNT(1) FROM `student_assignment` WHERE student_assignment_date_submitted IS NULL
         ";
        $not_submitted_student_assignment_count = mysqli_query(ConnectToDb::con(), $number_of_not_submitted_students);
         $assignment_not_submitted_count = mysqli_fetch_assoc($not_submitted_student_assignment_count);
        ?>
        <!-- <div class="col bg-dark text-light">
        <h1 class="bg-success p-5">Submitted Assignments: <?= $assignment_submitted_count['COUNT(1)']; ?></h1>
        </div>
        <div class="col bg-dark text-light">
        <h1 class="bg-danger p-5">Pending Assignments: <?= $assignment_not_submitted_count['COUNT(1)']; ?></h1>
        </div> -->
    </div>
</div>