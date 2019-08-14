    <?php 
    if(isset($this->arrAssignments)) {
        ?>
        <h2 class="my-5 h2-subhead">Student Assignments</h2>
        
        
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
                <td class="bg-danger">Pending</td>
                <?php
            }
            else if($assignment['student_assignment_marks'] > 50) {
                    ?>
                <td class="bg-success"><?php echo $assignment['student_assignment_marks'];  ?></td>
                <?php
                } else {
                ?>
                <td class="bg-danger"><?php echo $assignment['student_assignment_marks'];  ?></td>
                <?php
                }

                if($assignment['student_assignment_comments'] != NULL) {
                    ?>
                <td class="bg-success"><?= $assignment['student_assignment_comments']; ?></td> 

                <?php
                } else {
                ?>
                <td class="bg-danger">Pending</td> 

                <?php

                }
                ?>


            
            <?php 
            // IF STUDENT HAS SUBMITTED ASSIGNMENT, SHOW WHEN
            if($assignment['student_assignment_date_submitted'] != NULL)
            {
            ?>
            <td class="bg-success"><?= $assignment['student_assignment_date_submitted']; ?></td>
            <?php } 
            // IF STUDENT HAS NOT SUBMITTED, SHOW ALERT
            else if($assignment['student_assignment_date_submitted'] == NULL)  {
                ?>
                    <td class="bg-danger">Not Submitted</td>
                <?php
                }  
                ?>


            <td><a href="index.php?controller=pages&action=gradeStudentAssignment&student_assignment_id=<?= $assignment['student_assignment_id']; ?>">Edit</a></td>
            </tr>
        <?php
        }
        echo "</tbody>";
    echo "</table>";
    }
        ?>
