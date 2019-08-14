<div class="container pb-5 mb-5">
  <form role="form" action="index.php?controller=Assignments&action=createAssignment" method="post" >
      <h1 class="h1-size-2 mt-5">Create An Assignment</h1>
 
    <div class="col pt-5">
      <h2 class="h2-size-1 text-left pb-3">Assignment Name</h2>  
      <input name="assignment_name" type="text" class="form-control" placeholder="Assignment name" required>
     
    </div>
    <div class="col pt-5">
      <h2 class="h2-size-1 text-left pb-3">Assignment Description</h2>  
      <textarea name="assignment_description" type="text" class="form-control" placeholder="Assignment Description" required></textarea>
    </div>
      <input name="assignment_teacher_name" type="text" class="form-control" value="<?=$_SESSION['first_name']?>" hidden readonly required>
    <div class="col pt-5">
      <h2 class="h2-size-1 text-left pb-3">Due Date</h2>
      <input name="assignment_date_due" type="text" class="form-control" placeholder="yyyy-mm-dd" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">
      <script src="https://code.jquery.com/jquery-3.4.1.min.js"integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
      <script>
      $(function()
      {
        $("input[name=assignment_date_due]")[0].oninvalid = function () {
            this.setCustomValidity("Please Enter The Correct Format yyyy-mm-dd");
        };
    });
      </script>
      
    </div>
    <div class="col pt-5">
      <h2 class="h2-size-1 text-left pb-3">Credits</h2>
      <div class="input-group">
        <select name="assignment_credits" id="">
        <option value="">Select Credits</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="4">5</option>
        <option value="4">6</option>
        </select>
      </div>
    </div>
    <div class="col pt-5">
      <h2 class="h2-size-1 text-left pb-3">Date Given</h2>
     
      <input name="assignment_date_due" type="text" class="form-control" value="<?=gmDate('Y-m-d')?>" readonly pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">
      
      
    </div>
    <div class="col pt-5">
    <h2 class="h2-size-1 text-left pb-3">Term</h2>
      <div class="input-group">
        <select name="assignment_term" id="">
        <option value="">Select Term</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        </select>
      </div>
    </div>
 
  
    
    <div class="col pt-5">
    <h2 class="h2-size-1 text-left pb-3">Course</h2>
      
        <div class="input-group">
       
            <select name="assignment_course" id="">
            <option value="">Select Course</option>
                <?php
                foreach($this->getAllTeacherCourses as $classes) {
                   
                    echo "<option value='{$classes['classes_name']}'>{$classes['classes_name']}</option>";
                }
                ?>
             
            </select>
        </div>
    </div>
   
  
    <div class="col pt-5">
  
  <button class="btn btn-primary" type="submit" name="submit">Submit form</button>
    </div>
</form>
</div>
