<?php

require('config.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>More Hotels</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adminpanel-css.css"/>
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
.home{
  background-image: url("images/bg.jpg");
  background-size: cover;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-position: center;
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
}
.home a{
  text-decoration: none;
  margin-top:10px;
  color:#4169e1;
  background:#fff;
  padding: 15px 30px;
  border-radius: 30px;
  text-transform: uppercase;
  transition: .2s all;
  font-weight: 600;
  box-shadow:  0px 0px 20px #4169e1;;
}
.home a:hover{
  padding: 15px 40px;
 }

.home h1{
  font-size: 3rem;
  color:#fff;
  text-shadow: 0px 0px 20px #4169e1;
}
.hotels{
  width: 100%;
  padding-top:50px;
 
}
.hotels h1{
  color:#4169e1;
  text-align: center;
  font-family: Galada;

}
.hotels .hotel-box{
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items:center;
  width:100%;
}
.hotels .hotel-box .card {
  margin:20px;
  display: flex;
  justify-content:center;
  align-items:center;
  flex-direction: column;

  width:300px;
  height:500px;
  border-radius: 10px;


}
/*.hotels .hotel-box .card .ratings{
  color:#4169e1;
  background:rgba(0, 89, 255, 0.2);
  width:20%;
  text-align: center;
  padding: 5px;
  position: relative;
  top:50px;
  left:10px;
}*/
.hotels .hotel-box .card .hotel-img{
width:100%;
border-radius:10px;
object-fit: fill;
box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
}
.hotels .hotel-box .card .content{
  width: 100%;
  padding:15px 0;
  
}
.hotels .hotel-box .card .content h3{
  text-align: center;
}
.hotels .hotel-box .card .content p{
  padding-top: 10px;
  font-size: .8rem;
  text-align: justify;
}
.hotels .hotel-box .card .content .c-box{
  padding:20px 5px;
  display: flex;
  justify-content:space-between;
  align-items: center;

}
.hotels .hotel-box .card .content .c-box h4{
  color:#4169e1;
}
.hotels .hotel-box .card .content  .view-details{
  width:100%;
  background: rgba(0, 89, 255, 0.2);
  padding: 10px 40px;
  border-radius: 10px;
  text-decoration: none;
  color:#4169e1;
  border: none; font-weight:600;
  transition: all .5s;
}
.hotels .hotel-box .card .content  .view-details:hover{
  background: #4169e1;
  color: #fff;
}


 </style>

 </head>
 <body>
 <section id="hotels" class="hotels">
       <h1 class="heading">HOTELS</h1>
  

      <div class="hotel-box">
    <?php $query = "SELECT `id`, `h_name`, `h_location`, `h_price`, `h_description`, `h_image`, `h_ratings` FROM `hotels_list`";
    $result = mysqli_query($con, $query);
     if(mysqli_num_rows($result) > 0){
        while($product = mysqli_fetch_assoc($result)){
           ?>
        <form>
          <div class="card">
          
            <?php
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
              <button type="submit" class="view-details" name="view-details">Book Now</button>
             
            </div>
        </div>
        </form>
     
      <?php		
		}
	}
	?>
 </div>
  </section>
</body>
</html>