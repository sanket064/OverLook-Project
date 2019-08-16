

<h1 class="h2-subhead pt-5 pb-5">Here are your assignments</h1>
<div class="arrow bounce">
<i class="fas fa-angle-right"></i>
</div>
<div class="table-responsive">
<table class="table table-hover table-dark">
  <thead>
    <tr>

      <th class="th-sm">Name</th>
      <th class="th-sm">Description</th>
      <th class="th-sm">Class</th>
      <th class="th-sm">Date Due</th>
      <th class="th-sm">Status</th>
      <th class="th-sm">Grade</th>
      <th class="th-sm">Comments</th>
      <th class="th-sm">Term</th>
      <th class="th-sm">Credits</th>
      <th class="th-sm">Submit</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($this->arrAssignments as $assignments) {
        ?>
        <tr>
     
        <td><?= $assignments['assignment_name']; ?></td>
        <td><?= $assignments['assignment_description']; ?></td>
        <td><h3 class="font-weight-bold"><?= $assignments['classes_name']; ?> </h3><?= $assignments['assignment_teacher_name']; ?></td>
        <td><?= $assignments['assignment_date_due']?></td>
        <?php
        if($assignments['student_assignment_date_submitted'] === NULL) {
            echo "<td class='text-danger'>Not Submitted</td>";
        } else {
            echo "<td class='text-success'>Submitted  ".$assignments['student_assignment_date_submitted']."</td>";
        }
       
         
        if($assignments['student_assignment_marks'] === NULL) {
            echo "<td class='text-warning'>Pending</td>";
        } else if($assignments['student_assignment_marks'] < 50){
            echo "<td class='text-danger'>".$assignments['student_assignment_marks']."&#37</td>";
        } else if($assignments['student_assignment_marks'] > 50){
            echo "<td class='text-success'>".$assignments['student_assignment_marks']."&#37</td>";
        }
     
        $student_assignment_id = $assignments['student_assignment_id'];
        if($assignments['student_assignment_comments'] === NULL) {
            ?>
             <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#product_view<?=$assignments['student_assignment_id']?>"><i class="fa fa-search"></i></button></td>
            <?php
        } else if($assignments['student_assignment_marks'] < 50){
          ?>
           <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#product_view<?=$assignments['student_assignment_id']?>"><i class="fa fa-search"></i></button></td>
          <?php
        } else if($assignments['student_assignment_marks'] > 50){
          ?>
           <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#product_view<?=$assignments['student_assignment_id']?>"><i class="fa fa-search"></i></button></td>
          <?php
        }
        ?>
       
       
    
        <td><?= $assignments['assignment_term']?></td>
        <td><?= $assignments['assignment_credits']?></td>

        <td><a href="index.php?controller=pages&action=studentSubmitAssignment&assignment_id=<?php echo $assignments['assignment_id']; ?>&student_assignment_id=<?php echo $assignments['student_assignment_id']; ?>">Submit</a></td>
        </tr>
    </div>
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
        <?php
      
    }
    ?>
    
  </tbody>
</table>