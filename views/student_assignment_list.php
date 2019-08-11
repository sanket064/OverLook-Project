<?php
if(isset($_GET['submission'])){
    if($_GET['submission'] == true) {
       echo "<h1 class='p-5 bg-success'>You have submitted your assignment</h1>";
    } 
}
?>

<h1>Here are your assignments</h1>
<table class="table table-hover table-dark">
  <thead>
    <tr>

      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Class</th>
      <th scope="col">Date Due</th>
      <th scope="col">Status</th>
      <th scope="col">Grade</th>
      <th scope="col">Comments</th>
      <th scope="col">Term</th>
      <th scope="col">Credits</th>
      <th scope="col">Submit</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($this->arrAssignments as $assignments) {
        ?>
        <tr>
     
        <td><?= $assignments['assignment_name']; ?></td>
        <td><?= $assignments['assignment_description']; ?></td>
        <td><h3><?= $assignments['classes_name']; ?> </h3><?= $assignments['assignment_teacher_name']; ?></td>
        <td><?= $assignments['assignment_date_due']?></td>
        <?php
        if($assignments['student_assignment_date_submitted'] === NULL) {
            echo "<td class='bg-danger'>Not Submitted</td>";
        } else {
            echo "<td class='bg-success'>".$assignments['student_assignment_date_submitted']."</td>";
        }
        ?>
         <?php
        if($assignments['student_assignment_marks'] === NULL) {
            echo "<td class='bg-warning'>Pending</td>";
        } else if($assignments['student_assignment_marks'] < 50){
            echo "<td class='bg-danger'>".$assignments['student_assignment_marks']."</td>";
        } else if($assignments['student_assignment_marks'] > 50){
            echo "<td class='bg-success'>".$assignments['student_assignment_marks']."</td>";
        }
        ?>
        <?php
        if($assignments['student_assignment_comments'] === NULL) {
            echo "<td class='bg-warning'>Pending</td>";
        } else if($assignments['student_assignment_marks'] < 50){
            echo "<td class='bg-danger'>".$assignments['student_assignment_comments']."</td>";
        } else if($assignments['student_assignment_marks'] > 50){
            echo "<td class='bg-success'>".$assignments['student_assignment_comments']."</td>";
        }
        ?>
    
        <td><?= $assignments['assignment_term']?></td>
        <td><?= $assignments['assignment_credits']?></td>

        <td><a href="index.php?controller=pages&action=studentSubmitAssignment&assignment_id=<?php echo $assignments['assignment_id']; ?>&student_assignment_id=<?php echo $assignments['student_assignment_id']; ?>">Submit</a></td>
        </tr>
        <?php
      
    }
    ?>
    
  </tbody>
</table>