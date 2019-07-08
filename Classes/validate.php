<?php
include("connectToDB.php"); 
	if(isset($_POST['submit'])) {
		// checking the email Input to see that its not blank
		if($_POST['user_email'] !== ''){
			// the input will be what the user types
            $email = $_POST['user_email'];
            $password = $_POST["user_password"];
            $email = mysqli_real_escape_string(ConnectToDB::connect(), $email);
            $password = mysqli_real_escape_string(ConnectToDB::connect(), $password);
			
			// adding the validation for email with '@' + '.'
			$reg = "/[a-zA-Z0-9.\-_]{1,}@{1}[a-zA-Z0-9]{3,}[.]{1}[a-zA-Z0-9]{1,}.{0,}/";
			$regCheck = preg_match($reg, $email);
			// if email is valid then its true, else false
            ($regCheck)? $validEmail = true: $validEmail = false;
		}
		// if email matches with database and is written in the correct format then it moves ahead	
		if($validEmail) 
		{
			// fetching data for the specific user from database
			// $userLogin = BackEndFunctions::outputData($sqlSelect);
			$sql = "SELECT * FROM users WHERE user_email = '$email'";	
			$userLogin = mysqli_query(ConnectToDB::connect(), $sql);
            $userLogin = mysqli_fetch_assoc($userLogin);

        if (!$userLogin){
            echo "QUERY FAILED" .''. mysqli_error("Connection failed");
        }
			
			// hashing the password with extra characters for security
			$secretPassword = password_hash($password, PASSWORD_DEFAULT);
			
			if ($userLogin) {
				// pairing the hashed password with regular password
				$encryptedPass = $userLogin['user_password'];
				// only if the hashed password in database matches with the new password from form session starts and navigates to dashboard
				if(password_verify($_POST["user_password"], $encryptedPass)){
					session_start();
                    $_SESSION["userID"] = $userLogin[0]["id"];
                    header('location: ../home.php');  
				}
				else {
					// if the password does not match with database
					header('location: ../index.php?error=wrongpass');		
				}	
			} else {
				// echo "it does not work";
				// die;
				// if the email is not matching with the database
				header('location: ../index.php?error=noUser');
			}
		}
	}// end for isset($_POST['submit'])
?>