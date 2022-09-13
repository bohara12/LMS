<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Food</h1>
           </br></br>
           <?php
           error_reporting(0);
           if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
          }   
           $sql = "SELECT * FROM tbl_food";
           $res1 = mysqli_query($conn, $sql);
           if($res1==TRUE)
           {
               $count = mysqli_num_rows($res1);
               $sn=1;
           } else {
               die("Connection failed: " . mysqli_connect_error());
           }   
       
               while($row=mysqli_fetch_assoc($res1))
               { 
                   $id=$row['id'];
                   $title=$row['title'];
                   $descript=$row['descript'];
                   $price=$row['price'];
                   $category_id=$row['category_id'];
                   $featured=$row['featured'];
                   $active=$row['active'];

               }
           ?>
       
       <form action="" method="post">
            <table class="tbl-30">
                <tr>
                    <td>Title</td>
                    <td> <input type="text"  name="title" placeholder="enter your title"></td>
                </tr>
                <tr>
                    <td>description</td>
                    <td> <input type="text"  name="descript" placeholder="enter your description"></td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td> <input type="text"  name="price" placeholder="enter your price"></td>
                </tr>
                <tr>
                    <td>category id</td>
                    <td> <input type="text"  name="category_id" placeholder="enter your id"></td>
                </tr>


                <tr>
                    <td>Featured</td>
                    <td>
                        <input type="radio" name="featured" value="yes">No
                        <input type="radio" name="featured" value="no">Yes
                    </td>
               </tr>
                <tr>
                    <td>Active</td>
                    <td>
                        <input type="radio" name="active" value="yes">No
                        <input type="radio" name="active" value="no">Yes
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Update food " class="btn-primary">
                    </td>       
                </tr>
            </table>
        </form>
   
    </div>
    </div>
    <?php

    if(isset($_POST['submit']))
    {
                    
                    echo $id = $_POST['id'];
                    echo $title=$_POST['title'];
                    echo $descript=$_POST['decript'];
                    echo $price=$_POST['price'];
                    echo $category_id=$_POST['category_id'];
                    echo $featured=$_POST['featured'];
                    echo $active=$_POST['active'];

                    $sql ="UPDATE tbl_food SET
                    title='$title',
                    discript='$discript',
                    price='$price',
                    category_id='$category_id',
                    featured='$featured',
                    active='$active'
                    where id=$id
                    ";

                    $res = mysqli_query($conn, $sql);
                    if($res1==TRUE)
                    {
                $_session['update']="<div class='success'>food Updated Successfully.</div>";
                header('location:'.SITEURL.'admin/manage_food.php');
                    }
                    else{
                        $_session['update']="<div class='error'>food failed to update.</div>";
                        header('location:'.SITEURL.'admin/manage_food.php');
                    }
    }
    ?>

<?php include('partials/footer.php'); ?>