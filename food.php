<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">
           <h1>Add food</h1>
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
                        <input type="submit" name="submit" value="Add food " class="btn-primary">
                    </td>
                    
                </tr>
            </table>
        </form>
        
<?php
error_reporting(0);
if(isset($_POST['submit']))
{
    echo $title= $_POST['title'];
    echo $descript= $_POST['descript'];
    echo $price= $_POST['price'];
    echo $category_id= $_POST['category_id'];

    if (isset($_POST['featured']))
    {
        $featured = $_POST['featured'];
    }

    else{
        $featured='no';
    }
    if (isset($_POST['active']))
    {
        $active = $_POST['active'];
    }
    else{
        $active='no';
    }
}
    
if(isset($_POST['submit']))
{
echo $title= $_POST['title'];
echo $descript= $_POST['descript'];
echo $price= $_POST['price'];
echo $category_id= $_POST['category_id'];
echo $featured= $_POST['featured'];
echo $active= $_POST['active'];


    $sql= "INSERT INTO tbl_food SET
         title='$title',
         descript='$descript',
         price='$price',
         category_id='$category_id',
         featured='$featured',
         active='$active'   
          ";

$res=mysqli_query($conn, $sql);
if($res==true){
$_SESSION['add'] = "food added successfully";
header("location".SITEURL.'admin/manage_food.php');
}
else{
    $_SESSION['add'] = "unsuccessfull";
    header("location".SITEURL.'admin/manage_food.php');
}
}   
?>
</div>
</div>

<?php include('partials/footer.php');?>
