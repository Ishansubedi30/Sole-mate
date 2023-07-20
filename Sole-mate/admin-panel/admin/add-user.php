<?php include('partials/menu.php'); ?>


<div class="main-content">
	<div class="wrapper">
		<h1>ADD USER</h1>
        <br>
        <?php

        if(isset($_SESSION['add']))
		{
			echo $_SESSION['add'];
			unset($_SESSION['add']);

		}  

        ?>
		<form  method="POST">
			<table class="tbl-30">
				<tr>
					<td>Full Name: </td>
					<td><input type="text" name="full_name" placeholder="Enter Your Name" required></td>
					
				</tr>
				<tr>
					<td>UserName: </td>
					<td><input type="text" name="username" placeholder="Enter Yoor UserName" required></td>
					
				</tr>
				<tr>
					<td>Password: </td>
					<td><input type="password" name="password" placeholder="Enter Your Password" required></td>
					
				</tr>
                <tr>
					<td>Email </td>
					<td><input type="email" name="email" placeholder="example@something.com" required></td>
					
				</tr>
                <tr>
					<td>Phone no </td>
					<td><input type="number" name="phoneno" placeholder="Enter Your Phone no" required></td>
					
				</tr>
				</table>
				<br>
					<td colspan="2"><input type="submit" name="submit" value="Add User" class="btn-primary"></td>
				

			
		</form>
	</div>
</div>


<?php include('partials/footer.php'); ?>

<?php 


if(isset($_POST['submit']))
{
 $full_name=$_POST['full_name'];
 $username=$_POST['username'];
 $email=$_POST['email'];
 $phoneno=$_POST['phoneno'];
 $password=md5($_POST['password']);


$sql = "INSERT INTO tbl_user SET
full_name = '$full_name',
username =  '$username',
email =  '$email',
phoneno =  '$phoneno',
password = '$password'

";


$res = mysqli_query($conn, $sql) or die(mysqli_error());

if($res = TRUE){
$_SESSION['add'] = "<div class='success'>Admin Added.</div>";
header("location:".SITEURL.'admin-panel/admin/manage-user.php');
} 
else{

$_SESSION['add'] = "<div class='error'>Admin Not Added</div>";
header("location:".SITEURL.'admin-panel/admin/add-user.php');
}
	


}

?>