<?php
if($_SESSION['user_role'] === 'Admin')
{ // ONLY ADMIN CAN VIEW THIS PAGE
    ?>
<?php Posts::bulkCheckPosts(); ?>
<form action="" method="post">
    <table class="table table-bordered table-hover">
        <div id="bulkOptionsContainer" class="col-xs-4">
            <select id="" class="form-control" name="bulk_options">
                <option value="">Select Options</option>
                <option value="Published">Publish</option>
                <option value="Draft">Draft</option>
                <option value="delete">Delete</option>
                <option value="0">Remove From Featured</option>
                <option value="1">Add To Featured</option>
                <option value="reset">Reset Post View Count</option>

            </select>
        </div>
        <div class="col-xs-4">
            <input type="submit" name="submit" class="btn btn-success" value="Apply">
            <a class="btn btn-primary" href="posts.php?source=add_post">Add New</a>
        </div>
        <thead>
            <tr>
                <th><input id="selectAllBoxes" type="checkbox"></th>
                <th>ID</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Title</th>
                <th>Post Views</th>
                <th>Category</th>
                <th>Status</th>
                <th>Featured</th>
                <th>Image</th>
                <th>Tags</th>
                <th>Comments</th>
                <th>Date</th>
                <th>View</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php Posts::showPosts(); ?>
        </tbody>
    </table>
</form>
<ul class="pager">

    <?php Posts::pager(); ?>

</ul>
<?php Posts::deletePosts(); ?>
<?php } // END IF STATEMENT - ONLY ADMIN CAN VIEW THIS PAGE  ?>