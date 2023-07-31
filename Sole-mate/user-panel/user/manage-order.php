<?php include('partials/menu.php'); 
$con=new mysqli('localhost','root', '','menu'); 
?>


<div class="main-content">
	

	<div>
  <h2> Active </h2>  

<table class="text-center">
	<thead>
  <tr>
    <th>S no.</th>
    <th>Email</th>
    <th>Address</th>
    <th>Phone</th>
    <th>Items</th>
    <th>Total</th>
    <th>Actions</th>
  </tr>
  </thead>
  <tbody>
  	<?php
    $email=$_SESSION["email"];

      $sql = "Select * from `tbl_order` where email = '$email' and activity = 1 ";
      $result=mysqli_query($con,$sql);  
      if($result){
      	while($row=mysqli_fetch_assoc($result)){
      		$id=$row['id'];
      		$email=$row['email'];
      		$address=$row['address'];
      		$phone=$row['phone'];
      		$items=$row['items'];
      		$total=$row['total'];
      		echo '
             <tr>
             <td>'.$id.'</td>
             <td>'.$email.'</td>
             <td>'.$address.'</td>
             <td>'.$phone.'</td>
             <td>'.$items.'</td>
             <td>'.$total.'</td>
             <td>
	             <button><a href="mark-order.php?markid='.$id.'">Cancle</a></button>
             </td>
             </tr>
             

      		';

      	}
      }
  	?>
  </tbody>
 
  
</table>



	</div>

</div>


<?php include('partials/footer.php'); ?>
