<?php



	$con=new mysqli('localhost','root', '','menu'); 

if(isset($_GET['markid'])){
	$id=$_GET['markid'];
	$sql="update `tbl_order` set activity=2 where id=$id ";
	$result=mysqli_query($con,$sql);
	if($result){
		header('location:manage-order.php');
	}else{
		die(mysqli_error($con));
	}
}

?>
?>