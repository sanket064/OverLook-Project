<?php 
if($_SESSION['user_role'] === 'Admin')
{
?>


<?php Posts::bulkCheckPosts(); ?>
<form action="" method="post">
    <table class="table table-bordered table-hover">
        <div id="bulkOptionsContainer" class="col-xs-4">
            <select id="" class="form-control" name="bulk_options">
                <option value="">Select Options</option>
                <option value="Complete">Complete</option>
                <option value="Pending">Pending</option>
                <option value="deleteOrder">Delete</option>

            </select>
        </div>
        <div class="col-xs-4">
            <input type="submit" name="submit" class="btn btn-success" value="Apply">

        </div>
        <thead>
            <tr>
                <th><input id="selectAllBoxes" type="checkbox"></th>
                <th>ID</th>
                <th>Invoice No.</th>
                <th>Date</th>
                <th>Customer</th>
                <th>Email</th>
                <th>Price</th>
                <th>Status</th>
                <th>Edit</th>
                <th>View</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php Orders::showOrders(); ?>
            <ul class="pager">

                <?php Orders::pager(); ?>
            </ul>
        </tbody>
    </table>
</form>

<?php Orders::deleteOrders(); ?>

<?php } // END OF IF STATEMENT - ONLY ADMINS CAN SEE THIS ?>