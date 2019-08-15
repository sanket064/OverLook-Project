<?php

Class Posts 
{
    public static function pager() {
        
            $post_query_count = "SELECT * FROM posts";
            $find_count = mysqli_query(ConnectToDb::con(), $post_query_count);
            $count = mysqli_num_rows($find_count);
            $count = ceil($count / 5);
            for($i =1; $i <= $count; $i++) {
                echo "<li><a href='posts.php?page={$i}'>{$i}</a></li>";
            }

    }
    public static function showPosts() {
        // global $connection;
        if(isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = "";
        }
    
        if($page == "" || $page == 1) {
    
            $page_1 = 0;
        } else {
            $page_1 = ($page * 5) - 5;
        }

        $query = "SELECT * FROM posts  LIMIT $page_1, 5 ";
        $select_posts = mysqli_query(ConnectToDb::con(), $query);
        while($row = mysqli_fetch_assoc($select_posts)){
        $post_id = $row['post_id'];
        $post_qty = $row['post_qty'];
        $post_price = $row['post_price'];
        $post_title = $row['post_title'];
        $post_views_count = $row['post_views_count'];
        $post_category_id = $row['post_category_id'];
        $post_status = $row['post_status'];
        $post_image = $row['post_image'];
        $post_tags = $row['post_tags'];
        $post_comment_count = $row['post_comment_count'];
        $post_date = $row['post_date'];
        $post_featured = $row['post_featured'];
        echo "<tr>";
        ?>
<td><input class='checkBoxes' id='selectAllBoxes' type='checkbox' name='checkBoxArray[]'
        value='<?php echo $post_id; ?>'></td>
<?php
        if ($post_status == 'Published') {
            echo "<td class='bg-success text-success'>{$post_id}</td>";
            echo "<td class='bg-success text-success'>{$post_price}</td>";
            echo "<td class='bg-success text-success'>{$post_qty}</td>";
            echo "<td class='bg-success text-success'>{$post_title}</td>";
            echo "<td class='bg-success text-success'>{$post_views_count}</td>";
            $query = "SELECT * FROM categories WHERE cat_id = '{$post_category_id}'";
        $selectCategoriesID = mysqli_query(ConnectToDb::con(), $query);
            while($row = mysqli_fetch_assoc($selectCategoriesID)){
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
                echo "<td class='bg-success text-success'>{$cat_title}</td>";
            }
            echo "<td class='bg-success text-success'>{$post_status}</td>";
            if ($post_featured == 1) {

                echo "<td class='bg-success text-success'>Featured</td>";
            } else {
                echo "<td class='text-muted'>Not Featured</td>";
            }
            echo "<td class='bg-success'><img width='100' src='../assets/{$post_image}' alt='Entguide'></td>";
            echo "<td class='bg-success text-success'>{$post_tags}</td>";
            echo "<td class='bg-success text-success'>{$post_comment_count}</td>";
            echo "<td class='bg-success text-success'>{$post_date}</td>";  
            echo "<td class='bg-success text-success'><a href='../index.php?controller=pages&action=showproduct&productid={$post_id}'>View Post</a></td>"; 
            echo "<td class='bg-success text-success'><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";  
            echo "<td class='bg-success text-success'><a onClick=\"javascript: return confirm('Are you sure you want to delete this?');\" href='posts.php?delete={$post_id}'>Delete</a></td>";
            
        } else {

            echo "<td class='text-muted'>{$post_id}</td>";
            echo "<td class='text-muted'>{$post_price}</td>";
            echo "<td class='text-muted'>{$post_qty}</td>";
            echo "<td class='text-muted'>{$post_title}</td>";
            echo "<td class='text-muted'>{$post_views_count}</td>";
            $query = "SELECT * FROM categories WHERE cat_id = '{$post_category_id}'";
            $selectCategoriesID = mysqli_query(ConnectToDb::con(), $query);
                while($row = mysqli_fetch_assoc($selectCategoriesID)){
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
                    echo "<td class='text-muted'>{$cat_title}</td>";
                }
            // echo "<td>{$post_category_id}</td>";
            echo "<td class='text-muted'>{$post_status}</td>";  
            if ($post_featured == 1) {

                echo "<td class='text-muted'>Featured</td>";
            } else {
                echo "<td class='text-muted'>Not Featured</td>";
            }  
            echo "<td><img width='100' src='../assets/{$post_image}' alt='Entguide'></td>";
            echo "<td class='text-muted'>{$post_tags}</td>";
            echo "<td class='text-muted'>{$post_comment_count}</td>";
            echo "<td class='text-muted'>{$post_date}</td>";  
            echo "<td><a href='../index.php?controller=pages&action=showproduct&productid={$post_id}'>View Post</a></td>"; 
            echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";  
            echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete this?');\" href='posts.php?delete={$post_id}'>Delete</a></td>";
        }
        echo "</tr>";
        } 
    }

    public static function bulkCheckPosts() 
    {
    //     global $connection;
        if (isset($_POST['checkBoxArray'])) {
            
            foreach($_POST['checkBoxArray'] as $postIdValue) 
            {
            $bulkOptions = $_POST['bulk_options'];

                switch($bulkOptions) 
                {
                case 'reset';
                // $reset_post_id = $_GET['reset'];
                $query = "UPDATE posts SET post_views_count = 0 WHERE post_id =" . mysqli_real_escape_string(ConnectToDb::con(), $postIdValue) . " ";
                $reset_query = mysqli_query(ConnectToDb::con(), $query);
                QueryCheck::confirmQuery($reset_query);
                echo "<p class='text-success bg-success'>Post View Count Reset</p>";
                    break;

                    case 'Published';
                $query = "UPDATE posts SET post_status = '{$bulkOptions}' WHERE post_id = {$postIdValue} ";
                $update_published_status = mysqli_query(ConnectToDb::con(), $query);
                QueryCheck::confirmQuery($update_published_status);
                echo "<p class='text-success bg-success'>Post Published</p>";
                    break;

                    case '0';
                $query = "UPDATE posts SET post_featured = '{$bulkOptions}' WHERE post_id = {$postIdValue} ";
                $update_published_status = mysqli_query(ConnectToDb::con(), $query);
                QueryCheck::confirmQuery($update_published_status);
                echo "<p class='text-success bg-success'>Post Featuring Status Updated</p>";
                    break;

                    case '1';
                $query = "UPDATE posts SET post_featured = '{$bulkOptions}' WHERE post_id = {$postIdValue} ";
                $update_published_status = mysqli_query(ConnectToDb::con(), $query);
                QueryCheck::confirmQuery($update_published_status);
                echo "<p class='text-success bg-success'>Post Featuring Status Updated</p>";
                    break;

                    
                    case 'Draft';
                    $query = "UPDATE posts SET post_status = '{$bulkOptions}' WHERE post_id = {$postIdValue} ";
                    $update_draft_status = mysqli_query(ConnectToDb::con(), $query);
                    QueryCheck::confirmQuery($update_draft_status);
                    echo "<p class='text-success bg-success'>Post Updated</p>";
                    break;
                    
                    case 'delete';
                    $query = "DELETE FROM posts WHERE post_id = {$postIdValue} ";
                    $delete_status = mysqli_query(ConnectToDb::con(), $query);
                    QueryCheck::confirmQuery($delete_status);
                    echo "<p class='text-success bg-success'>Post Deleted</p>";
                    break;

                    case 'deleteOrder';
                    $query = "DELETE FROM invoices WHERE invoice_id = {$postIdValue} ";
                    $delete_invoice = mysqli_query(ConnectToDb::con(), $query);
                    QueryCheck::confirmQuery($delete_invoice);
                    echo "<p class='text-success bg-success'>Order Deleted</p>";
                    break;
                    
                    case 'Complete';
                $query = "UPDATE invoices SET invoice_fullfilled = '{$bulkOptions}' WHERE invoice_id = {$postIdValue} ";
                $update_published_status = mysqli_query(ConnectToDb::con(), $query);
                QueryCheck::confirmQuery($update_published_status);
                echo "<p class='text-success bg-success'>Order Completed</p>";
                    break;

                    case 'Pending';
                $query = "UPDATE invoices SET invoice_fullfilled = '{$bulkOptions}' WHERE invoice_id = {$postIdValue} ";
                $update_published_status = mysqli_query(ConnectToDb::con(), $query);
                // echo $query;
                // die;
                QueryCheck::confirmQuery($update_published_status);
                echo "<p class='text-success bg-success'>Order Updated</p>";
                    break;

                }
            }
            
        }
    }

    public static function deletePosts() 
    {
        // global $connection;
        if(isset($_GET['delete']))
        {
        $delete_post_id = $_GET['delete'];
        $query = "DELETE FROM posts WHERE post_id = {$delete_post_id}";
        $delete_query = mysqli_query(ConnectToDb::con(), $query);
        header('location: post.php');
        }
    }
    public static function resetPostViews() 
    {
        // global $connection;
        if(isset($_GET['reset']))
        {
        $reset_post_id = $_GET['reset'];
        $query = "UPDATE posts SET post_views_count = 0 WHERE post_id =" . mysqli_real_escape_string(ConnectToDb::con(), $reset_post_id) . " ";
        $reset_query = mysqli_query(ConnectToDb::con(), $query);
        header('location: post.php');
        }
    }

    public static function updatePosts() 
    {
        
        // global $connection;
        if(isset($_GET['p_id'])){
            $edit_post_id = $_GET['p_id'];
           
            

            $query = "SELECT * FROM posts WHERE post_id = $edit_post_id";
            $select_posts_id = mysqli_query(ConnectToDb::con(), $query);
            
            while($row = mysqli_fetch_assoc($select_posts_id)){
                
                $post_id = $row['post_id'];
                //    $post_author = $row['post_author'];
                $post_price = $row['post_price'];
                $post_qty = $row['post_qty'];
                $post_title = $row['post_title'];
                $post_category_id = $row['post_category_id'];
                $post_status = $row['post_status'];
                $post_image = $row['post_image'];
                $post_tags = $row['post_tags'];
                $post_content = $row['post_content'];
                $post_comment_count = $row['post_comment_count'];
                $post_date = $row['post_date'];
                $post_featured = $row['post_featured'];
                
                $arrUpdatePosts = $row;
            }
           
        }
        
        if(isset($_POST['update_post'])){
            $post_title = $_POST['post_title'];
            $post_category_id = $_POST['post_category'];
            $post_qty = $_POST['post_qty'];
            $post_status = $_POST['post_status'];
            $post_price = $_POST['post_price'];
            $post_image = $_FILES['post_image']['name'];
            // temporary file name while its stored on browser before uploading
            $post_image_temp = $_FILES['post_image']['tmp_name'];
            $post_tags = $_POST['post_tags'];
            $post_content = $_POST['post_content'];
            $post_featured = $_POST['post_featured'];

            move_uploaded_file($post_image_temp, "../assets/$post_image");
            // If the image field is empty then we check the database to see if there is an image and let the same image remain
            if(empty($post_image)){
                $query = "SELECT * FROM posts WHERE post_id = $edit_post_id ";
                $select_image = mysqli_query(ConnectToDb::con(), $query);
                while($row = mysqli_fetch_assoc($select_image)){
                    $post_image = $row['post_image'];
                }
            }
            
            $query = "UPDATE posts SET ";
            $query .="post_title = '{$post_title}', ";
            $query .="post_price = {$post_price}, ";
            $query .="post_qty = {$post_qty}, ";
            $query .="post_category_id = '{$post_category_id}', ";
            $query .="post_date = now(), ";
            
            $query .="post_status = '{$post_status}', ";
            $query .="post_tags = '{$post_tags}', ";
            $query .="post_content = '{$post_content}', ";
            $query .="post_featured = {$post_featured}, ";
            $query .="post_image = '{$post_image}' ";
            $query .="WHERE post_id = {$edit_post_id} ";
            mysqli_real_escape_string(ConnectToDb::con(), $query);
            $update_post = mysqli_query(ConnectToDb::con(),$query);
            // echo $query;
            QueryCheck::confirmQuery($update_post);
            if($update_post){
                
             echo "<p class='text-success bg-success'>Post Updated: <a href='../index.php?controller=pages&action=showproduct&productid={$edit_post_id}'>View Post</a> Or <a href='posts.php'>Edit More Posts</a></p>";
        }
        }
        
        return $arrUpdatePosts;
        
    }

    
    
    public static function showPostStatus() {
        // global $connection;
        $query = "SELECT * FROM posts";
        
        $select_posts_id = mysqli_query(ConnectToDb::con(), $query);
        while($row = mysqli_fetch_assoc($select_posts_id)){
            $post_status = $row['post_status'];
            
        }
        if($post_status == 'Published') {
            echo "<option value='Draft'>Draft</option>";
        } else {
            echo "<option value='Published'>Published</option>";
        }
        


}

public static function createPosts() {
// global $connection;
if(isset($_POST['create_post'])){

$post_title = $_POST['post_title'];
$post_category_id = $_POST['post_category'];
$post_qty = $_POST['post_qty'];
$post_sku = $_POST['post_sku'];
$post_featured = $_POST['post_featured'];
$post_price = $_POST['post_price'];
$post_status = $_POST['post_status'];
$post_image = $_FILES['post_image']['name'];
// temporary file name while its stored on browser before uploading
$post_image_temp = $_FILES['post_image']['tmp_name'];
$post_tags = $_POST['post_tags'];
$post_content = $_POST['post_content'];
$post_date = date('d-m-y');
$post_comment_count = 0;


move_uploaded_file($post_image_temp, "../assets/$post_image");
$query = "INSERT INTO posts(
post_category_id,
post_title,
post_qty,
post_price,
post_sku,
post_featured,
post_date,
post_image,
post_content,
post_tags,
post_comment_count,
post_views_count,
post_status)";
$query .= "VALUES(
'{$post_category_id}',
'{$post_title}',
{$post_qty},
{$post_price},
{$post_sku},
{$post_featured},
now(),
'{$post_image}',
'{$post_content}',
'{$post_tags}',
'{$post_comment_count}',
0,
'{$post_status}')";

$postQuery = mysqli_query(ConnectToDb::con(), $query);
// var_dump($query);
// die;
QueryCheck::confirmQuery($postQuery);
$the_post_id = mysqli_insert_id(ConnectToDb::con());
echo "<p class='text-success bg-success'>Post Updated: <a href='index.php?controller=pages&action=showproduct&productid={$the_post_id}'>View Post</a> Or <a
        href='posts.php'>Edit More Posts</a></p>";


}
}
}


?>