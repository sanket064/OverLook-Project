<?php

$arrUpdatePosts = Posts::updatePosts();

?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input value="<?php echo $arrUpdatePosts['post_title']; ?>" type="text" class="form-control"
            name="post_title" />
    </div>

    <div class="form-group">
        <select name="post_category" id="">
            <?php $selectCategories = Categories::checkCategoryStatus();
            
            while($row = mysqli_fetch_assoc($selectCategories)){
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
                $category = ($arrUpdatePosts['post_category_id'] == $cat_id) ? 'selected' : '';
                echo "<option value='{$cat_id}' {$category}>{$cat_title}</option>";
            }
            ?>
        </select>
    </div>


    <div class="form-group">
        <label for="title">Post Price</label>
        <input value="<?php echo $arrUpdatePosts['post_price']; ?>" type="text" class="form-control"
            name="post_price" />
    </div>
    <div class="form-group">
        <label for="title">Items In Stock</label>
        <input value="<?php echo $arrUpdatePosts['post_qty']; ?>" type="text" class="form-control" name="post_qty" />
    </div>
    <div class="form-group">
        <select name="post_status" id="">
            <option value='<?php echo $arrUpdatePosts['post_status']; ?>'><?php echo $arrUpdatePosts['post_status']; ?>
            </option>
            <?php Posts::showPostStatus(); ?>
        </select>
    </div>
    <div class="form-group">
        <select name="post_featured" id="">
            <option value="<?php $arrUpdatePosts['post_featured']; ?>"><?php if($arrUpdatePosts['post_featured'] == 0){
              echo "Not Featured";  
            } else {
                echo "Featured";
            } ?></option>
            <option value='0'>Remove From Featured</option>
            <option value='1'>Add To Featured</option>
        </select>
    </div>

    <div class="form-group">
        <img width="100" src="../assets/<?php echo $arrUpdatePosts['post_image']; ?>">
        <input type="file" name="post_image">
    </div>

    <div class="form-group">
        <label for="title">Post Tags</label>
        <input value="<?php echo $arrUpdatePosts['post_tags']; ?>" type="text" class="form-control" name="post_tags" />
    </div>

    <div class="form-group">
        <label for="post_category">Post Content</label>
        <textarea class="form-control" name="post_content" cols="30" rows="10"
            id="body"><?php echo $arrUpdatePosts['post_content']; ?></textarea>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="update_post" value="Publish Post" />
    </div>
</form>