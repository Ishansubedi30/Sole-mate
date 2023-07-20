<?php 



$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"menu");

$test=array();

$count=0;
$res=mysqli_query($link,"select * from tbl_data");
while($row=mysqli_fetch_array($res))
{
    $test[$count]["label"]=$row["time"];  // second label = database column name
    $test[$count]["y"]=$row["items"];  // Amount is from database too
    $count=$count + 1;
}



 
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Sole-Mate</title>
	<link rel="stylesheet" type="../text/css" href="../css/user.css">
	<link rel="stylesheet" type="../text/css" href="../css/style.css">
	<link rel="stylesheet" href="../../../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"  />







<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Items Sold by Time of the day"
	},
	axisY: {
		title: "Revenue (in NRs)"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.##, items ",  // shown while hover
		dataPoints: <?php echo json_encode($test, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>














<body>
<section id="header">
            <img src="../../../img/logo3.png" class="logo">

            <div>
                <ul id="navbar">
				<li><a href="../../../index.php">Home</a></li>
				<li><a href="../manage-admin.php">Admin</a></li>
			    <li><a href="../manage-user.php">Users</a></li>
			    <li><a href="../manage-shoe.php">Items</a></li>
		     	<li><a href="../manage-order.php">Order</a></li>
				<li><a href="index.php">Charts</a></li>
                <li><a href="../logout.php">Logout</a></li>
                </ul>
            </div>
        </section>
        <hr color="black">

        <section id="header">

            <div>
                <ul id="navbar">
                <li><h3>Revenue by : </h3></li>
				<li><a href="index.php">Time</a></li>
				<li><a href="rev-date.php">Date</a></li>
                <li><h3>Items Sold by : </h3></li>
                <li><a href="item-time.php">Time</a></li>
			    <li><a href="item-date.php">Date</a></li>
                </ul>
            </div>
        </section>
		<div class="container">

		
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>


<br></div>
<footer class="section-p1">
            <div class="col">
                
                <h4>Contact</h4>
                <p><strong>Address : </strong>Pokhara 27 Hemja</p>
                <p><strong>Phone : </strong>+977-9876543210</p>
                
            </div>
            <div class="col">
                <div class="follow">
                <h4>Follow Us</h4>
                <div class="icon">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-youtube"></i>
                </div>
            </div>
            </div>

            <div class="col">
                <h4>About</h4>
               
                <p>This website is created for the purpose of education. It was created by students for their project.</p><br><br>
            </div>
           
        </footer>
</div>
</body>
</html>                 

