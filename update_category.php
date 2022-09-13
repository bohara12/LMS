<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update category</h1>
           </br></br>
           <?php
           $sql = "SELECT * FROM tbl_category";
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
                   $title=$res['title'];
                   $featured=$res['featured'];
                   $active=$res['active'];

               }
           ?>
        <form action="" method="post">
            <table class="tbl-30">
            <tr>
                    <td>Title</td>
                    <td> <input type="text"  name="title" placeholder="enter your title"></td>
                </tr>

                <tr>
                    <td>Featured</td>
                    <td>
                        <input type="radio" name="featured" value="yes">yes
                        <input type="radio" name="featured" value="no">No
                </td>
                </tr>
                <tr>
                    <td>Active</td>
                    <td>
                        <input type="radio" name="active" value="yes">yes
                        <input type="radio" name="active" value="no">No
                    </td>


                </tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="update category" class="btn btn-secondary">
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
                    echo $featured=$_POST['featured'];
                    echo $active=$_POST['active'];

                    $sql ="UPDATE tbl_category SET
                    title='$title',
                    featured='$featured',
                    active='$active'
                    where id=$id
                    ";

                    $res = mysqli_query($conn, $sql);
                    if($res1==TRUE)
                    {
                $_session['update']="<div class='success'>Category Updated Successfully.</div>";
                header('location:'.SITEURL.'admin/manage_category.php');
                    }
                    else{
                        $_session['update']="<div class='error'>Category failed to update.</div>";
                        header('location:'.SITEURL.'admin/manage_category.php');
                    }
    }
    ?>

<?php include('partials/footer.php'); ?>