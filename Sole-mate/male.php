<?php
session_start();
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

    </head>
    <body>
        
    <section id="header">
            <a href="#"><img src="img/logo3.png" class="logo"></a>

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

        <section id="page-header">
            <h2>...Minor-Project II...</h2>

            <h1>  .....Sole-Mate.....</h1>
           
        </section>
        


        <section id="product1" class="section-p1 ">
    <div class="container">
    <form method="POST">
        <input type="search" name="search" placeholder="Search an item..">
        <input type="submit" name="submit" value="search " class="button btn-primary">
     </form>
    </div>


<?php 
$con = new PDO("mysql:host=localhost;dbname=menu",'root','',);

if(isset($_POST["submit"])){
    $str = $_POST["search"];
    $empt = "";
    if($str != $empt){
    $str = "%".$str."%" ;
    $sth = $con ->prepare("SELECT * FROM list WHERE catagory= 'men' AND name like '$str' ");}
  else{
    $sth = $con ->prepare("SELECT * FROM list WHERE catagory= 'men' AND name = '$str' ");
  }
   
    $sth->setFetchMode(PDO::FETCH_OBJ);
    $sth->execute();
    ?>
 
    <div class="pro-container">
    <?php
    while($row = $sth->fetch() )
    {
       
        ?>
        
        <form action="manage_cart.php" method="POST">
              
              <div class="pro">
                  <img src=<?php echo $row->image; ?> alt= <?php echo $row->name; ?>>
                  <div class="des">
                      <h5><?php echo $row->name; ?></h5>
                      <div class="star">
                      <?php echo $row->discription; ?>
                      </div>
                      <h4>Rs:<?php echo $row->price; ?></h4>
                  </div>
                  <input type="hidden" name="Item_Name" value=<?php echo $row->name; ?>>
              <input type="hidden" name="Price" value=<?php echo $row->price; ?>>
                  <a href="#"><button type="submit" name="Order_now" class="fas fa-cart-shopping cart"></button></a>
              </div>
           </form>         
<?php }


      
    
}
?>
</div>
 </section><br>





        <section id="product1" class="section-p1 ">
            <h2>Mens Collection</h2>
            <p>Boots</p>
 <?php 
$con = new PDO("mysql:host=localhost;dbname=menu",'root','',);

   $sth = $con ->prepare("SELECT * FROM `list` WHERE catagory= 'men' AND subcatagory='boots' ");
   $sth->setFetchMode(PDO::FETCH_OBJ);
   $sth->execute();
   ?>
 
            <div class="pro-container">
            <?php
 while($row = $sth->fetch() )
      {
         ?>
         
            <form action="manage_cart.php" method="POST">
              
                <div class="pro">
                    <img height="230" src=<?php echo $row->image; ?> alt= <?php echo $row->name; ?>>
                    <div class="des">
                        <h5><?php echo $row->name; ?></h5>
                        <div class="star">
                        <?php echo $row->discription; ?>
                        </div>
                        <h4>Rs:<?php echo $row->price; ?></h4>
                    </div>
                    <input type="hidden" name="Item_Name" value=<?php echo $row->name; ?>>
                <input type="hidden" name="Price" value=<?php echo $row->price; ?>>
                    <a href="#"><button type="submit" name="Order_now" class="fas fa-cart-shopping cart"></button></a>
                </div>
             </form>      
<?php }
?>
</div>
 </section>

 <section id="product1" class="section-p1 ">
            <p>Causal</p>
 <?php 
$con = new PDO("mysql:host=localhost;dbname=menu",'root','',);

   $sth = $con ->prepare("SELECT * FROM `list` WHERE catagory= 'men' AND subcatagory='causal' ");
   $sth->setFetchMode(PDO::FETCH_OBJ);
   $sth->execute();
   ?>
 
            <div class="pro-container">
            <?php
 while($row = $sth->fetch() )
      {
         ?>
         
            <form action="manage_cart.php" method="POST">
              
                <div class="pro">
                    <img height="230" src=<?php echo $row->image; ?> alt= <?php echo $row->name; ?>>
                    <div class="des">
                        <h5><?php echo $row->name; ?></h5>
                        <div class="star">
                        <?php echo $row->discription; ?>
                        </div>
                        <h4>Rs:<?php echo $row->price; ?></h4>
                    </div>
                    <input type="hidden" name="Item_Name" value=<?php echo $row->name; ?>>
                <input type="hidden" name="Price" value=<?php echo $row->price; ?>>
                    <a ><button type="submit" name="Order_now" class="fas fa-cart-shopping cart"></button></a>
                </div>
             </form>      
<?php }
?>
</div>
 </section>

 <section id="product1" class="section-p1 ">
            <p>Sports</p>
 <?php 
$con = new PDO("mysql:host=localhost;dbname=menu",'root','',);

   $sth = $con ->prepare("SELECT * FROM `list` WHERE catagory= 'men' AND subcatagory='sports' ");
   $sth->setFetchMode(PDO::FETCH_OBJ);
   $sth->execute();
   ?>
 
            <div class="pro-container">
            <?php
 while($row = $sth->fetch() )
      {
         ?>
         
            <form action="manage_cart.php" method="POST">
              
                <div class="pro">
                    <img height="230" src=<?php echo $row->image; ?> alt= <?php echo $row->name; ?>>
                    <div class="des">
                        <h5><?php echo $row->name; ?></h5>
                        <div class="star">
                        <?php echo $row->discription; ?>
                        </div>
                        <h4>Rs:<?php echo $row->price; ?></h4>
                    </div>
                    <input type="hidden" name="Item_Name" value=<?php echo $row->name; ?>>
                <input type="hidden" name="Price" value=<?php echo $row->price; ?>>
                    <a href="#"><button type="submit" name="Order_now" class="fas fa-cart-shopping cart"></button></a>
                </div>
             </form>      
<?php }
?>
</div>
 </section>
 

 
 

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
                <h4>Admin</h4>
                <a href="admin-panel/admin/manage-order.php">Admin Log-in</a>
            </div>
           
        </footer>


        <script src="script.js"></script>
    </body>
</html>