<?php include "../../../../rainbowtique/ConnectToDB.php"; ?>
<?php session_start(); ?>
<?php
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
          header("Location: ../index.php");
      }  else {
          header("Location: ../../index.php");
      }
}

?>