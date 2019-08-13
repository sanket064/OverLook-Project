<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Rainbowtique CMS</a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li><a href="../index.php">Front-End</a></li>



        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                <?php
            if(isset($_SESSION['user_name'])) {
                echo $_SESSION['user_name']; 
            }
            // $_SESSION['user_name'] = $db_username;
            // $_SESSION['first_name'] = $db_user_firstname;
            // $_SESSION['last_name'] = $db_user_lastname;
            // $_SESSION['user_role'] = $db_user_role;
            ?>
                <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="../admin/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <?php
            if($_SESSION['user_role'] === 'Admin')
            {
            ?>
            <li>
                <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>

            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#posts_dropdown"><i
                        class="fa fa-fw fa-arrows-v"></i>
                    Products <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="posts_dropdown" class="collapse">
                    <li>
                        <a href="posts.php">View All Products</a>
                    </li>
                    <li>
                        <a href="posts.php?source=add_post">Add Product</a>
                    </li>
                </ul>
            </li>
            <li>
            <li class="">
                <a href="orders.php"><i class="fa fa-fw fa-file"></i> View Orders</a>
            </li>
            </li>
            <li>
                <a href="categories.php"><i class="fa fa-fw fa-wrench"></i> Categories</a>
            </li>

            <li class="">
                <a href="comments.php"><i class="fa fa-fw fa-file"></i> Comments</a>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i>
                    Users <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="demo" class="collapse">
                    <li>
                        <a href="users.php">View All Users</a>
                    </li>
                    <li>
                        <a href="users.php?source=add_user">Add User</a>
                    </li>
                </ul>
            </li>


            <?php
            }?>
            <li>
                <a href="profile.php"><i class="fa fa-fw fa-dashboard"></i> Profile</a>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>