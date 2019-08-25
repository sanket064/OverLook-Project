<?php 
    if(isset($this->arrAssignments)) {
        ?>
        <h2 class="my-5 h2-subhead">Student Assignments</h2>
        <div class="arrow bounce pb-5">
        <i class="fas fa-angle-right"></i>
</div>
        <div class="table-responsive">
        <table class="table table-hover table-dark">
            <thead>
            <tr>
        
                <th scope="col">Student</th>
                <th scope="col">Assignment</th>
                <th scope="col">Grade</th>
                <th scope="col">Comments</th>
                <th scope="col">Status</th>
                <th scope="col">Edit</th>
                
            </tr>
            </thead>
            <tbody>

        <?php
        foreach($this->arrAssignments as $assignment)
        {
            // print_r($assignment);
            ?>
                <tr>
            <td><?php echo $assignment['user_first_name'].' '.$assignment['user_last_name'];  ?></td>
            <td><?= $assignment['assignment_name']; ?></td>
            <?php
            if($assignment['student_assignment_marks'] === NULL){
                ?>
                <td class="bg-danger-overlook">Pending</td>
                <?php
            } else if($assignment['student_assignment_marks'] > 50) {
                    ?>
                <td class="bg-success-overlook"><?php echo $assignment['student_assignment_marks'];  ?></td>
                <?php
                } else {
                ?>
                <td class="bg-danger-overlook"><?php echo $assignment['student_assignment_marks'];  ?></td>
                <?php
                }
                if($assignment['student_assignment_comments'] != NULL) {
                    ?>
                <td class="bg-success-overlook"><?= $assignment['student_assignment_comments']; ?></td> 

                <?php
                } else {
                ?>
                <td class="bg-danger-overlook">Pending</td> 

                <?php
                }
                ?>


            
            <?php 
            // IF STUDENT HAS SUBMITTED ASSIGNMENT, SHOW WHEN
            if($assignment['student_assignment_date_submitted'] != NULL)
            {
            ?>
            <td class="bg-success-overlook">Submitted On <?= $assignment['student_assignment_date_submitted']; ?></td>
            <?php } 
            // IF STUDENT HAS NOT SUBMITTED, SHOW ALERT
            else if($assignment['student_assignment_date_submitted'] == NULL)  {
                ?>
                    <td class="bg-danger-overlook">Not Submitted</td>
                <?php
                }  
                ?>


            <td><a class="btn btn-light" href="index.php?controller=pages&action=gradeStudentAssignment&student_assignment_id=<?= $assignment['student_assignment_id']; ?>">Edit</a></td>
            </tr>
        <?php
        }
        echo "</tbody>";
    echo "</table>";
    echo "</div>";
    }
        ?>