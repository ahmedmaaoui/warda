<?php
@include '../auth/config.php';
session_start();
$admin_id=$_SESSION['admin_id'];

$image ="";
   $image_size=0;


if(isset($_POST['add_product'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $price = mysqli_real_escape_string($conn, $_POST['price']);
   $price_reduction = mysqli_real_escape_string($conn, $_POST['price_reduction']);
   $details = mysqli_real_escape_string($conn, $_POST['details']);
  
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folter = 'uploads/'.$image;

   $select_product_name = mysqli_query($conn, "SELECT flower_name FROM `flowers` WHERE flower_name = '$name'") or die('query failed');

   if(mysqli_num_rows($select_product_name) > 0){
      echo  'product name already exist!';
   }else{
      $insert_product = mysqli_query($conn, "INSERT INTO `flowers`(flower_name, flower_detail, flower_price, image ,flower_pice_redux) VALUES('$name', '$details', '$price', '$image' ,'$price_reduction')") or die('query failed');

      if($insert_product){
         if($image_size > 5000000){
            echo 'image size is too large!';
         }else{
            move_uploaded_file($image_tmp_name, $image_folter);
            echo 'product added successfully!';
         }
      }
   }

}

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
    <link rel="stylesheet" href="admin_style.css">
    <!-- <style>
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
    </style> -->
  
</head>
<body>
         <?php @include 'admin_header.php'; ?>
      <?php echo $_SESSION['admin_name']; ?>

      <section class="add-products">

   <form action="" method="POST"  class="boxa" enctype="multipart/form-data">
      <h3>add new product</h3>
      <input type="text" class="box-product" required placeholder="enter product name" name="name">
      <input type="number" min="0" class="box-product" required placeholder="enter product price" name="price">
      <input type="number" min="0" class="box-product" required placeholder="enter product reduction %" name="price_reduction">
      <textarea name="details" class="box-product" required placeholder="enter product details" cols="30" rows="10"></textarea>
        <input type="file" accept="image/jpg, image/jpeg, image/png" required class="box" name="image">
      <input type="submit" value="add product" name="add_product" class="btn">
   </form>

</section>
<?php @include 'show_product.php'; ?>

<script src="admin_script.js"></script>
</body>
</html>