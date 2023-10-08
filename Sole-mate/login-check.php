<?php 

if(!isset($_SESSION['user']))
{

$_SESSION['no-login-message'] = "<div class'error text-center'>Login to Access Adimin Panel</div>";
	header('location:user-panel/user/login.php');


}

?>  