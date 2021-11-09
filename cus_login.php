<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
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

  <form method="POST" class="box">
    <h1>Login</h1>
    <input type="text" name="cus_phone" id="cus_phone" placeholder="Mobile Number">
    <input type="password" name="pass" id="pass" placeholder="Password">        
    <button type="submit" name="login-btn" id="login-btn" class="login-btn">Login</button>
    <a href="cus_register.php">Not Registered? Create Your Account</a>
  </form>
  
</div>
    
</body>
</html>

<?php 
session_start();
include('config.php');
if(isset($_SESSION['login_user']))
{
header("Location:index.php");	
exit();
}
if(isset($_POST['login-btn']))
{
	$ph=$_POST['cus_phone'];
	$pass=$_POST['pass'];
	
	$sql="SELECT id,cus_name FROM customer WHERE cus_phone='$ph' and cus_password='$pass'";
	$res=$con->query($sql);
	if($res->num_rows==1){
	while($row=$res->fetch_array(MYSQLI_ASSOC)){
	        $cname=$row['cus_name'];
	    }
		$_SESSION['login_user']=$cname;
		header("Location:index.php?cus_name=$cname");
    exit();
	}
	else 
		echo '<script>alert("YOUR MOBILE NO. OR PASSWORD IS INVALID");</script>';
}


?>
</body>
</html>
