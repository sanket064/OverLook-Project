<!-- LOGIN FORM -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<div class="container">
    <div class="well">
        <h4>Login</h4>
        <form action="includes/admin_validate.php" method="post">
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
</div>