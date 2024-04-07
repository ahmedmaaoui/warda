<?php
@include '../auth/config.php';
session_start();
$admin_id=$_SESSION['admin_id'];


$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>
<?php

   // $name = mysqli_real_escape_string($conn, $_POST['name']);
   // $price = mysqli_real_escape_string($conn, $_POST['price']);
   // $price_reduction = mysqli_real_escape_string($conn, $_POST['price_reduction']);
   // $details = mysqli_real_escape_string($conn, $_POST['details']);
   




// if(isset($_FILES['image']['name'])){
//    $image = $_FILES['image']['name'];
//    $image_size = $_FILES['image']['size'];
//    $image_tmp_name = $_FILES['image']['tmp_name'];
//    $image_folter = uniqid().$image;
//     move_uploaded_file($image_tmp_name,'img/' ,$image_folter);

  
// }

//    $select_product_name = mysqli_query($conn, "SELECT flower_name FROM `flowers` WHERE flower_name = '$name'") or die('query failed');

//    if(mysqli_num_rows($select_product_name) > 0){
//       echo 'product name already exist!';
//    }else{
//  $insert_product = mysqli_query($conn, "INSERT INTO `flowers` (flower_name, flower_detail, flower_price, image, flower_pice_redux) VALUES ('$name', '$details', '$price', '$image', '$price_reduction')");

//       if($insert_product){
//          if($image_size > 5000000){
//             echo 'image size is too large!';
//          }else{
//             move_uploaded_file($image_tmp_name, $image_folter);
//             echo 'product added successfully!';
//          }
//       }
//    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
  <link rel="stylesheet" href="admin_style.css">
    <title>Document</title>
    <link rel="stylesheet" href="admin_style.css">
    <style>
        .box-product{

            border-style:solid;
            border-color:red;
            padding:20px 20px;
            width:20rem;
        }
        .btn{
            background-color:red;
              width:20rem;
        }
        .boxa{
            display: grid;
  grid-template-rows: repeat(auto-fit, minmax(5rem, 1fr));
  row-gap:1.5rem;
 
        }
    </style>
  
</head>
<body>
         <?php @include 'admin_header.php'; ?>
      

      <section class="add-products">

   <form  method="post" enctype="multipart/form-data">
      <h3>add new product</h3>
       
      <!-- <input type="text" class="box-product" required placeholder="enter product name" name="name">
      <input type="number" min="0" class="box-product" required placeholder="enter product price" name="price">
      <input type="number" min="0" class="box-product" required placeholder="enter product reduction %" name="price_reduction">
      <textarea name="details" class="box-product" required placeholder="enter product details" cols="30" rows="10"></textarea> -->
        <input type="file" name="fileToUpload" id="fileToUpload" class="box-product"/>
      <input type="submit" value="Upload Image" name="submit" class="btn" />
     
   </form>

</section>
</body>
</html>