<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Author</th>
            <th>Comment</th>
            <th>Email</th>
            <th>Status</th>
            <th>In Response to</th>
            <th>Date</th>
            <th>Approve</th>
            <th>Unapprove</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php Comments::showComments(); ?>
        <ul class="pager">
            <?php  Comments::pager(); ?>
        </ul>
    </tbody>
</table>
<?php Comments::updateComments(); ?>