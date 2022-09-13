<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
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
                    <td>Full Name</td>
                    <td> <input type="text"  name="full_name" placeholder="enter your name"></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" placeholder="enter your username"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="text" name="password" placeholder=""></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin " class="btn-primary">
                    </td>
                    
                </tr>
            </table>
        </form>
    </div>

</div>

<?php include('partials/footer.php');?>
<?php
if(isset($_POST['submit']))
{
    echo $full_name= $_POST['full_name'];
    echo $username= $_POST['username'];
    echo $password= $_POST['password'];

    $sql= "INSERT INTO tbl_admin SET
    full_name='$full_name',
    username='$username',
    password='$password'
    ";

$res=mysqli_query($conn, $sql) or die(mysqli_error());
if($res==TRUE){
$_SESSION['add'] = "Admin added successfully";
header("location:".SITEURL.'admin/manage_admin.php');
}
else{
    $_SESSION['add'] = "unsuccessfull";
    header("location".SITEURL.'admin/add_admin.php');
}
}


?>