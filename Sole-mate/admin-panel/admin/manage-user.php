<?php include('partials/menu.php'); ?>

	<!--Main content selection-->

		<h1>MANAGE USER</h1>
		
		<br  />
		<?php
		if(isset($_SESSION['add']))
		{
			echo $_SESSION['add'];
			unset($_SESSION['add']);

		} 
if(isset($_SESSION['delete']))
{
	echo $_SESSION['delete'];
	unset($_SESSION['delete']);

}

if(isset($_SESSION['update']))
{
	echo $_SESSION['update'];
	unset($_SESSION['update']);
}

if(isset($_SESSION['user-not-found']))
{
	echo $_SESSION['user-not-found'];
	unset($_SESSION['user-not-found']);
}
if(isset($_SESSION['password-not-matched']))
{
	echo $_SESSION['password-not-matched'];
	unset($_SESSION['password-not-matched']);
}
if(isset($_SESSION['change-pwd']))
{
	echo $_SESSION['change-pwd'];
	unset($_SESSION['change-pwd']);
}

		?>
<br><br><br>
		<a href="add-user.php"class="btn-primary">Add User</a>
		
		<br  /><br  /><br  />



		<table class="tbl-full">
			<tr>
				<th>S.N.</th>
				<th>Full Name</th>
				<th>Username</th>
                <th>Email</th>
                <th>Phone no</th>
				<th>Actions</th>

			</tr>
			<?php

				$sql = "SELECT * FROM `tbl_user`";
				$res = mysqli_query($conn, $sql);
				if($res==TRUE){
					$count = mysqli_num_rows($res);
					$sn=1;

					if($count>0)
					{
						while($rows=mysqli_fetch_assoc($res))
						{
							$id=$rows['id'];
							$full_name=$rows['full_name'];
                            $username=$rows['username'];
							$email=$rows['email'];
                            $phone=$rows['phoneno'];


						?>
						<tr>
				<td><?php echo $sn++;  ?></td>
				<td><?php echo $full_name; ?></td>
				<td><?php echo $username; ?></td>
                <td><?php echo $email; ?></td>
                <td><?php echo $phone; ?></td>
				<td>
					<a href="<?php  echo SITEURL;  ?>admin-panel/admin/update-user.php?id=<?php echo$id; ?>"class="btn-primary">Edit</a>		
					<a href="<?php  echo SITEURL;  ?>admin-panel/admin/delete-user.php?id=<?php echo$id; ?>"class="btn-secondary">Delete</a>						
				</td>

			</tr>
						<?php
						}

					}
					else
					{

					}
				}


			?>
			
		</table>
			
	</div>
</div>
	

	<?php include('partials/footer.php'); ?>
