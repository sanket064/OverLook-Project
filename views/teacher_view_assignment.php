<div class="container mt-5 pt-5">
<?php
if(isset($_GET['success'])){
    if($_GET['success'] == true) {
       echo "<h1 class='p-5 bg-success-overlook'>You have created a new assignment</h1>";
    } 
}
if(isset($_GET['editsuccess'])){
  if($_GET['editsuccess'] == true) {
     echo "<h1 class='mt-5 p-5 bg-success-overlook'>You have updated the assignment</h1>";
  } 
}
if(isset($_GET['delete'])){
  if($_GET['delete'] == true) {
     echo "<h1 class='mt-5 p-5 bg-danger-overlook'>You have deleted the assignment</h1>";
  }
}
?>
<div class="col-sm-12 col-xl-12 text-center mt-5">

  <a class="btn btn-light" href="index.php?controller=pages&action=createAssignment">
        <h2 class="h2-size-3">Create New Assignment</h2>
        </a>
</div>
<h1 class='pt-5 pb-5 h2-subhead'>Here are all your assignments</h1>
</div>
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
        <td class="bg-success-overlook"><?= $assignment_submitted_count['COUNT(1)']; ?></td>
        <td class="bg-danger-overlook"><?= $assignment_not_submitted_count['COUNT(1)']; ?></td>
        <td><?= $assignments['assignment_term']?></td>
        <td><?= $assignments['assignment_credits']?></td>
        <td><a class="btn btn-light" href="index.php?controller=pages&action=editAssignment&assignment_id=<?php echo $assignments['assignment_id']; ?>&assignment_class_id=<?php echo $assignments['assignment_class_id']; ?>">Edit</a></td>
        <td><a class="btn btn-light" href="index.php?controller=assignments&action=deleteAssignment&assignment_id=<?php echo $assignments['assignment_id']; ?>">Delete</a></td>
        </tr>
        <?php
    }
    ?>
    <?php

    ?>
  </tbody>
</table>