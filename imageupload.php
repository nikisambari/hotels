<?php
include("config.php");

if(isset($_POST['but_upload'])){
 
  $name = $_FILES['file']['name'];
  $target_dir = "";
  $target_file = basename($_FILES["file"]["name"]);

  // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");

  // Check extension
  if( in_array($imageFileType,$extensions_arr) ){
    // Upload file
    if(move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name)){
       // Convert to base64 
       $image_base64 = base64_encode(file_get_contents($name) );
       $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
       // Insert record
       $query = "insert into images(image) values('".$image."')";
       mysqli_query($con,$query);
    }
    
  }
 
}
?>

<form method="post" action="" enctype='multipart/form-data'>
  <input type='file' name='file' />
  <input type='submit' value='Save name' name='but_upload'>
</form>


<?php

$sql = "select * from images";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);


            echo '<img class="hotel-img" src="data:image/jpeg;base64,' . base64_encode( $row['image'] ) . '" />';
            ?> 