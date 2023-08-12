<?php 
session_start();
$conn = new mysqli('localhost','root','','menu');

$email = $_SESSION["email"];
$address = $_POST['address'];
$activity="1";
$items = " " ; 
$date = date("j F");
$time =  date("G i");
 


$sql = "SELECT * FROM tbl_user WHERE email = '$email'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_array($result, MYSQLI_ASSOC);
$phone = $user["phoneno"];




foreach ($_SESSION['Cart'] as $key => $value){
  $json = json_encode($value['Item_Name']); 
  $items .= $json;
}


$total=0;
$number=0;
 if(isset($_SESSION['Cart']))
 {
 foreach ($_SESSION['Cart'] as $key => $value) {
  $total=$total+$value['Price'];
  $number= $number + 1;
}
}
//database connection 

if($conn->connect_error){
	die('Connection Failed: '.$conn->connect_error);
}else{
      $stmt= $conn->prepare("INSERT INTO `tbl_order` (email, address, phone, items, total ,activity) 
      	values(?,?,?,?,?,?)");
          mysqli_stmt_bind_param($stmt,"ssssis",$email, $address, $phone, $items, $total , $activity);
          mysqli_stmt_execute($stmt);

          $stmt= $conn->prepare("INSERT INTO `tbl_data` (date, time, total, items) 
          values(?,?,?,?)");
            mysqli_stmt_bind_param($stmt,"ssis",$date, $time, $total , $number);
            mysqli_stmt_execute($stmt);
   echo"<script>
	alert('Order Submitted Sucessfully.....');
window.location.href='mycart.php';
	</script>";
 unset($_SESSION['Cart']);
      $stmt->close();
      $conn->close();
       
}
?>