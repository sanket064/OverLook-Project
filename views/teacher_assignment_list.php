    <?php
    if(isset($this->getAllTeacherAssignments)) {
        ?>
        <table class="table table-hover table-dark">
          <thead>
            <tr>
        
              <th scope="col">Name</th>
              <th scope="col">Description</th>
              <th scope="col">Class</th>
              <th scope="col">Date Due</th>
              <th scope="col">Submitted</th>
              <th scope="col">Pending</th>
              <th scope="col">Term</th>
              <th scope="col">Credits</th>
              <th scope="col">Edit</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
        <?php
        foreach($this->getAllTeacherAssignments as $assignments) {
            // print_r($assignments);
            // die;
            $assignment_course = $assignments['assignment_class_id'];
            $sql_get_class_id = "SELECT * FROM classes WHERE classes_id = '$assignment_course'";
            $results = mysqli_query(ConnectToDb::con(), $sql_get_class_id);
            $assignment_class_id = mysqli_fetch_assoc($results);
    
            // SUBMITTED STUDENT ASSIGNMENT COUNT --------------------------------------
            $assignment_id = $assignments['assignment_id'];
            $number_of_submitted_students = "SELECT COUNT(1) FROM `student_assignment` WHERE student_assignment_assignment_id = $assignment_id AND student_assignment_date_submitted IS NOT NULL
            ";
           $submitted_student_assignment_count = mysqli_query(ConnectToDb::con(), $number_of_submitted_students);
            $assignment_submitted_count = mysqli_fetch_assoc($submitted_student_assignment_count);
    
    
            // NOT SUBMITTED STUDENT ASSIGNMENT COUNT --------------------------------------
            $number_of_not_submitted_students = "SELECT COUNT(1) FROM `student_assignment` WHERE student_assignment_assignment_id = $assignment_id AND student_assignment_date_submitted IS NULL
            ";
           $not_submitted_student_assignment_count = mysqli_query(ConnectToDb::con(), $number_of_not_submitted_students);
            $assignment_not_submitted_count = mysqli_fetch_assoc($not_submitted_student_assignment_count);
           
    
            $number_of_not_submitted_students = "SELECT * FROM classes WHERE classes_id = '$assignment_course'";
            $results = mysqli_query(ConnectToDb::con(), $sql_get_class_id);
            $assignment_class_id = mysqli_fetch_assoc($results);
    
            ?>
            <tr>
         
            <td><?= $assignments['assignment_name']; ?></td>
            <td><?= $assignments['assignment_description']; ?></td>
            <td><?= $assignment_class_id['classes_name']; ?></td>
            <td><?= $assignments['assignment_date_due']?></td>
            <td class="bg-success"><?= $assignment_submitted_count['COUNT(1)']; ?></td>
            <td class="bg-danger"><?= $assignment_not_submitted_count['COUNT(1)']; ?></td>
            <td><?= $assignments['assignment_term']?></td>
            <td><?= $assignments['assignment_credits']?></td>
            <td><a href="index.php?controller=pages&action=editAssignment&assignment_id=<?php echo $assignments['assignment_id']; ?>&assignment_class_id=<?php echo $assignments['assignment_class_id']; ?>">Edit</a></td>
            <td><a href="index.php?controller=assignments&action=deleteAssignment&assignment_id=<?php echo $assignments['assignment_id']; ?>">Delete</a></td>
            </tr>
            <?php
        }

       echo "</tbody>";
      echo "</table>";
    }
    ?>
   
  
    <?php 
    if(isset($this->arrAssignments)) {
        ?>
        <h2 class="my-5 pl-3">Student Assignments</h2>
        
        
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
                    <td class="bg-danger">Pending</td>
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
