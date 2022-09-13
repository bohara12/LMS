<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>
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

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category " class="btn-primary">
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
   
    echo $title= $_POST['title'];


       if(isset($_POST['featured']))
       {
       $featured=$_POST['featured'];
        }
      else{
        $featured='no';
         }
      if (isset($_POST['active']))
      {
      $active=$_POST['active'];
       }
      else{
         $active='no';
      }
    }

if(isset($_POST['submit']))
         {
    echo $title= $_POST['title'];
    echo $featured= $_POST['featured'];
    echo $active= $_POST['active'];

    $sql= "INSERT INTO  tbl_category SET
    title='$title',
    featured='$featured',
    active='$active'
    ";

$res=mysqli_query($conn, $sql);
if($res==true){
$_SESSION['add'] = "Category added successfully";
header("location".SITEURL.'admin/manage_category.php');
}
else{
    $_SESSION['add'] = "unsuccessfull";
    header("location".SITEURL.'admin/manage_category.php');
}
  }

?>