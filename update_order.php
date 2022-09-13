<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Order</h1>
           </br></br>
           <?php
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
                        <input type="submit" name="submit" value="Update Order" class="btn-primary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
    </div>
    <?php

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
        $customer_address= $_POST['cuser_address'];
    
                    $sql ="UPDATE tbl_order SET
                     food='$food',
                     price='$price',
                     qty='$qty',
                     order_date='$order_date',
                     status='$status',
                     customer_name='$customer_name',
                     customer_contact='$customer_contact',
                     customer_email='$customer_email',
                     customer_address='$customer_address',
                     where id=$id
                    ";

                    $res = mysqli_query($conn, $sql);
                    if($res1==TRUE)
                    {
                $_session['update']="<div class='success'>order Updated Successfully.</div>";
                header('location:'.SITEURL.'admin/manage_order.php');
                    }
                    else{
                        $_session['update']="<div class='error'>Order failed to update.</div>";
                        header('location:'.SITEURL.'admin/manage_order.php');
                    }
    }
    ?>

<?php include('partials/footer.php'); ?>