<?php include('partials/menu.php'); ?>


<div class="main-content">
	<div class="wrapper">
		<h1>ADD ADMIN</h1>
        <br>
        <?php

        if(isset($_SESSION['add']))
		{
			echo $_SESSION['add'];
			unset($_SESSION['add']);

		}  

        ?>
		<form action="" method="POST">
			<table class="tbl-30">
				<tr>
					<td>Full Name: </td>
					<td><input type="text" name="full_name" placeholder="Name Here" required autocomplete="off"></td>
					
				</tr>
				<tr>
					<td>UserName: </td>
					<td><input type="text" name="username" placeholder="UserName" required autocomplete="off" ></td>
					
				</tr>
				<tr>
					<td>Email: </td>
					<td><input type="email" name="email" placeholder="Email" required autocomplete=off ></td>
					
				</tr>
				<tr>
					<td>Password: </td>
					<td><input type="password" name="password" placeholder="Password" required></td>
					
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="submit" value="Add Admin" class="btn-secondary"></td>
				</tr>

			</table>
		</form>
	</div>
</div>


<?php include('partials/footer.php'); ?>

<?php 


if(isset($_POST['submit']))
{
 $full_name=$_POST['full_name'];
 $username=$_POST['username'];
 $password=md5($_POST['password']);
 $email=$_POST['email'];



$sql = "INSERT INTO tbl_admin SET
full_name = '$full_name',
username =  '$username',
password = '$password',
email = '$email'
";


$res = mysqli_query($conn, $sql) or die(mysqli_error());

if($res = TRUE){
$_SESSION['add'] = "<div class='success'>Admin Added.</div>";
header("location:".SITEURL.'admin-panel/admin/manage-admin.php');
} 
else{

$_SESSION['add'] = "<div class='error'>Admin Not Added</div>";
header("location:".SITEURL.'admin-panel/admin/add-admin.php');
}
	


}

?>