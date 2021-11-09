<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Account</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adminlogin-css.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Galada' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
*{
    margin: 0;
  padding: 0;
  box-sizing: border-box;
  }
  html{
    scroll-behavior: smooth;
  
  }
  body{
    font-family: Poppins;
    margin: 0;
    padding: 0;
    background-color: #fff;
    animation: fadeInAnimation ease 2s;
  }
  @keyframes fadeInAnimation {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 1;
     }
  }
 
  .container {
       width:100%;
       height: 100vh;
       display: flex;
       justify-content: center;
       align-items: center;
       background: #4169e1;
    }
    
   .box{
      
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
    
    border-radius: 10px;
    padding:30px;
    background: #fff;
  
    
    }
    
    .box h1 {
       color:#4169e1;
       font-family:Poppins;
       
    }
     
   .box input{
     margin:10px 20px;
     padding:10px 30px;
     font-family: Poppins;
     font-size: 1rem;
     border-radius: 20px;
     border:2px solid #4169e1;
     outline: none;
  
     
   }
   .box input:focus{
    outline: none;
  }
  .box .login-btn{
      margin: 10px;
      padding:10px 30px;
      font-family: Poppins;
      font-size: 1rem;
      border-radius: 20px;
      border: none;
      background: #4169e1;
      color:#fff;
      cursor:pointer;
  
    }
     
 
    
    
</style>
</head>
<body>
<div class="container">

  <form method="POST" class="box" >
    <h1>Create Account</h1>
    <input type="text" name="cus_name" id="cus_name" placeholder="Full Name">
    <input type="text" name="cus_phone" id="cus_phone" placeholder="Mobile Number">
    <input type="password" name="pass" id="pass" placeholder="Password">        
    <input type="password" name="cpass" id="cpass" placeholder="Confirm Password">        
   
    <button type="submit" name="register-btn" id="login-btn" class="login-btn">Create Account</button>
    <a href="cus_login.php">Already Registered? Login Your Account</a>
  </form>
  
</div>
<?php 
session_start();
require('config.php');

if(isset($_POST['register-btn'])){
	$cus_name=$_POST['cus_name'];
	$cus_phone=$_POST['cus_phone'];
	$cpass=$_POST['cpass'];
	$cus_pass=$_POST['pass'];
	if($cpass==$cus_pass){
		$sql=$con->query("INSERT INTO customer(cus_name,cus_phone,cus_password) 
		VALUES ('$cus_name','$cus_phone','$cus_pass')");
		if($sql==true){
            $_SESSION['login_user']=$cus_name;
			header('Location:index.php');

		}
			
		else 
		echo '<script>alert("Not Registered,Please Try Again!!");</script>';
		
		}
	else
		echo '<script>alert("Confirm Password Didnt Matched!!");</script>';
}

?>
</body>
</html>