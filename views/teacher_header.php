
    <div class="row">
        
        <div class="col-sm-12 col-xl-4 background-color">
            <?php
                foreach($this->arrTeacherNumberOfAssignments as $assignmenttwo)
                {
                    ?> 
                        <a class="header-btn" href="index.php?controller=pages&action=viewAllTeacherAssignments">
                            <h1 class="h1-size-3"><?= $assignmenttwo['COUNT(1)']; ?></h1>
                            <h2 class="h2-size-2">Class</h2>
                            <h2 class="h2-size-2"> Assignments</h2>
                            
                        </a>
                    <?php
                }
            ?>
        </div>
        <div class="col-sm-12 col-xl-4 background-color">
            <a class="header-btn" href="index.php?controller=pages&action=createAssignment">
                <h1 class="h1-size-2">Create</h1>
                <h2 class="h2-size-1">New Assignment</h2>
            </a>
        </div>
        <?php
        foreach($this->arrTeacherNumberOfClasses as $numberOfClasses)
        {
        ?> 
        <div class="col-sm-12 col-xl-4 background-color">
            <a class="header-btn" href="index.php?controller=pages&action=createAssignment">
                <h1 class="h1-size-2"><?= $numberOfClasses['COUNT(1)']; ?> </h1>
                <h2 class="h2-size-1">Courses</h2>
            </a>    
        </div>
        <?php
        }
        ?>
       
        <!-- <div class="col bg-dark text-light">
        <h1 class="bg-success p-5">Submitted Assignments: <?= $assignment_submitted_count['COUNT(1)']; ?></h1>
        </div>
        <div class="col bg-dark text-light">
        <h1 class="bg-danger p-5">Pending Assignments: <?= $assignment_not_submitted_count['COUNT(1)']; ?></h1>
        </div> -->
    </div>
