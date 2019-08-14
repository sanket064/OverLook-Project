<h1 class="pending_header">Courses</h1>



<?php
      foreach($this->arrCourses as $assignments) {
        ?>
    <section id="pending_section">

      <div class="container ">
        <div class="row mt-2 mb-2 ">
          <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">   
            <h1 class="course_header"><?= $assignments['classes_teacher']; ?></h1>
            <h1 class="assignment_header"><?= $assignments['classes_name']; ?></h1>
            <h3 class="description_header">Description</h3>
            <p class="course_description"><?= $assignments['classes_description']; ?></p>
            <a class="btn btn-light mt-5 mb-5" href="index.php?controller=pages&action=studentSubmitAssignment&assignment_id=<?php echo $assignments['assignment_id']; ?>&student_assignment_id=<?php echo $assignments['student_assignment_id']; ?>"><h2 class="h2-size-3">Edit</h2></a>

          </div>
        </div>
      </div> 
     </section>
     <?php
      }
      ?>
  



