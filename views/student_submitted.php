<h1 class="submitted_header">Submitted Assignments</h1>



<?php
      foreach($this->arrAssignments as $assignments) {
        ?>
    <section id="submitted_section">

      <div class="container ">
        <div class="row mt-2 mb-2 ">
          <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">   
            <h1 class="course_header"><?= $assignments['classes_name']; ?></h1>
            <h1 class="credit_header">Credits | <?= $assignments['assignment_credits']?>  </h1>
            <h1 class="assignment_header-submitted"><?= $assignments['assignment_name']; ?></h1>
            <h3 class="description_header">Description</h3>
            <p class="course_description"><?= $assignments['assignment_description']; ?></p>
            <div class="row">
                

            <?php if ($assignments['student_assignment_marks'] === NULL) {
                ?>
                <h1 class="assignment_header-grade col-6">Grade Pending</h1>
                <?php
            } else if ($assignments['student_assignment_marks'] < 50){
                ?>
                <h1 class="assignment_header-grade col-6"><?= $assignments['student_assignment_marks']; ?></h1>
                <?php
            } else {
                ?>
                <h1 class="assignment_header-submitted-grade col-6"><?= $assignments['student_assignment_marks']; ?>&#37</h1>
                <?php
            }
            ?>
            <a class="btn col-6" href="index.php?controller=pages&action=studentSubmitAssignment&assignment_id=<?php echo $assignments['assignment_id']; ?>&student_assignment_id=<?php echo $assignments['student_assignment_id']; ?>"><span class="tick-image"><img src="assets/icon2.png" alt="ok" /></span></a>
            </div>
          </div>
        </div>
      </div> 
     </section>
     <?php
      }
      ?>
  



