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
    <title>Registration Form</title>
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
        </section>
    <div class="container">
        <?php
        if (isset($_POST["submit"])) {
           $fullName = $_POST["fullname"];
           $email = $_POST["email"];
           $phoneno = $_POST["phoneno"];
           $username = $_POST["username"];
           $password = md5($_POST["password"]);
           $passwordRepeat = md5($_POST["repeat_password"]);

           $errors = array();
           
           if (empty($fullName) OR empty($email) OR empty($phoneno) OR empty($password) OR empty($username) OR empty($passwordRepeat)) {
            array_push($errors,"All fields are required");
           }
           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid");
           }
           if (strlen($phoneno)<10) {
            array_push($errors,"Phoneno must be at least 10 charactes long");
           }
           if (strlen($password)<8) {
            array_push($errors,"Password must be at least 8 charactes long");
           }
           if ($password!==$passwordRepeat) {
            array_push($errors,"Password does not match");
           }
           require_once "database.php";
           $sql = "SELECT * FROM tbl_user WHERE email = '$email'";
           $result = mysqli_query($conn, $sql);
           $rowCount = mysqli_num_rows($result);
           if ($rowCount>0) {
            array_push($errors,"Email already exists!");
           }
           if (count($errors)>0) {
            foreach ($errors as  $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
           }else{
            
            $sql = "INSERT INTO tbl_user (full_name, email, username, phoneno, password) VALUES ( ?, ?, ?, ?, ? )";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt,"sssss",$fullName, $email, $username, $phoneno, $password);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success'>You are registered successfully.</div>";
            }else{
                die("Something went wrong");
            }
           }
          

        }
        ?>
        <form action="registration.php" method="post">
            <h4>Registration Form: </h4><br>
            <div class="form-group">
                <input type="text" class="form-control" name="fullname" placeholder="Full Name:">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Username :">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email:">
            </div>
            <div class="form-group">
                <input type="phoneno" class="form-control" name="phoneno" placeholder="Phoneno:">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password:">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password:">
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Register" name="submit">
            </div>
        </form>
        <div>
        <div><p>Already Registered? <a href="login.php">Login Here</a></p></div>
      </div>
    </div>

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