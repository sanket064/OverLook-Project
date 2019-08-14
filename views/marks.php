<?php
$page_title = "Welcome to my marks page";

?>
<div class="container-fluid">
<div class="row">
<div class="col-sm-12 pass-background-color">
<h1 class="pass-h1">Term 1</h1>
</div>

<?php
foreach($this->arrAssignments as $assignments) {
?>
    <div class="col-sm-12 marks-background-color p-2">
        <div class="row">
            <h1 class="marks-h1  "><?= $assignments['classes_name']; ?></h1>
            <h2 class="marks-h2 pt-3">Credits | <?= $assignments['assignment_credits']?></h2>
        </div>
            <?php
      if ($assignments['student_assignment_marks'] === NULL) {
           ?>
            <div class="row">
                <div class="col marks-style">
                    <h3 class="marks-h3-addition">
                    <p>Submitted all assignments</p>
                    <p>Grade Pending</p>
                    </h3>
                    <span class="tick-image"><img src="assets/icon2.png" alt="ok" /></span>
                </div>
            </div>
           <?php
       } else {
           ?>
        <div class="col-sm-3 marks-style">
            <h3 class="marks-h3"><?= $assignments['student_assignment_marks']?>&#37;</h3>
            <span class="tick-image"><img src="assets/icon2.png" alt="ok" /></span>
        </div>
        <?php
       }
        ?>
    </div>
<?php
}
?>



<div class="col-sm-12 marks-background-color">
        <h1 class="marks-h1">Database Concepts</h1>
        <h2 class="marks-h2">Credits<span class="ml-5">1.0</span></h2>
        <h3 class="marks-h3">85&#37;<span class="ml-5">A</span></h3>
    </div>
<div class="col-sm-12 marks-background-color">
        <h1 class="marks-h1">HTML5 & CSS</h1>
        <h2 class="marks-h2">Credits<span class="ml-5">2.0</span></h2>
        <div class="col-sm-3 marks-style">
        <h3 class="marks-h3-addition">
          <p>Submitted all assignments.
          Grade Pending
          </p>
          </h3>
          <span class="tick-image"><img src="assets/icon2.png" alt="ok" /></span>
          </div>
</div>
<div class="col-sm-12 marks-background-color">
    <h1 class="marks-h1">Photoshop</h1>
    <h2 class="marks-h2">Credits<span class="ml-5">1.0</span></h2>
    <p class="marks-p">2 pending assignments</p>
    <h3 class="marks-h3">96&#37;<span class="ml-5">A</span></h3>
</div>
<div class="col-sm-12 marks-background-color">
    <h1 class="marks-h1-addition">Project Man. 1</h1>
    <h2 class="marks-h2">Credits<span class="ml-5">1.0</span></h2>
    <p class="marks-p">2 pending assignments</p>
</div>
</div>
</div>