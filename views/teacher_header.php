
    <h1 class="h2-subhead pb-5 new-padding ">Welcome to the Vanarts <?php echo ($_SESSION['user_role']); ?> Portal, <?php echo ($_SESSION['first_name']); ?></h1>

    <div class="row mx-auto">
        
        <div class="col-sm-12 col-xl-4 px-0 background-color">
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
        <div class="col-sm-12 col-xl-4 px-0 background-color">
            <a class="header-btn" href="index.php?controller=pages&action=createAssignment">
                <h1 class="h1-size-2">Create</h1>
                <h2 class="h2-size-1">New Assignment</h2>
            </a>
        </div>
        <?php
        foreach($this->arrTeacherNumberOfClasses as $numberOfClasses)
        {
        ?> 
        <div class="col-sm-12 col-xl-4 px-0 background-color">
            <a class="header-btn" href="index.php?controller=pages&action=viewAllTeacherCourses">
                <h1 class="h1-size-2"><?= $numberOfClasses['COUNT(1)']; ?> </h1>
                <h2 class="h2-size-1">Courses</h2>
            </a>    
        </div>
        <?php
        }
       ?>
        </div>
