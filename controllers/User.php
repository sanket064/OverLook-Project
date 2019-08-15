<?php

Class User extends Controller {
    // public function __construct($arrUser) {

    //     $this->id = $arrUser["user_id"];
    //     $this->id = $arrUser["username"];
    //     $this->id = $arrUser["user_password"];
    //     $this->id = $arrUser["user_firstname"];
    //     $this->id = $arrUser["user_lastname"];
    //     $this->id = $arrUser["user_email"];
    //     $this->id = $arrUser["user_image"];
    //     $this->id = $arrUser["user_role"];
    // }
    public function main()
	{
		// .......... // 
	}

    public static function register() {

        if(isset($_POST['submit'])){
            $user_name = $_POST['user_name'];
            $email = $_POST['email'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $user_role = $_POST['user_role'];
            $password = $_POST['password'];

           
            if(!empty($user_name) && !empty($email) && !empty($password) && !empty($first_name) && !empty($last_name) && !empty($user_role)){
        
                $user_name = mysqli_real_escape_string(ConnectToDb::con(), $user_name);
                $email = mysqli_real_escape_string(ConnectToDb::con(), $email);
                $first_name = mysqli_real_escape_string(ConnectToDb::con(), $first_name);
                $last_name = mysqli_real_escape_string(ConnectToDb::con(), $last_name);
                $user_role = mysqli_real_escape_string(ConnectToDb::con(), $user_role);
                $password = mysqli_real_escape_string(ConnectToDb::con(), $password);

            
                $query = "SELECT rand_salt FROM users";
                $select_randsalt_query = mysqli_query(ConnectToDb::con(), $query);
                if(!$select_randsalt_query) {
                    die("QUERY FAILED" . mysqli_error(ConnectToDb::con()));
                }
            
                $row = mysqli_fetch_array($select_randsalt_query);
                $salt = $row['rand_salt'];
                $password = crypt($password, $salt);
            
                $query = "INSERT INTO users (user_name, user_password, user_first_name, user_last_name, user_email, user_role) ";
                $query .= "VALUES('{$user_name}',  '{$password}', '{$first_name}', '{$last_name}', '{$email}', '{$user_role}' )";
                $register_user_query = mysqli_query(ConnectToDb::con(), $query);
                if(!$register_user_query) {
                    die("QUERY FAILED" . mysqli_error(ConnectToDb::con()));
                } else {
                    echo "<h5 class='text-success text-center bg-success'>Registration has been submitted</h5>";
                    ?>

<!-- LOGIN FORM -->
<div class="well">
    <h4>Login</h4>
    <form action="index.php?controller=user&action=login" method="post">
        <div class="form-group">
            <input placeholder="Enter Username" name="user_name" type="text" class="form-control">

        </div>
        <!-- /.input-group -->
        <div class="input-group">
            <input placeholder="Enter Password" name="password" type="password" class="form-control">
            <span class="input-group-btn">
                <button class="btn btn-primary" name="login" type="submit">Submit</button></span>
        </div>
        <!-- /.input-group -->
    </form> <!-- LOGIN FORM -->
</div>

<?php
            
                }
            } else {
                echo "<h5 class='text-error text-center bg-error'>Fields Cannot Be Empty</h5>";
        
            }
        
        
            
        }

    }

    public static function login() {
        

    if(isset($_POST['login'])){
       
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];

        $user_name = mysqli_real_escape_string(ConnectToDb::con(), $user_name);
        $password = mysqli_real_escape_string(ConnectToDb::con(), $password);

    $query = "SELECT * FROM users WHERE user_name = '{$user_name}' ";
    $select_user_query = mysqli_query(ConnectToDb::con(), $query);
    if(!$select_user_query) {
        die("QUERY FAILED" . mysqli_error(ConnectToDb::con()));
    }
    while($row = mysqli_fetch_array($select_user_query)) {

        $db_id = $row['user_id'];
        $db_username = $row['user_name'];
        $db_email = $row['user_email'];
        $db_user_password = $row['user_password'];
        $db_user_firstname = $row['user_first_name'];
        $db_user_lastname = $row['user_last_name'];
        $db_user_role = $row['user_role'];

    }

    $password = crypt($password, $db_user_password);
        if($user_name === $db_username && $password === $db_user_password) {
            
            $_SESSION['user_name'] = $db_username;
            $_SESSION['first_name'] = $db_user_firstname;
            $_SESSION['last_name'] = $db_user_lastname;
            $_SESSION['user_role'] = $db_user_role;
            $_SESSION['user_email'] = $db_email;
            $_SESSION['user_id'] = $db_id;

            header("Location: index.php?controller=pages&action=dashboard");
        }  else {
            header("Location: index.php?error=true");
        }
    }

    }

    public static function logout(){
        session_start();
        $_SESSION['user_name'] = NULL;
        $_SESSION['first_name'] = NULL;
        $_SESSION['last_name'] = NULL;
        $_SESSION['user_role'] = NULL;
        $_SESSION['user_email'] = NULL;
        $_SESSION['user_id'] = NULL;
        header("Location: index.php?controller=pages&action=dashboard&logout=true");
    }
}


?>