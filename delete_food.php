<?php 
include('../config/constant.php');
echo $id=$_GET['id'];
$sql ="DELETE FROM tbl_food where id=$id";
$res1 =mysqli_query($conn, $sql);

if($res1==TRUE)
{
    echo "Food Deleted Successfully";
}
else{
    echo "Failed to Deleted";
}

?>