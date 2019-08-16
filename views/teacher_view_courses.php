<h1 class="pending_header">Courses</h1>
<?php
foreach ($this->arrCourses as $assignments) {
    ?>
    <section id="pending_section">
      <div class="container ">
        <div class="row mt-2 mb-2 ">
          <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
           
            <h1 class="assignment_header"><?=$assignments['classes_name'];?></h1>
            <h3 class="description_header">Description</h3>
            <p class="course_description"><?=$assignments['classes_description'];?></p>
          </div>
        </div>
      </div>
    </section>
     <?php
}
?>




