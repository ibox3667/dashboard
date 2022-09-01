<!DOCTYPE html> 
<html> 
<head> 
    <meta charset="utf-8"/> 
    <title>Login</title> 
    <link rel="stylesheet" href="./registration/style.css"/> 
</head> 
<body> 
<?php 
    include('./registration/db.php'); 
    session_start(); 
    // When form submitted, check and create user session. 
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM `users` WHERE username='". $username . "' AND password='". $password ."'";

        $result = mysqli_query($con, $sql);

        $row = mysqli_fetch_array($result);

        if($row["usertype"] == "user"){
            $_SESSION["username"] = $username;
            header("Location: ./dashboard/userpage.php");
        }

        if($row["usertype"] == "admin"){
            $_SESSION["username"] = $username;
            header("Location: ./dashboard/dashboard.php");
        }

        else {
            echo "username or password error";
        }

    }
?> 
    <form class="form" method="post" name="login"> 
        <h1 class="login-title">Login</h1> 
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/> 
        <input type="password" class="login-input" name="password" placeholder="Password"/> 
        <input type="submit" value="Login" name="submit" class="login-button"/> 
        <p class="link"><a href="/registration/registration.php">New Registration</a></p> 
  </form> 
</body> 
</html>