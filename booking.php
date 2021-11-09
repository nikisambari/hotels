<?php
require("lock.php");
require('config.php');
$h_name=$_GET['h_name'];
$h_loc=$_GET['h_loc'];
$h_price=$_GET['h_price'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hotel Booking</title>
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
  .go-home{
   
      display:flex;
      justify-content:center;
      align-items:center;
      top:0;
    width:100%;
    background: #fff;
    position: fixed;  
    z-index: 9999;
    border-bottom: 2px solid #dae3ff;
  }
  .go-home .go{
      padding:10px;
      font-size:2rem;
      color:#4169e1;
      text-decoration:none;
      cursor:pointer;
      font-family:Galada;

  }
  .container {
    width:100%;
    display: flex;
    justify-content: center;
    align-items: center;
    padding-top:100px;
    padding-bottom:100px;
    
 }
 .container form{
     width:40%;

 }
  .container form .booking{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    border-radius: 10px;
    background: #fff;
    width:100%;
    padding:30px;
    
  }
  .container form .booking h1 {
    color:#4169e1;
    font-family:Poppins;
    text-align:center;
  }
  .booking .input-box{
  display:inline-block; 
  margin-bottom:20px;
  padding:10px 20px;
 width: 100%;
  border-radius: 20px;
  background: #dae3ff;
  }
  .booking .input-box p{
      font-weight:600;
      color:#4169e1;

  }
  .booking .input-box input{
    display:inline-block; 
  font-family: Poppins;
  font-size: .8rem;
  
  background: #dae3ff;
  outline: none;
    border:none;
    color:#4169e1;

  
}
.booking .book-btn{
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

 
@media only screen and (max-width: 720px){
    .container form{
     width:100%;}
     .container form .booking{
   
    box-shadow:none;
     }
}
</style>
</head>
<body>
  
     <?php 
        
     $cus_name="";
   
     if(isset($_SESSION['login_user']))
     {
         $cus_name=$_SESSION['login_user'];  
       

     }
   
     
     ?> 
  
    <div class="go-home">
        <a href="index.php" class="go">Hotels</a>
    </div>
    <section class="container" id=container>
<?php
    $cname="";
    $cphone="";
    $query = "SELECT `id`, `cus_name`, `cus_phone` FROM `customer` WHERE `cus_name`='$cus_name'";
    $result = mysqli_query($con, $query);
     if(mysqli_num_rows($result) > 0){
        while($product = mysqli_fetch_assoc($result)){
          $cname=$product['cus_name'];
          $cphone=$product['cus_phone'];
        }
      }
      else
         echo "".$con->error;
            ?>
    <form method="POST" action="receipt.php" >
        <div class="booking">         
            <h1>Hotel Booking</h1>
            <?php echo "<div class='input-box'><p>Customer Name</p> <input type='text' name='cus-name' id='cus-name' value='$cname' readonly></div>";
            echo "<div class='input-box'><p>Customer Phone No.</p> <input type='text' name='cus-phone' id='cus-phone' value='$cphone' readonly></div>";
            echo "<div class='input-box'><p>Hotel Name</p> <input type='text' name='h-name' id='h-name' value='$h_name' readonly></div>";
            echo "<div class='input-box'><p>Hotel Location </p><input type='text' name='h-location' id='h-loc' value='$h_loc' readonly></div>";
            echo "<div class='input-box'><p>Price Per Room</p><input type='text' name='h-price' id='h-price' value='$h_price' readonly></div>";   
            
            ?>
            <div class="input-box"><p>No. Of Rooms </p><input type="number" name="no_of_rooms" placeholer="No. of Rooms" min="0"></div>
            <div class="input-box"><p> Check IN Date </p><input type="date" name="check-in" placeholder="Check IN Date"></div>
            <div class="input-box"><p> Check OUT Date</p> <input type="date" name="check-out" placeholder="Check OUT Date"></div>
            <button type="submit" name="book-btn" class="book-btn">Book Hotel</a>
            
   
        </div>
        </form>

    </section>

</body>
</html>

