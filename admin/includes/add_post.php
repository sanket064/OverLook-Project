<?php Posts::createPosts(); ?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Product Title</label>
        <input type="text" class="form-control" name="post_title" />
    </div>

    <div class="form-group">
        <select name="post_category" id="">
            <option value="">Select Category</option>
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
        <label for="title">Product Price</label>
        <input value="" type="text" class="form-control" name="post_price" />
    </div>
    <div class="form-group">
        <label for="title">Product Stock Quantity</label>
        <input value="" type="text" class="form-control" name="post_qty" />
    </div>
    <div class="form-group">
        <label for="title">Product SKU no.</label>
        <input value="" type="text" class="form-control" name="post_sku" />
    </div>
    <div class="form-group">
        <select name="post_status" id="">
            <option value="">Product Status</option>
            <option value='Draft'>Draft</option>
            <option value='Published'>Published</option>
        </select>
    </div>
    <div class="form-group">
        <select name="post_featured" id="">
            <option value="">Featured Product Status</option>
            <option value='0'>Not Featured</option>
            <option value='1'>Featured</option>
        </select>
    </div>
    <div class="form-group">
        <label for="title">Product Image</label>
        <input type="file" name="post_image" />
    </div>

    <div class="form-group">
        <label for="title">Product Tags</label>
        <input type="text" class="form-control" name="post_tags" />
    </div>

    <div class="form-group">
        <label for="post_category">Product Description</label>
        <textarea class="form-control" name="post_content" cols="30" rows="10" id="body"></textarea>
    </div>


    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_post" value="Publish Post" />
    </div>
</form>