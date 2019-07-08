<?php 
	// This is how the error message will appear
    $error = !empty($_GET['error'])?$_GET['error']:false; // If the $_GET is not empty then set it to what is inputed in the browser else it is false
        switch ($error) {
            case 'wrongpass':
            echo '<h2 class="error">Wrong Credentials, Please Try Again</h2>';
            break;
            case 'noUser':
            echo '<h2 class="error">Wrong Credentials, Please Try Again</h2>';
            break;    
            default:
            break;
        }
    ?>
<link rel="stylesheet" href="css/main.css"> 
<div class="form-wrapper">
  <form name="myForm" method="post" action="Classes/validate.php">
  <h3 class="form_login">Login</h3>
  <div class="form-item">
   <input type="email" id="email" placeholder="Email" name="user_email" 
                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Username or Email:" required />   
  </div>
  <div class="form-item">
  <input type="password" id="password" placeholder="Password" name="user_password" required>
  </div>
  <div class="button-panel">
  <input class="button" type="submit" name="submit" value="Submit" class="submit" />   
  </div>
</form>
<div class="reminder">
  <p><a href="#">Forgot password?</a></p>
</div>