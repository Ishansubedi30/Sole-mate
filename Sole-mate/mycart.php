<?php
session_start();
include('login-check.php');
$con=new mysqli('localhost','root', '','menu'); 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sole-Mate</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"  />
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="css/style.css">
 
    </head>
    <body>
        
    <section id="header">
            <img src="img/logo3.png" class="logo">

            <div>
                <ul id="navbar">
                <li><a href="index.php">Home</a></li>
                <li><a href="items.php">Items</a>
                    <ul class="dropdown" >
                     <li><a href="female.php" class="drop">Female</a></li>
                     <li><a href="kids.php" class="drop">Kids</a></li>
                     <li><a href="male.php" class="drop">Male</a></li>
                     </ul></li>
                   <li><a href="user-panel/user/login.php">Log-in</a></li>
                    <li><a href="user-panel/user/registration.php">Sign-up</a></li>
                    <li><a href="user-panel/user/manage-order.php">Dashboard</a></li>
                    <li><a href="mycart.php"><i class="fa fa-cart-shopping"></i></a></li>
                    
                </ul>
            </div>
        </section>







<section class="menu">
  <div class="login">
<table class="text-center">
  <tr>
    <th>S no.</th>
    <th>Item Name</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Remove</th>
  </tr>
 <?php
 $total=0;
 if(isset($_SESSION['Cart']))
 {
 foreach ($_SESSION['Cart'] as $key => $value) {
  $total=$total+$value['Price'];
  $sr=$key+1;
   echo"
   <tr>
   <td>$sr</td>
   <td>$value[Item_Name]</td>
   <td>$value[Price]</td>
   <td>
   
   <input type='number' value='$value[Quantity]' min='1' max='10' >
   
   </td>
   <td>
   <form action='manage_cart.php' method='POST')>
   <button name='Remove_Item'>REMOVE</button>
   <input type='hidden' name='Item_Name' value='$value[Item_Name]' required>
   </form>
   </td>
   </tr>
   ";
 }
}
 ?>
</table>
</div>
</section>

<form method="POST" action="connect.php">
<div class="total , catagories">
<h3> Address to be delivered: 
  <input type="text" name ="address" placeholder="Address here " required> </input><br><br>
<h3>Total:</h3><br>
<h5><?php echo $total; ?></h5><br>

  <button  type="submit" name="submit" class="button btn-primary">Place Order</button>
</form><br><br>
<form action="https://uat.esewa.com.np/epay/main" method="POST">
    <input value=<?php echo $total?> name="tAmt" type="hidden">
    <input value=<?php echo $total ?> name="amt" type="hidden">
    <input value="0" name="txAmt" type="hidden">
    <input value="0" name="psc" type="hidden">
    <input value="0" name="pdc" type="hidden">
    <input value="EPAYTEST" name="scd" type="hidden">
    <input value="ee2c3ca1-696b-4cc5-a6be-2c40d929d453" name="pid" type="hidden">
    <input value="http://merchant.com.np/page/esewa_payment_success?q=su" type="hidden" name="su">
    <input value="http://merchant.com.np/page/esewa_payment_failed?q=fu" type="hidden" name="fu">
    <Button value="Submit" type="submit" class="button btn-primary" background-color: #4CAF50 >Esewa</button>
    </form>
<div class="space-fix"></div>
  </div>


 <!--  Footer  -->

 <footer class="section-p1">
            <div class="col">
                <img class="logo" src="img/logo3.png" alt="">
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
                <a href="user-panel/user/login.php">Log-in</a>
                <p>This website is created for the purpose of education. It was created by students for their project.</p><br><br>
                
            </div>
           
        </footer>

        <script src="script.js"></script>
    </body>
</html>