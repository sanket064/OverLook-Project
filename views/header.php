<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<a class="navbar-brand" href="index.php?controller=pages&action=dashboard"> <img class="logo" src="assets/OVERLOOK_LOGO-14.png" alt="logo"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbar1">
    <ul class="navbar-nav ml-auto"> 

<li class="nav-item"><a class="nav-link" href="index.php?controller=pages&action=dashboard">Dashboard <span class="sr-only">(current)</span> </a></li>
<?php
if($_SESSION['user_role'] == 'Teacher') {
?>
  <li class="nav-item"><a class="nav-link" href="index.php?controller=pages&action=viewAllTeacherAssignments"> Assignments </a></li>
<?php
} else {
  ?>
  <li class="nav-item"><a class="nav-link" href="index.php?controller=pages&action=ViewAllAssignments"> Assignments </a></li>
<?php
}
?>
<li class="nav-item"><a class="nav-link" href="index.php?controller=user&action=logout"> Logout </a></li>
    </ul>
  </div>
</nav>
