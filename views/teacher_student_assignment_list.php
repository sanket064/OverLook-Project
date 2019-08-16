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

                $student_assignment_id = $assignment['student_assignment_id'];
                if($assignment['student_assignment_comments'] === NULL) {
                    ?>
                     <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#product_view<?=$assignments['student_assignment_id']?>"><i class="fa fa-search"></i></button></td>
                    <?php
                } else if($assignment['student_assignment_marks'] < 50){
                  ?>
                   <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#product_view<?=$assignments['student_assignment_id']?>"><i class="fa fa-search"></i></button></td>
                  <?php
                } else if($assignment['student_assignment_marks'] > 50){
                  ?>
                   <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#product_view<?=$assignments['student_assignment_id']?>"><i class="fa fa-search"></i></button></td>
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
    echo "</div>";
    }
        ?>
    <div class="modal fade product_view" id="product_view<?=$assignments['student_assignment_id']?>">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle"><?=$assignments['assignment_name']?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <?php
            
            if($assignments['student_assignment_comments'] === NULL) {
                echo "<h1 id='comments-popup'>Pending</h1>";
            } else if($assignments['student_assignment_marks'] < 50){
                echo "<h1 id='comments-popup'>".$assignments['student_assignment_comments']."</h1>";
            } else if($assignments['student_assignment_marks'] > 50){
                echo "<h1 id='comments-popup'>".$assignments['student_assignment_comments']."</h1>";
            }
            ?>
          </div>
        </div>
      </div>
    </div>
