<?php include('partials/menu.php');?>
<div class="main-content">
<div class="wrapper">
<h1>Manage Order</h1>
</br>
<?php
   if(isset($_SESSION['add']))
{
   
   echo $_SESSION['add'];
   unset($_SESSION['add']);
}
?>
</br></br>
<a href="order.php" class="btn-primary">Add Order</a>
</br>
</br>
</br>
</br>
<table class="tbl">
    <tr>
        <th>food</th>
        <th>price</th>
        <th>qty</th>
        <th>order_date</th>
        <th>status</th>
        <th>customer_name</th>
        <th>customer_contact</th>
        <th>customer_email</th>
        <th>customer_address</th>
        <th>Actions</th>
    </tr>
    <?php
    error_reporting(0);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }   

    
    $sql = "SELECT * FROM tbl_order";
    $res1 = mysqli_query($conn, $sql);
    if($res1==TRUE)
    {
        $count=mysqli_num_rows($res1);
        echo "Total Recor d:" . $count;
    } else {
        die("Connection failed: " . mysqli_connect_error());
    }   

       
        while($res=mysqli_fetch_assoc($res1))
        { 
        
            $id=$res['id'];
            $food=$res['food'];
            $price=$res['price'];
            $qty=$res['qty'];
            $order_date=$res['order_date'];
            $status=$res['status'];
            $customer_name=$res['customer_name'];
            $customer_contact=$res['customer_contact'];
            $customer_email=$res['customer_email'];
            $customer_address=$res['customer_address'];


            ?>
    
            <tr>

                 <td><?php echo $food; ?></td>
                 <td><?php echo $price; ?></td>
                 <td><?php echo $qty; ?></td>
                 <td><?php echo $order_date; ?></td>
                 <td><?php echo $status; ?></td>
                 <td><?php echo $customer_name; ?></td>
                 <td><?php echo $customer_contact; ?></td>
                 <td><?php echo $customer_email; ?></td>
                 <td><?php echo $customer_address; ?></td>

                 <td>
           <a href="<?php echo SITEURL;?>admin/update_order.php?id=<?php echo $id; ?>" class="btn-secondary">Update Order</a>
           <a href="<?php echo SITEURL;?>admin/delete_order.php?id=<?php echo $id; ?>" class="btn-secondary">Delete Order</a>
           </td>


            </tr>

        <?php

        }
    
    ?>
    
</table>
</div>
</div>
<?php include('partials/footer.php'); ?>
