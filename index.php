<?php
require('config.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home-css.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Galada' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
 
.hotels{
  width: 100%;
  padding-top:50px;
  display: flex;
  justify-items: center;
  flex-direction:column;
  align-items: center;
 
}
.hotels .hotel-box .card .content{
  width: 100%;
  padding:15px 0;
  display:flex;
  flex-direction:column;
  justify-content:center;
  
}
.hotels .hotel-box .card .content  .view-details{
  width:100%;
  text-align:center;
  background: rgba(0, 89, 255, 0.2);
  padding: 10px 40px;
  border-radius: 10px;
  text-decoration: none;
  color:#4169e1;
  border: none;
  font-weight:600;
  transition: all .5s;
}
.hotels .hotel-box .card .content  .view-details:hover{
  background: #4169e1;
  color: #fff;
}
.hotels .view-all{

  text-decoration:none;
  padding:10px 60px;
  background:rgba(0, 89, 255, 0.2);
  cursor:pointer;
  color:#4169e1;
  border-radius:20px;
  transition: all .5s;
  font-weight:600;
}
.hotels .view-all:hover{
  background: #4169e1;
  color: #fff;
}


.about{
  padding: 50px;
}
.about h1{
  color:#4169e1;
  text-align: center;
  font-family: Galada;

}
.about #about-us{
  color:#000;
  text-align: justify;
  font-size:.9rem;
}

.footer{
  background-color:#fff;
	width: 100%;
  border-top:1px solid #dae3ff;
	margin-top: 80px;
	overflow: hidden;
}

.footer .box-container{
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
  padding: 40px;
}


.footer .box-container .box h3{
  padding-top:20px;
  color:#4169e1;
}
.footer .box-container .box #s-icon{
  position: relative;
  padding:7px 10px;
  font-size: 2rem;
  border-radius:20px;
  background: #fff;
  margin-right: 5px;
}
.footer .box-container .box #s-icon:hover{
    box-shadow:0 0 10px #4267B2;
    bottom: -5px;
}
.footer .box-container .box .address{
padding-top:10px;
margin:0; 
color:#4169e1;
font-size:.9rem;
}

.footer .box-container .box a{
  font-size:.9rem;
  display: block;
  text-decoration: none;
  margin-bottom: 10px;
  color:#4169e1;
}

.footer .box-container .box a:hover{
  color:#000;
}
.footer .box-container .box form{
  width: 100%;
  display: flex;
  justify-content:center;
  align-items: center;
  flex-direction: column;
}
.footer .box-container .box form input,textarea,.query-btn{
  width: 100%;
  margin-bottom: 5px;
  border-radius: 10px;
  padding:10px 20px;
  outline: none;
  border: none;
  color:#4169e1;
  background: rgba(0, 89, 255, 0.2);
}
.footer .box-container .box form .query-btn{
  background:#4169e1;
  color:#fff;
  transition: .2s all;
}
.footer .box-container .box form .query-btn:hover{
  opacity:.7;
}
.footer .box-container .box form textarea{
  resize: none;
}
.footer .credit{
  padding:20px;
  margin-top: 10px;
  text-align: center;
  font-weight: normal;
  color:#000;
  border-top:1px solid #dae3ff;
}

.footer .credit span{
  color:#4169e1;
}
.log li{
  display: inline-block;
  margin: 0 20px;
  border-radius: 15px;
  padding:10px;

}
.log li .cus_name{
  color:#fff;
}
.log li a{
  text-decoration:none;
  color:#fff;

}
.sticky .log li a{
  color:#131419;
}

.sticky .log li .cus_name{
  color:#131419;
}
.sticky .log li a:hover{
  color:#4169e1;
}
</style>
</head>
<body>
   <nav class="navbar">
        <div class="logo">
            <h1>Hotels</h1>
        </div>   
        <?php 
        
        $cus_name="";
      
        if(isset($_SESSION['login_user']))
        {
            $cus_name=$_SESSION['login_user'];  
          

        }
      
        
        ?>      
        <ul class="nav-menu">
            <li class="nav-item"><a href="#home">Home</a></li>
            <li class="nav-item"><a href="#about">About us</a></li>           
        </ul>
        <ul class="log" id="items">

          <li class="nav-item">
                  <a href="cus_login.php"><i class="material-icons">person</i></a>
              </li>
              <li class="nav-item">
                  <span class="cus_name">Hi! <?php echo $cus_name; ?></span> <a  href="logout.php"><i  style="font-size:1.2rem" class="fa fa-sign-out"></i></a>
              </li>
       </ul>
                    <script>
                  var s='<?php echo $cus_name;?>';
                  if(s===""){
                    document.getElementById("items").children[1].style.display = "none";
                    document.getElementById("items").children[0].style.display = "block";

                  }
                  else{
                    document.getElementById("items").children[0].style.display = "none";
                    document.getElementById("items").children[1].style.display = "block";

                  }

            </script>
       
        <div class="mobile-view">
            <ul class="mobile-tab">
              <li><a href="#home"><i class='fa fa-home'></i></a>
                <span class="tooltiptext">Home</span>
            </li>
            <li><a href="#hotels"><i class="fa fa-map-o" aria-hidden="true"></i></a>
              <span class="tooltiptext">Explore</span>
            </li>
            <li ><a href="#"><i class="material-icons">favorite</i></a>
                <span class="tooltiptext">Favourites</span>
            </li>
              <li><a href="login.html"><i class="fa fa-user" aria-hidden="true"></i></a>
                <span class="tooltiptext">Profile</span>
            </li>
            </ul>
        </div>
     
    </nav>
    <script type="text/javascript">
          window.addEventListener("scroll",function(){
            var nav =document.querySelector("nav");
            nav.classList.toggle("sticky",window.scrollY>50);
              })
    </script>
    

  <div class="search-box">
        <button class="btn-search"><i class="fa fa-search"></i></button>
        <input type="text" class="input-search" placeholder="Search Your Destination">
  </div>
  <section id="home" class="home">
        <h1>Explore Amazing Hotels</h1>
        <a href="#hotels" id="exlpore-btn">Explore More</a>
                
  </section>


  <section id="hotels" class="hotels">
       <h1 class="heading">Popular Stays</h1>
  

      <div class="hotel-box">
    <?php 

    $query = "SELECT `id`, `h_name`, `h_location`, `h_price`, `h_description`, `h_image`, `h_ratings` FROM `hotels_list` LIMIT 3";
    $result = mysqli_query($con, $query);
     if(mysqli_num_rows($result) > 0){
        while($product = mysqli_fetch_assoc($result)){
           ?>
        <form>
          <div class="card">
            <?php
            $h_name=$product['h_name'];
            $h_loc=$product['h_location'];
            $h_price=$product['h_price'];
            echo '<img class="hotel-img" src="data:image/jpeg;base64,' . base64_encode( $product['h_image'] ) . '" />';
            ?> 
            <div class="content">
              <h3>
                <?php echo $product['h_name'] . ", ". $product['h_location'];  ?>
              </h3>
              <p><?php echo $product['h_description'] ;?></p>
              <div class="c-box">
                  <h4> &#8377; <?php echo $product['h_price'];  ?></h4> 
                  <h4 class="ratings"> <?php echo $product['h_ratings'] ?> <i class="fa fa-star"> </i> </h4>

             
              </div>
              <a href="booking.php?h_name=<?=$h_name?>&h_loc=<?=$h_loc?>&h_price=<?=$h_price?>" class='view-details' name="booknow-btn" name='view-details'>Book Now</a>
              
            </div>
        </div>
        </form>
     
      <?php		
		}
	}
	?>
  <?php 
  if(isset($_POST['booknow-btn']))
  {
    header("Location:booking.php");
  }
  ?>
  </div>
  <a href="allhotels.php" class="view-all" name="view-all" id="view-all">View All</a>

  </section>

<section class="about" id="about">
<h1 class="heading">About Us</h1>
<p id="about-us">
Hotels' search allows users to compare hotel prices in just a few clicks from more than 300 booking sites for more than 5.0 million hotels and other types of accommodation in over 190 countries. We help millions of travelers each year compare deals for hotels and accommodations. Get information for weekend trips to cities like Mumbai or Bengaluru and you can find the right hotel on trivago quickly and easily. Delhi and its surrounding area are great for trips that are a week or longer with the numerous hotels available.
</p>
<br>
<p id="about-us">
With Hotels' you can easily find your ideal hotel and compare prices from different websites. Simply enter where you want to go and your desired travel dates, and let our hotel search engine compare accommodation prices for you. To refine your search results, simply filter by price, distance (e.g. from the beach), star category, facilities and more. From budget hostels to luxury suites, trivago makes it easy to book online. You can search from a large variety of rooms and locations across India, like Shimla and Jaipur to popular cities and holiday destinations abroad!
</p>
</section>





<footer class="footer">

  <div class="box-container">
    <div class="box">
      <h3>Stay Connected With Us</h3>
      <i id="s-icon" class="fa fa-facebook-square" style="color:#4267B2"></i>
      <i id="s-icon" class="fa fa-twitter-square"  style="color:#1DA1F2"></i>
      <i  id="s-icon" class="fa fa-linkedin-square"  style="color:#0077b5"></i>
      <i  id="s-icon" class="fa fa-instagram" style="color:#e1306c"></i>
      <i  id="s-icon" class="fa fa-whatsapp"  style="color:#25D366"></i>
      <h3>Address</h3>
      <p class="address">
        Corporate Office :
        Doon House, B-275(A),<br>First floor Sector-57,<br>Shushant Lok 3 Near Hong Kong Bazzar,<br>Gurugram Pin 122001, Haryana.
       <br><i class="fa fa-phone"></i> +91-9122588799</p>
    </div>
      <div class="box">
          <h3>Quick Links</h3>
          <a href="#home">Home</a>
          <a href="#hotels">Destinations</a>
          <a href="#services">Services</a>
          <a href="#offers">Exclusive Deals</a>
          <a href="#review">Testimonials</a>
          <a href="#about">About us</a>
      </div>
      <div class="box">
        <h3>Discuss Your Queries with us</h3>
        <form method="POST" action="">
          <input type="text" name="email" id="email" placeholder="Email Address">
          <textarea name="query" id="query" cols="30" rows="10" placeholder="Any Query.."></textarea>
          <button class="query-btn" name="send">Send</button>
        </form>
        </div>

     

  </div>

  <p class="credit"> created by <span> Xyz Company </span> | all rights reserved! </p>

</footer>

</body>
</html>
