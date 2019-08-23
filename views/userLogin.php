<?php
if(isset($_GET['error'])) {

  if($_GET['error'] = true) {
    echo "<h1 class='bg-danger-overlook p-5 text-light text-center'>Invalid Username or Password. Try Again</h1>";
	} 


}
if(isset($_GET['logout'])) {


	if($_GET['logout'] = true) {
    echo "<h1 class='bg-danger-overlook p-5 text-center'>Logged out</h1>";
  } 

}

?>
<section class="login_home">
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
        <div class="card-header">
				<h3>Sign In</h3>
			</div>
			<div class="card-body">
            <form action="index.php?controller=user&action=login" method="post" >
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input placeholder="Enter Username" name="user_name" type="text" class="form-control">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
                        <input placeholder="Enter Password" name="password" type="password" class="form-control">
					</div>
					<div class="form-group">
                        <button class="btn float-right login_btn" name="login" type="submit">Login</button>
					</div>
				</form>
			</div>
			<div class="card-footer">	
			</div>
		</div>
	</div>
</div>

</section>