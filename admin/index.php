<?php
require('lock.php');
require('../config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adminpanel-css.css"/>
    <link rel="stylesheet" href="mobilenav.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Galada' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
 
.box{
    
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    border-radius: 10px;
    padding:30px;
    background: #fff;
    width:40%;
  
 
  
  }
  
 
 .box h1 {
    color:#4169e1;
    font-family:Poppins;
    text-align:center;
    
 }
  

.box textarea{
    resize: none;
}
.box input:focus{
 outline: none;
}
  .box input,textarea{
  margin-bottom:20px;
  padding:10px 20px;
  width:100%;
  font-family: Poppins;
  font-size: 1rem;
  border-radius: 20px;
  background: #dae3ff;
  outline: none;
border:none;
color:#4169e1;

  
}
.box .add-btn{
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
  .container
  {padding:10px;
    padding-top: 20%;
    
  }
  .box{ 
    width:100%;
  }
  }
  </style>
</head>
<body>
<div class="navigation">
<?php
include('adminmenu.php')
?>
</div>
<div class="container">
  <div class="box">
    <form method="post" enctype="multipart/form-data">
      <h1>Add Hotel Details</h1>
      <input type="text" name="h-name" id="h-name" placeholder="Hotel Name">
      <input type="text" name="h-location" id="h-location" placeholder="Location">
      <input type="text" name="h-price" id="h-price" placeholder="Price">
      <textarea  name="h-description" id="h-description"  rows="8" placeholder="Desrciption"></textarea>
      <input type='file' name='file' id="image"/>


      <button type="submit" name="add-btn" id="add-btn" class="add-btn">Add Hotel</button>
    </form>
  </div>
</div>
<?php
if(isset($_POST['add-btn'])){

 $hname=$_POST['h-name'];
 $hloaction=$_POST['h-location'];
 $hprice=$_POST['h-price'];
 $hdescription=$_POST['h-description'];
 $image = addslashes(file_get_contents($_FILES["file"]["tmp_name"]));  
     
 // Insert record
      $query="INSERT INTO  `hotels_list` (h_name,h_location,h_price,h_description,h_image) VALUES ('$hname', '$hloaction', '$hprice','$hdescription', '$image')";
   
      $rs=mysqli_query($con,$query);
      if($rs){
        echo '<script>alert("Hotel Details Added Successfully");</script>';
      }

      else 
        echo '<script>alert("ERROR!!'.$con -> error.'")</script>';
  
    
}

?>
    <script>  
 $(document).ready(function(){  
      $('#add-btn').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
      });  
 });  
 </script>  
</body>
</html>