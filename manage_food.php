<?php include('partials/menu.php');?>
<div class="main-content">
<div class="wrapper">
<h1>Manage Food</h1>
</br>
<?php
   if(isset($_SESSION['add']))
{
   
   echo $_SESSION['add'];
   unset($_SESSION['add']);
}


?>
</br></br>
<a href="food.php" class="btn-primary">Add food</a>
</br>
</br>
</br>
</br>
<table class="tbl">
    <tr>
        <th>sn</th>
        <th>title</th>
        <th>descript</th>
        <th>price</th>
        <th>category_id</th>
        <th>featured</th>
        <th>active</th>
        <th>Actions</th>
    </tr>
    <?php
    error_reporting(0);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }   
    $sql = "SELECT * FROM tbl_food";
    $res1 = mysqli_query($conn, $sql);
    if($res1==TRUE)
    {
        $count=mysqli_num_rows($res1);
        $sn=1;
    } else {
        die("Connection failed: " . mysqli_connect_error());
    }   

        while($row=mysqli_fetch_assoc($res1))
        { 
            
            $id=$row['id'];
            $title= $row['title'];
            $descript=$row['descript'];
            $price=$row['price'];
            $category_id=$row['category_id'];
            $featured=$row['featured'];
            $active=$row['active'];
        

            ?>
                <tr>
                 <td><?php echo $sn++; ?></td>
                 <td><?php echo $title; ?></td>
                 <td><?php echo $descript; ?></td>
                 <td><?php echo $price; ?></td>
                 <td><?php echo $category_id; ?></td>
                 <td><?php echo $featured; ?></td>
                 <td><?php echo $active; ?></td>
            
                 <td>
           <a href="<?php echo SITEURL;?>admin/update_food.php?id=<?php echo $id; ?>" class="btn-secondary">Update Food</a>
           <a href="<?php echo SITEURL;?>admin/delete_food.php?id=<?php echo $id; ?>" class="btn-secondary">Delete Food</a>
           </td>
             
                </tr>
            
        <?php

        }
    
    ?>
    
</table>
</div>
</div>
<?php include('partials/footer.php'); ?>
