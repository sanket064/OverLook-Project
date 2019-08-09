<div class="container">
<div class="row">
<div class="col">
<a href="index.php?controller=pages&action=createAssignment">
Create New Assignment</a>
</div>
<div class="col">
<a href="index.php?controller=pages&action=viewAllTeacherAssignments">
View All Assignments</a>
</div>
<?php
foreach($this->arrTeacherNumberOfAssignments as $assignmenttwo)
{
?> 
<div class="col">

  <h1>Total Assignments: <?= $assignmenttwo['COUNT(1)']; ?></h1>
</div>
<?php
}
?>
</div>
</div>