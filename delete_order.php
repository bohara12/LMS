<?php 
include('../config/constant.php');
echo $id=$_GET['id'];
$sql ="DELETE FROM tbl_order where id=$id";
$res1 =mysqli_query($conn, $sql);

if($res1==TRUE)
{
    echo "Order Deleted Successfully";
}
else{
    echo "Failed to Deleted";
}

?>