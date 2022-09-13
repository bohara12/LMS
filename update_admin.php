<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update admin</h1>
           </br></br>
           <?php
           $id=$_GET['id'];
           $sql = "SELECT * FROM tbl_admin";
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
                   $full_name=$res['full_name'];
                   $username=$res['username'];

               }
           ?>
        <form action="" method="post">
            <table class="tbl-30">
                <tr>
                    <td>Full Name</td>
                    <td> <input type="text"  name="full_name" value="<?php echo $full_name; ?>"></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" value="<?php echo $username; ?>"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="update admin" class="btn btn-secondary">
                    </td>
                 </tr>

              
            </table>
        </form>



        </form>
    </div>
    </div>
    <?php

    if(isset($_POST['submit']))
    {
                    
                    echo $id = $_POST['id'];
                    echo $full_name=$_POST['full_name'];
                    echo $username=$_POST['username'];

                    $sql ="UPDATE tbl_admin SET
                    full_name='$full_name',
                    username='$username'
                    where id=$id
                    ";

                    $res = mysqli_query($conn, $sql);
                    if($res1==TRUE)
                    {
                $_session['update']="<div class='success'>Admin Updated Successfully.</div>";
                header('location:'.SITEURL.'admin/manage_admin.php');
                    }
                    else{
                        $_session['update']="<div class='error'>Admin failed to update.</div>";
                        header('location:'.SITEURL.'admin/manage_admin.php');
                    }
    }
    ?>

<?php include('partials/footer.php'); ?>