<?php include('partials/menu.php');?>
<div class="main-content">
<div class="wrapper">
<h1>Manage Admin</h1>
</br>

<?php
   if(isset($_SESSION['add']))
{
   
   echo $_SESSION['add'];
   unset($_SESSION['add']);
}
if(isset($_SESSION['delete']))
{
   
   echo $_SESSION['delete'];
   unset($_SESSION['delete']);
}
if(isset($_SESSION['update']))
{
   
   echo $_SESSION['update'];
   unset($_SESSION['update']);
}
if(isset($_SESSION['user not found']))
{
   
   echo $_SESSION['user not found'];
   unset($_SESSION['user not found']);
}
if(isset($_SESSION['password not match']))
{
   
   echo $_SESSION['password not match'];
   unset($_SESSION['password not match']);
}

?>
</br></br>
<a href="admin.php" class="btn-primary">Add Admin</a>
</br>
</br>
</br>
</br>
<table class="tbl">
    <tr>
        <th>id</th>
        <th>full name</th>
        <th>username</th>
        <th>actions</th>
    </tr>
    <?php
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }   
    $sql = "SELECT * FROM tbl_admin";
    $res1 = mysqli_query($conn, $sql);
    if($res1==TRUE)
    {
        $count=mysqli_num_rows($res1);
        $sn=1;
    } else {
        die("Connection failed: " . mysqli_connect_error());
    }   

        while($res=mysqli_fetch_assoc($res1))
        { 
            $id = $res['id'];
            $full_name=$res['full_name'];
            $username=$res['username'];

            ?>
            <tr>
                 <td><?php echo $sn++; ?></td>
                 <td><?php echo $full_name; ?></td>
                 <td><?php echo $username; ?></td>
           <td>
           <a href="<?php echo SITEURL;?>admin/update_password.php?id=<?php echo $id; ?>" class="btn-secondary">change password</a>
           <a href="<?php echo SITEURL;?>admin/update_admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
           <a href="<?php echo SITEURL;?>admin/delete_admin.php?id=<?php echo $id; ?>" class="btn-secondary">Delete Admin</a>
           </td>

        <?php

        }
    
    ?>
    
</table>
</div>
</div>
<?php include('partials/footer.php'); ?>
