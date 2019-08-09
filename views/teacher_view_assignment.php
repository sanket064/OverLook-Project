<?php
if(isset($_GET['success'])){
    if($_GET['success'] == true) {
       echo "<h1 class='alert-success'>You have created a new assignment</h1>";
    } else {
        echo "<h1 class='pt-5'>Here are all your assignments</h1>";
    }
}
?>
<table class="table table-hover table-dark">
  <thead>
    <tr>

      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Class</th>
      <th scope="col">Date Due</th>
      <th scope="col">Term</th>
      <th scope="col">Credits</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($this->getAllTeacherAssignments as $assignments) {
        $assignment_course = $assignments['assignment_class_id'];
        $sql_get_class_id = "SELECT * FROM classes WHERE classes_id = '$assignment_course'";
        $results = mysqli_query(ConnectToDb::con(), $sql_get_class_id);
        $assignment_class_id = mysqli_fetch_assoc($results);
        ?>
        <tr>
     
        <td><?= $assignments['assignment_name']; ?></td>
        <td><?= $assignments['assignment_description']; ?></td>
        <td><?= $assignment_class_id['classes_name']; ?></td>
        <td><?= $assignments['assignment_date_due']?></td>
        <td><?= $assignments['assignment_term']?></td>
        <td><?= $assignments['assignment_credits']?></td>
        </tr>
        <?php
    }
    ?>
    
  </tbody>
</table>