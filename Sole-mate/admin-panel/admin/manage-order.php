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
      $sql = "Select * from `tbl_order` where activity = 1";
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
	             <button><a href="mark-order.php?doneid='.$id.'" class="btn-primary">Done</a></button>
	             <button><a href="delete-order.php?deleteid='.$id.'" class="btn-secondary">Delete</a></button>
             </td>
             </tr>
             

      		';

      	}
      }
  	?>
  </tbody>
 
  
</table><br><br><br>

<h2> Done </h2> 
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
      $sql = "Select * from `tbl_order` where activity = 0";
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
	             
	             <button><a href="delete-order.php?deleteid='.$id.'" class="btn-secondary">Delete</a></button>
             </td>
             </tr>
             

      		';

      	}
      }
  	?>
  </tbody>
 
  
</table><br><br>


	

	<div>
  <h2> Canceled </h2>  

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
      $sql = "Select * from `tbl_order` where activity = 2";
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

	             <button><a href="delete-order.php?deleteid='.$id.'" class="btn-secondary">Delete</a></button>
             </td>
             </tr>
             

      		';

      	}
      }
  	?>
  </tbody>
 
  
</table><br><br><br>


	</div>

</div>


<?php include('partials/footer.php'); ?>
