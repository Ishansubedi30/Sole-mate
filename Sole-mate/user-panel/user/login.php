<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: ../../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"  />
</head>
<body>
<section id="header">
            <img src="../../img/logo3.png" class="logo">

            <div>
                <ul id="navbar">
                <li><a href="../../index.php">Home</a></li>
                <li><a href="../../items.php">Items</a>
                    <ul class="dropdown" >
                     <li><a href="../../female.php" class="drop">Female</a></li>
                     <li><a href="../../kids.php" class="drop">Kids</a></li>
                     <li><a href="../../male.php" class="drop">Male</a></li>
                     </ul></li>
                    <li><a href="login.php">Log-in</a></li>
                    <li><a href="registration.php">Sign-up</a></li>
                    
                </ul>
            </div>
        </section><br><br>

    <div class="container">
        <?php
        if (isset($_POST["login"])) {
           $email = $_POST["email"];
           $password = $_POST["password"];
           $password =  md5($password);
            require_once "database.php";
            $sql = "SELECT * FROM tbl_user WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if ($password == $user["password"]) {
                    session_start();
                    $_SESSION["user"] = "yes" ;
                    $_SESSION["email"] = "$email";
                    header("Location: manage-order.php");
                    die();
                }else{
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>Email does not match</div>";
            }
        }
        ?>







      <form action="login.php" method="post">
      <h4> Sign in : </h4><br>
        <div class="form-group">
            <input type="email" placeholder="Enter Email:" name="email" class="form-control">
        </div>
        <div class="form-group">
            <input type="password" placeholder="Enter Password:" name="password" class="form-control">
        </div>
        <div class="form-btn">
            <input type="submit" value="Login" name="login" class="btn btn-primary">
        </div>
      </form>
     <div><p>Not registered yet <a href="registration.php">Register Here</a></p></div>
    </div><br><br>








    <footer class="section-p1">
            <div class="col">
                <img class="logo" src="../../img/logo3.png" alt="">
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
                <a href="login.php">Log-in</a>
                <p>This website is created for the purpose of education. It was created by students for their project.</p><br><br>
                <h4>Admin</h4>
                <a href="../../admin-panel/admin/index.php">Admin Log-in</a>
            </div>
           
        </footer>
</body>
</html>