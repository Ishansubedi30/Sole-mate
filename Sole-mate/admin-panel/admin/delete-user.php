<?php 

include('../config/constants.php');

$id = $_GET['id'];

$sql = "DELETE FROM tbl_user WHERE id=$id";

$res = mysqli_query($conn, $sql);

if($res==true)
{

$_SESSION['delete'] = "<div class='success'>User Successfully Deleted.</div>";
header('location:'.SITEURL.'admin-panel/admin/manage-user.php');

}

else
{

$_SESSION['delete'] = "<div class='error'>User Not Deleted.</div>";
header('location:'.SITEURL.'admin-panel/admin/manage-user.php');


}

 ?>