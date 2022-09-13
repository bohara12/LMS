<?php include('partials/menu.php');?>
<div class="main-content">
<div class="wrapper">
<h1>Manage Category</h1>
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

?>
</br></br>
<a href="category.php" class="btn-primary">Add Category</a>
</br>
</br>
</br>
</br>
<table class="tbl">
    <tr>
       <th>sn</th>
        <th>title</th>
        <th>featured</th>
        <th>active</th>
        <th>actions</th>
    </tr>
    <?php
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }   
    $sql = "SELECT * FROM tbl_category";
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
            $id=$res['id'];
            $title=$res['title'];
            $featured=$res['featured'];
            $active=$res['active'];

            ?>
    
            <tr>
           
                   <td><?php echo $sn++ ?></td>
                 <td><?php echo $title; ?></td>
                 <td><?php echo $featured; ?></td>
                 <td><?php echo $active; ?></td>
            
            <td>
           <a href="<?php echo SITEURL;?>admin/update_category.php?id=<?php echo $id; ?>" class="btn-secondary">Update Category</a>
           <a href="<?php echo SITEURL;?>admin/delete_category.php?id=<?php echo $id; ?>" class="btn-secondary">Delete Category</a>
           </td>
         </tr>
        <?php

        }
    
    ?>
    
</table>
</div>
</div>
<?php include('partials/footer.php'); ?>
