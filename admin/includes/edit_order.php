<?php

$arrUpdateOrders = Orders::updateOrders();

?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Invoice Number</label>
        <input value="<?php echo $arrUpdateOrders['invoice_number']; ?>" type="text" class="form-control"
            name="invoice_number" readonly />
    </div>
    <div class="form-group">
        <label for="title">Cutomer Name</label>
        <input value="<?php echo $arrUpdateOrders['invoice_name']; ?>" type="text" class="form-control"
            name="invoice_name" readonly />
    </div>
    <div class="form-group">
        <label for="title">Cutomer Name</label>
        <input value="<?php echo $arrUpdateOrders['invoice_email']; ?>" type="text" class="form-control"
            name="invoice_email" readonly />
    </div>
    <div class="form-group">
        <label for="title">Total Price</label>
        <input value="<?php echo $arrUpdateOrders['invoice_price']; ?>" type="text" class="form-control"
            name="invoice_price" readonly />
    </div>
    <div class="form-group">
        <select name="invoice_fullfilled" id="">
            <option value="<?php echo $arrUpdateOrders['invoice_fullfilled']; ?>">
                <?php echo $arrUpdateOrders['invoice_fullfilled']; ?>
            </option>
            <?php if($arrUpdateOrders['invoice_fullfilled'] == 'Complete') {
            echo "<option value='Pending'>Pending</option>";
        } else {
            echo "<option value='Complete'>Complete</option>";
        } ?>
        </select>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="update_order" value="Update Order" />
    </div>
</form>