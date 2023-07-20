<?php include('partials/menu.php'); 
include('connect.php'); 

?>


<h1>MANAGE ITEMS</h1>
<div class="container">
		
				</div>


         <button class=' btn-primary' ><a href="./add-shoe.php"  >ADD ITEM</a></button>
		
		


    
  <h1>Kids</h1>
<table class="text-center">
	<thead>
  <tr>
    <th>S no.</th>
    <th>Item Name</th>
    <th>Catagory</th>
    <th>Discription</th>
    <th>Price</th>

    <th>Action</th>
  </tr>
  </thead>
  <tbody>
  	<?php
      $sql = "Select * from `list` where catagory = 'Kids' ";
      $result=mysqli_query($con,$sql);
      if($result){
      	while($row=mysqli_fetch_assoc($result)){
      		$id=$row['id'];
      		$name=$row['name'];
      		$catagory=$row['catagory'];
      		$discription=$row['discription'];
      		$price=$row['price'];

      		echo '
             <tr>
             <td>'.$id.'</td>
             <td>'.$name.'</td>
             <td>'.$catagory.'</td>
             <td>'.$discription.'</td>
             <td>'.$price.'</td>
             <td>
	             <button><a href="update-shoe.php?updateid='.$id.'" class="btn-primary">Update</a></button>
	             <button><a href="delete-shoe.php?deleteid='.$id.'" class="btn-secondary">Delete</a></button>
             </td>
             </tr>
             

      		';

      	}
      }
  	?>
  </tbody>
 
  
</table><br>



<h1>men</h1>

<table class="text-center">
	<thead>
  <tr>
    <th>S no.</th>
    <th>Item Name</th>
    <th>Catagory</th>
    <th>Discription</th>
    <th>Price</th>

    <th>Action</th>
  </tr>
  </thead>
  <tbody>
  	<?php
      $sql = "Select * from `list` where catagory = 'men' ";
      $result=mysqli_query($con,$sql);
      if($result){
      	while($row=mysqli_fetch_assoc($result)){
      		$id=$row['id'];
      		$name=$row['name'];
      		$catagory=$row['catagory'];
      		$discription=$row['discription'];
      		$price=$row['price'];

      		echo '
             <tr>
             <td>'.$id.'</td>
             <td>'.$name.'</td>
             <td>'.$catagory.'</td>
             <td>'.$discription.'</td>
             <td>'.$price.'</td>
 
             <td>
	             <button><a href="update-shoe.php?updateid='.$id.'" class="btn-primary">Update</a></button>
	             <button><a href="delete-shoe.php?deleteid='.$id.'" class="btn-secondary">Delete</a></button>
             </td>
             </tr>
             

      		';

      	}
      }
  	?>
  </tbody>
 
  
</table><br>

<h1>female</h1>
<table class="text-center">
	<thead>
  <tr>
    <th>S no.</th>
    <th>Item Name</th>
    <th>Catagory</th>
    <th>Discription</th>
    <th>Price</th>

    <th>Action</th>
  </tr>
  </thead>
  <tbody>
  	<?php
      $sql = "Select * from `list` where catagory = 'female' ";
      $result=mysqli_query($con,$sql);
      if($result){
      	while($row=mysqli_fetch_assoc($result)){
      		$id=$row['id'];
      		$name=$row['name'];
      		$catagory=$row['catagory'];
      		$discription=$row['discription'];
      		$price=$row['price'];

      		echo '
             <tr>
             <td>'.$id.'</td>
             <td>'.$name.'</td>
             <td>'.$catagory.'</td>
             <td>'.$discription.'</td>
             <td>'.$price.'</td>
   
             <td>
	             <button><a href="update-shoe.php?updateid='.$id.'" class="btn-primary">Update</a></button>
	             <button><a href="delete-shoe.php?deleteid='.$id.'" class="btn-secondary">Delete</a></button>
             </td>
             </tr>
             

      		';

      	}
      }
  	?>
  </tbody>
 
  
</table><br>





	</div>

</div>


<?php include('partials/footer.php'); ?>
