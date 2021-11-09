<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adminlogin-css.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Galada' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="container">
  <form  method="POST" class="box">
    <h1>Admin Login</h1>
    <input type="text" name="username" id="username" placeholder="Username">
    <input type="password" name="password" id="password" placeholder="Password">        
    <button type="submit" name="login-btn" id="login-btn" class="login-btn">Login</button>
</form>
</div>
    
</body>
</html>

<?php 
session_start();
if(isset($_SESSION['login_user']))
{
header("Location:index.php");	

}
if(isset($_POST['login-btn']))
{
  if($_POST['username']=="admin" && $_POST['password']=="admin123")
  { $_SESSION['login_user']=$_POST['username'];
    header("Location:index.php");	

  }
  else{
    echo "<script>alert('Wrong ID PASS')</script>";
  }
}
?>