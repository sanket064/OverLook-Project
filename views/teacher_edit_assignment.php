<?php
foreach($this->editAssignment as $edit_assignment)
{
  // print_r($edit_assignment);
?>
  <div class="container">
    <h1 class="col pt-5 h2-subhead">Edit An Assignment</h1>
    <form role="form" action="index.php?controller=Assignments&action=updateAssignment&assignment_id=<?= $edit_assignment['assignment_id']; ?>" method="post" >
    
        <div class="col pt-5">
          <label>Assignment Name</label>  
          <input name="assignment_name" type="text" value="<?= $edit_assignment['assignment_name']; ?>" class="form-control" placeholder="Assignment name" required>
        
        </div>
        <div class="col pt-5">
          <label>Assignment Description</label>  
          <textarea name="assignment_description" type="text" class="form-control" placeholder="Assignment Description" required><?= $edit_assignment['assignment_description']; ?></textarea>
        </div>
          <input name="assignment_teacher_name" type="text" class="form-control" value="<?=$_SESSION['first_name']?>" hidden readonly required>
        <div class="col pt-5">
          <label>Due Date</label>
          <input value="<?= $edit_assignment['assignment_date_due']; ?>" name="assignment_date_due" type="text" class="form-control" placeholder="yyyy-mm-dd" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">
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
          <label>Credits</label>
          <div class="input-group">
            <select name="assignment_credits" id="">
            <option value="<?= $edit_assignment['assignment_credits']; ?>"><?= $edit_assignment['assignment_credits']; ?></option>
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
          <label>Last Update: <?= $edit_assignment['assignment_date_given']; ?></label>
        
          <input name="assignment_date_due" type="text" class="form-control" value="<?=gmDate('Y-m-d')?>" readonly pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">
          
          
        </div>
        <div class="col pt-5">
          <label for="validationServerUsername">Term</label>
          <div class="input-group">
            <select name="assignment_term" id="">
            <option value="<?= $edit_assignment['assignment_term']; ?>"><?= $edit_assignment['assignment_term']; ?></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            </select>
          </div>
        </div>
    
      
        
        <div class="col pt-5">
            <label for="validationServerUsername">Course</label>
          
            <div class="input-group">
          
                <select name="assignment_class_name" id="">
                <?php
                foreach($this->getCurrentTeacherCourse as $current_class) {
                  ?>
                  <option value="<?= $current_class['classes_name']; ?>"><?= $current_class['classes_name']; ?></option>
                  <?php
                }
                  ?>
                    <?php
                    foreach($this->getAllTeacherCourses as $classes) {
                      
                        echo "<option value='{$classes['classes_name']}'>{$classes['classes_name']}</option>";
                    }
                    ?>
                
                </select>
            </div>
        </div>
      
      
        <div class="col pt-5">
      
      <button class="btn btn-light mb-5" type="submit" name="submit">Submit form</button>
        </div>
    </form>
  </div>
 
<?php
}
?>
