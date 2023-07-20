<?php include('partials/menu.php'); 
include('connect.php');

if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$catagory = $_POST['catagory'];
	$subcatagory = $_POST['subcatagory'];
	$discription = $_POST['discription'];
	$price = $_POST['price'];
	$image = $_POST['image'];
	 


	







	$sql ="insert into `list` (name,catagory,subcatagory,discription,price,image)
	values('$name','$catagory','$discription','$price','$newimageName')";

	$result=mysqli_query($con,$sql);
	if($result){
		header('location:manage-shoe.php');
	}
}




?>


<div class="main-content">
	<div class="wrapper">
			<h1>MANAGE Item</h1>
				</div>

	<div>


		<form method="POST">
		<table class="tbl-30">
				<tr>
			<td>Name</td>
			<td><input type="text" name="name" placeholder="Name" required></td>
			</tr>
				<tr>

			<td>Catagory</td>
			<td><input type="text" name="catagory" placeholder="Catagory" required></td>
			</tr>
				<tr>

			<td>Sub Catagory</td>
			<td><select multiple="multiple" name="subcatagory" placeholder="Subcatagory" >
			 <optgroup>
			    <option value="kids">kids</option>
				<option value="men">men</option>
				<option value="female">female</option>
			 </optgroup>		
			</select></td>
			</tr>
				<tr>

			<td>Discription</td>
			<td><input type="text" name="discription" placeholder="Short Discription" required></td>
			</tr>
				<tr>

			<td>Price</td>
			<td><input type="number" name="price" placeholder="eg. 100" required></td>
			</tr>
				<tr>

			<td>Image</td>
			<td><input type="file" name="image" accept=".jpg, .jepg, .png" required></td>
			</tr>
			<br>
			</table><br>
         
		 <td colspan="2"><input type="submit" name="submit" value="Add " class="btn-primary"></td>

		
		 
		</form>
	</div>

</div>


<?php include('partials/footer.php'); ?>
