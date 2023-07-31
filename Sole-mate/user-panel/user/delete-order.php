<?php

include 'connect.php';

if(isset($_GET['deleteid'])){
	$id=$_GET['deleteid'];
	$sql="delete from `tbl_order` where id=$id";
	$result=mysqli_query($con,$sql);
	if($result){
		header('location:manage-order.php');
	}else{
		die(mysqli_error($con));
	}
}

?>