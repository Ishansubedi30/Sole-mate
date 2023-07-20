<?php



	$con=new mysqli('localhost','root', '','menu'); 

if(isset($_GET['doneid'])){
	$id=$_GET['doneid'];
	$sql="update `tbl_order` set activity=0 where id=$id ";
	$result=mysqli_query($con,$sql);
	if($result){
		header('location:manage-order.php');
	}else{
		die(mysqli_error($con));
	}
}

?>
?>