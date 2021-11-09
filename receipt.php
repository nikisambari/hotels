<?php
require('config.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booking Receipt</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home-css.css"/>
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
    display: flex;
    justify-content: center;
    background: #dae3ff;
    padding:20px;
 
 }
    .container form{
     width:40%;
     display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    

 }
  .container form .receipt{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    border-radius: 10px;
    background: #fff;
    width:100%;
    padding:10px 30px;
    
  }
  .container form .receipt h1 {
    color:#4169e1;
    font-size:1.2rem;
    font-family:Poppins;
    text-align:center;
  }
  .receipt .input-box{
  display:inline-block; 
  margin-bottom:10px;
  padding:5px 10px;
  width: 100%;
  border-radius: 20px;
 
  }
  .receipt .input-box p{
    font-size: .8rem;
      font-weight:600;
      color:#4169e1;

  }
  .receipt .input-box input{
    display:inline-block; 
  font-family: Poppins;
  font-size: .7rem;
  
  background: #fff;
  outline: none;
    border:none;
    color:#4169e1;

  
}
.view-r-btn{
   margin: 10px;
   padding:10px 30px;
   font-family: Poppins;
   font-size: 1rem;
   border-radius: 20px;
   border: none;
   background: #4169e1;
   color:#fff;
   cursor: pointer;
 }

 .go-home{
    position:absolute;
    top:20px;
left:20px;
   font-family: Poppins;
   border-radius: 20px;
   border: none;
   background: #4169e1;
   color:#fff;
   cursor: pointer;
   text-decoration:none;
   padding:10px;
 }
 .go-home i{
     font-size:2rem;
 }
@media only screen and (max-width: 720px){
    .container form{
     width:100%;}
     .container form .receipt{
   
    box-shadow:none;
     }
}
</style>
</head>
<body>

<div class="container">
<?php
    
    $c_name=$_POST['cus-name'];
    $c_phone=$_POST['cus-phone'];
    $h_name=$_POST['h-name'];
    $h_location=$_POST['h-location'];
    $h_price=$_POST['h-price'];
    $rooms=$_POST['no_of_rooms'];
    $checkin=$_POST['check-in'];
    $checkout=$_POST['check-out'];
    $total=$h_price*$rooms;
    date_default_timezone_set('Asia/Kolkata'); 

    $currentDT = date('Y-m-d H:i:s');
    ?>
<form method="POST"> 
        <div class="receipt">   
        
            <h1>Booking Details</h1>
            <?php echo "<div class='input-box'><p>Customer Name</p> <input type='text' name='cus-name' id='cus-name' value='$c_name' readonly></div>";
            echo "<div class='input-box'><p>Customer Phone No.</p> <input type='text' name='cus-phone' id='cus-phone' value='$c_phone' readonly></div>";
            echo "<div class='input-box'><p>Hotel Name</p> <input type='text' name='h-name' id='h-name' value='$h_name' readonly></div>";
            echo "<div class='input-box'><p>Hotel Location </p><input type='text' name='h-location' id='h-loc' value='$h_location' readonly></div>";
            echo "<div class='input-box'><p>Price Per Room</p><input type='text' name='h-price' id='h-price' value='$h_price' readonly></div>";   
            echo "<div class='input-box'><p>No. Of Rooms </p><input type='text' name='no_of_rooms' value='$rooms' readonly></div>";
            echo "<div class='input-box'><p> Check IN Date </p><input type='text' name='check-in' value='$checkin' readonly></div>";
            echo "<div class='input-box'><p> Check OUT Date</p> <input type='text' name='check-out' value='$checkout' readonly></div>";
            echo "<div class='input-box'><p> Total Price</p> <input type='text' name='total' value='$total' readonly></div>";
            echo "<div class='input-box'><p> Booking Date</p> <input type='text' name='total' value='$currentDT' readonly></div>";
         
           ?>
          </div>
        
          <button type="submit" name="view-r-btn" class="view-r-btn">Pay</a>
   
        
</form>  
</div>
<?php

if(isset($_POST['view-r-btn'])){
   
    $sql=$con->query("INSERT INTO bookings(cus_name,cus_phone,h_name,h_location,h_price,no_of_rooms,checkin_date,checkout_date,total_price) 
		VALUES ('$c_name','$c_phone','$h_name','$h_location','$h_price','$rooms','$checkin','$checkout','$total')");
		if($sql==true){
            echo "<script>alert('Booked Successfully!')</script>"; 
            echo "<a class='go-home' href='index.php'><i class='fa fa-home'></i></a>";
}
else 
echo "Error".$con->error;
}
?>
</body>
</html>