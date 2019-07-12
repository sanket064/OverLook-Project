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
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            if(!empty($username) && !empty($email) && !empty($password)){
        
                $username = mysqli_real_escape_string(ConnectToDb::con(), $username);
                $email = mysqli_real_escape_string(ConnectToDb::con(), $email);
                $password = mysqli_real_escape_string(ConnectToDb::con(), $password);
            
                $query = "SELECT randSalt FROM users";
                $select_randsalt_query = mysqli_query(ConnectToDb::con(), $query);
                if(!$select_randsalt_query) {
                    die("QUERY FAILED" . mysqli_error(ConnectToDb::con()));
                }
            
                $row = mysqli_fetch_array($select_randsalt_query);
                $salt = $row['randSalt'];
                $password = crypt($password, $salt);
            
                $query = "INSERT INTO users (username, user_email, user_password, user_role) ";
                $query .= "VALUES('{$username}', '{$email}', '{$password}', 'Subscriber' )";
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
            <input placeholder="Enter Username" name="username" type="text" class="form-control">

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
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string(ConnectToDb::con(), $username);
    $password = mysqli_real_escape_string(ConnectToDb::con(), $password);

    $query = "SELECT * FROM users WHERE username = '{$username}' ";
    $select_user_query = mysqli_query(ConnectToDb::con(), $query);
    if(!$select_user_query) {
        die("QUERY FAILED" . mysqli_error(ConnectToDb::con()));
    }
    while($row = mysqli_fetch_array($select_user_query)) {

        $db_id = $row['user_id'];
        $db_username = $row['username'];
        $db_email = $row['user_email'];
        $db_user_password = $row['user_password'];
        $db_user_firstname = $row['user_firstname'];
        $db_user_lastname = $row['user_lastname'];
        $db_user_role = $row['user_role'];

    }

    $password = crypt($password, $db_user_password);
        if($username === $db_username && $password === $db_user_password) {
            $_SESSION['user_name'] = $db_username;
            $_SESSION['first_name'] = $db_user_firstname;
            $_SESSION['last_name'] = $db_user_lastname;
            $_SESSION['user_role'] = $db_user_role;
            $_SESSION['user_email'] = $db_email;
            header("Location: index.php?controller=pages&action=dashboard");
        }  else {
            header("Location: ../index.php");
        }
    }

    }
}


?>