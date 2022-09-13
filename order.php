<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">
           <h1>Add food</h1>
           <?php
       if(isset($_SESSION['add']))
         {
       echo $_SESSION['add'];
       unset($_SESSION['add']);
        }
        
          ?>
             <form action="" method="post">
             <table class="tbl-30">
                
             <tr>
                    <td>Food</td>
                    <td> <input type="text"  name="food" placeholder="enter your food"></td>
                </tr>

                <tr>
                    <td>Price</td>
                    <td> <input type="text"  name="price" placeholder="enter your price"></td>
                </tr>
                <tr>
                    <td>Quantity</td>
                    <td> <input type="text"  name="qty" placeholder="enter your quantity"></td>
                </tr>
              
                <tr>
                    <td>Order Date</td>
                    <td> <input type="text"  name="order_date" placeholder=""></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td> <input type="text"  name="status" placeholder=""></td>
                </tr>
                <tr>
                    <td>Customer Name</td>
                    <td> <input type="text"  name="customer_name" placeholder=""></td>
                </tr>
                <tr>
                    <td>Customer Contact</td>
                    <td> <input type="text"  name="customer_contact" placeholder=""></td>
                </tr>
                <tr>
                    <td>Customer Email</td>
                    <td> <input type="text"  name="customer_email" placeholder=""></td>
                </tr>
                <tr>
                    <td>Customer Address</td>
                    <td> <input type="text"  name="customer_address" placeholder=""></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Order" class="btn-primary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include('partials/footer.php');?>
<?php
error_reporting(0);

 if(isset($_POST['submit']))
 {
      $food= $_POST['food'];
      $price= $_POST['price'];
      $qty= $_POST['qty'];
      $order_date= $_POST['order_date'];
      $status= $_POST['status'];
      $customer_name= $_POST['customer_name'];
      $customer_contact= $_POST['customer_contact'];
      $customer_email= $_POST['customer_email'];
      $customer_address= $_POST['customer_address'];
 }
    

    $sql= "INSERT INTO tbl_order SET
         food='$food',
         price='$price',
         qty='$qty',
         order_date='$order_date',
         status='$status',
         customer_name='$customer_name',
         customer_contact='$customer_contact',
         customer_email='$customer_email',
         customer_address='$customer_address'

    ";

$res=mysqli_query($conn, $sql);
if($res==true){
$_SESSION['add'] = "Food added successfully";
header("location".SITEURL.'admin/manage_order.php');
}
else{
    $_SESSION['add'] = "Unsuccessfull";
    header("location".SITEURL.'admin/add_order.php');
}



?>