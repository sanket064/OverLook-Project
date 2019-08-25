
<!-- LOGIN FORM -->
<div class="container ">
    <div class=" main_login">
        <h1>Register</h1>
        <form action="index.php?controller=user&action=register" method="post" >
            <div class="form-group ">
                <input placeholder="Enter Username" name="user_name" type="text" class="form-control">
            </div>
            <div class="form-group ">
                <input placeholder="Enter Email" name="email" type="email" class="form-control">
            </div>
            <div class="form-group ">
                <input placeholder="Enter First Name" name="first_name" type="text" class="form-control">
            </div>
            <div class="form-group ">
                <input placeholder="Enter Last Name" name="last_name" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="user_role">Select User Role</label>
                <select class="form-control" name="user_role">
                <option>Student</option>
                <option>Teacher</option>
                </select>
            </div>

            <!-- /.input-group -->
            <div class="input-group ">
                <input placeholder="Enter Password" name="password" type="password" class="form-control">
                <span class="input-group-btn">
                    <button class="btn btn-light" name="submit" type="submit">Register</button></span>
            </div>
            <!-- /.input-group -->
        </form> <!-- LOGIN FORM -->
    </div>
</div>