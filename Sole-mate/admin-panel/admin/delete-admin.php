<?php 

include('../config/constants.php');

$id = $_GET['id'];

$sql = "DELETE FROM tbl_admin WHERE id=$id";

$res = mysqli_query($conn, $sql);

if($res==true)
{

$_SESSION['delete'] = "<div class='success'>Admin Successfully Deleted.</div>";
header('location:'.SITEURL.'admin-panel/admin/manage-admin.php');

}

else
{

$_SESSION['delete'] = "<div class='error'>Admin Not Deleted.</div>";
header('location:'.SITEURL.'admin-panel/admin/manage-admin.php');


}

 ?>