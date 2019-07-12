<?php
Class Orders 
{
    public static function pager() {
        
        $invoice_query_count = "SELECT * FROM invoices";
        $find_count = mysqli_query(ConnectToDb::con(), $invoice_query_count);
        $count = mysqli_num_rows($find_count);
        $count = ceil($count / 5);
        for($i =1; $i <= $count; $i++) {
            echo "<li><a href='orders.php?page={$i}'>{$i}</a></li>";
        }

}
    public static function showOrders() {
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
        $query = "SELECT * FROM invoices LIMIT $page_1, 5 ";
        $select_orders = mysqli_query(ConnectToDb::con(), $query);
        while($row = mysqli_fetch_assoc($select_orders)){
        $invoice_id = $row['invoice_id'];
        $invoice_number = $row['invoice_number'];
        $invoice_date = $row['invoice_date'];
        $invoice_name = $row['invoice_name'];
        $invoice_price = $row['invoice_price'];
        $invoice_email = $row['invoice_email'];
        $invoice_fullfilled = $row['invoice_fullfilled'];
      
        echo "<tr>";
        ?>
<td><input class='checkBoxes' id='selectAllBoxes' type='checkbox' name='checkBoxArray[]'
        value='<?php echo $invoice_id; ?>'></td>
<?php
            if ($invoice_fullfilled == 'Complete') {
                echo "<td class='bg-success'>{$invoice_id}</td>";
                echo "<td class='bg-success'>{$invoice_number}</td>";
                echo "<td class='bg-success'>{$invoice_date}</td>";
                echo "<td class='bg-success'>{$invoice_name}</td>";
                echo "<td class='bg-success'>{$invoice_price}</td>";
                echo "<td class='bg-success'>{$invoice_email}</td>";
                echo "<td class='bg-success'>{$invoice_fullfilled}</td>";
                echo "<td class='bg-success'><a href='orders.php?source=edit_order&p_id={$invoice_id}'>Edit</a></td>";  
                echo "<td class='bg-success'><a href='../index.php?controller=cart&action=showInvoice&nInvoiceNumber=".$invoice_number."'>View Invoice</a></td>"; 

                //echo "<td class='bg-success'><a href='www.vikrantrajan.com/rainbowtique/index.php?controller=cart&action=showInvoice&nInvoiceNumber=".$invoice_number."'>View Post</a></td>"; 
                echo "<td class='bg-success'><a onClick=\"javascript: return confirm('Are you sure you want to delete this?');\" href='orders.php?delete={$invoice_id}'>Delete</a></td>";
                
            } else 
            {

                echo "<td>{$invoice_id}</td>";
                echo "<td>{$invoice_number}</td>";
                echo "<td>{$invoice_date}</td>";
                echo "<td>{$invoice_name}</td>";
                echo "<td>{$invoice_price}</td>";
                echo "<td>{$invoice_email}</td>";
                echo "<td>{$invoice_fullfilled}</td>";
                echo "<td><a href='orders.php?source=edit_order&p_id={$invoice_id}'>Edit</a></td>";  
                echo "<td><a href='../index.php?controller=cart&action=showInvoice&nInvoiceNumber=".$invoice_number."'>View Invoice</a></td>"; 

                //echo "<td class='bg-success'><a href='www.vikrantrajan.com/rainbowtique/index.php?controller=cart&action=showInvoice&nInvoiceNumber=".$invoice_number."'>View Post</a></td>"; 
                echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete this?');\" href='orders.php?delete={$invoice_id}'>Delete</a></td>";
            }
            echo "</tr>";
        } 
    }


    public static function deleteOrders() 
    {
        // global $connection;
        if(isset($_GET['delete']))
        {
        $delete_post_id = $_GET['delete'];
        $query = "DELETE FROM invoices WHERE invoice_id = {$delete_post_id}";
        $delete_query = mysqli_query(ConnectToDb::con(), $query);
        header('location: orders.php');
        }
    }

    public static function updateOrders() 
    {
        
        // global $connection;
        if(isset($_GET['p_id'])){
            $edit_order_id = $_GET['p_id'];
        }
        $query = "SELECT * FROM invoices WHERE invoice_id = $edit_order_id";
        $select_order_id = mysqli_query(ConnectToDb::con(), $query);
        
        while($row = mysqli_fetch_assoc($select_order_id)){
           
            $invoice_id = $row['invoice_id'];
            $invoice_number = $row['invoice_number'];
            $invoice_date = $row['invoice_date'];
            $invoice_name = $row['invoice_name'];
            $invoice_price = $row['invoice_price'];
            $invoice_email = $row['invoice_email'];
            $invoice_fullfilled = $row['invoice_fullfilled'];
           $arrUpdateOrders = $row;
           
        }
        
        if(isset($_POST['update_order'])){
            //$invoice_id = $_POST['invoice_id'];
            // $invoice_number = $row['invoice_number'];
            // $invoice_date = $row['invoice_date'];
            // $invoice_name = $row['invoice_name'];
            // $invoice_price = $row['invoice_price'];
            // $invoice_email = $row['invoice_email'];
            $invoice_fullfilled = $_POST['invoice_fullfilled'];
            
            $query = "UPDATE invoices SET ";
            // $query .="invoice_number = '{$invoice_number}', ";
            // $query .="invoice_date = {$invoice_date}, ";
            // $query .="invoice_name = {$invoice_name}, ";
            // $query .="invoice_price = '{$invoice_price}', ";
            
            
            $query .="invoice_fullfilled = '{$invoice_fullfilled}' ";
            $query .="WHERE invoice_id = {$edit_order_id} ";
            $update_order = mysqli_query(ConnectToDb::con(),$query);
            // echo $query;
            // die;
            QueryCheck::confirmQuery($update_order);
            if($update_order){
                
             echo "<p class='text-success bg-success'>Order Updated: <a href='../index.php?controller=cart&action=showInvoice&nInvoiceNumber=".$invoice_number."'>View Invoice</a> Or <a href='orders.php'>Update More Orders</a></p>";
        }
        }
        
        return $arrUpdateOrders;
        
    }

    
    
   
}
?>