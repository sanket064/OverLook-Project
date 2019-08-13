<?php
$page_title = "Welcome to my home page";
if(isset($_GET['submission'])){
    if($_GET['submission'] == true) {
       echo "<h1 class='p-5 bg-success'>You have submitted your assignment</h1>";
    } 
}
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 background-color">
      <h1 class="h2-subhead pt-5 mt-5">Welcome to the Vanarts <?php echo ($_SESSION['user_role']); ?> Portal, <?php echo ($_SESSION['first_name']); ?></h1>
    </div>
    <?php 
    if($_SESSION['user_role'] == 'Student') 
    {
  
        
      
      ?>
      <div class="col-sm-12 col-xl-4 background-color">
        <a class="header-btn" href="">
        <?php 
        $average = $this->AverageGrade['AVG(student_assignment_marks)'];
        echo '<h1 class="h1-size-2">' . number_format((float)$average, 2, '.', '') . '&#37;</h1>'; 
        ?>
          
          <h2 class="h2-size-1">Average</h2>
        </a>
      </div>
      <div class="col-sm-12 col-xl-4 background-color">
        <a class="header-btn" href="index.php?controller=pages&action=viewPendingAssignment">
          <h1 class="h1-size-3"><?= $this->PendingAssignmentCount['COUNT(1)']; ?></h1>
          <?php 
          if($this->PendingAssignmentCount['COUNT(1)'] > 1){
            ?>
            <h2 class="h2-size-2">Pending</h2>
            <h2 class="h2-size-2">Assignments</h2>
            <?php
          } else {
            ?>
            <h2 class="h2-size-2">Pending</h2>
            <h2 class="h2-size-2">Assignment</h2>
            <?php
          }
          ?>
     
        </a>
      </div>
      <div class="col-sm-12 col-xl-4 background-color">
        <a class="header-btn" href="index.php?controller=pages&action=viewSubmittedAssignment">
          <h1 class="h1-size-4"><?= $this->SubmittedAssignmentCount['COUNT(1)']; ?></h1>
          <?php 
          if($this->SubmittedAssignmentCount['COUNT(1)'] > 1){
            ?>
            <h2 class="h3-size-3">Submitted</h2>
            <h2 class="h3-size-3">Assignments</h2>
            <?php
          } else {
            ?>
            <h2 class="h3-size-3">Submitted</h2>
            <h2 class="h3-size-3">Assignment</h2>
            <?php
          }
          ?>
        </a>
      </div>
      <?php
    } ?>
  </div>
</div>