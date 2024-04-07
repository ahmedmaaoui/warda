<?php

@include '../auth/config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
};

if(isset($_POST['update_product'])){

   $update_p_id = $_POST['update_p_id'];
   $name = mysqli_real_escape_string($conn, $_POST['flower_name']);
   $price = mysqli_real_escape_string($conn, $_POST['flower_price']);
   $details = mysqli_real_escape_string($conn, $_POST['flower_detail']);
   $price_reduction = mysqli_real_escape_string($conn, $_POST['flower_pice_redux']);


   mysqli_query($conn, "UPDATE `flowers` SET flower_name = '$name', flower_detail = '$details', flower_price = '$price',   flower_pice_redux='$price_reduction'  WHERE id = '$update_p_id'") or die('query failed');

   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folter = 'uploads/'.$image;
   $old_image = $_POST['update_p_image'];
   
   if(!empty($image)){
      if($image_size > 2000000){
         $message[] = 'image file size is too large!';
      }else{
         mysqli_query($conn, "UPDATE `flowers` SET image = '$image' WHERE id = '$update_p_id'") or die('query failed');
         move_uploaded_file($image_tmp_name, $image_folter);
         unlink('uploads/'.$old_image);
         $message[] = 'image updated successfully!';
         
      }
   }

   $message[] = 'product updated successfully!';
   header('location:admin_products.php');

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
   <title>update product</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">

</head>
<body>
   
<?php @include 'admin_header.php'; ?>
<section class="update-product">
 
   <h1 class="title">update</h1>

  

<?php

   $update_id = $_GET['update'];
   $select_products = mysqli_query($conn, "SELECT * FROM `flowers` WHERE id = '$update_id'") or die('query failed');
   if(mysqli_num_rows($select_products) > 0){
      while($fetch_products = mysqli_fetch_assoc($select_products)){
?>


<form  action="" method="post" enctype="multipart/form-data">
   <img src="uploads/<?php echo $fetch_products['image']; ?>" class="box-flower "  alt="">
   <div class="formfilform">
   <input type="hidden" value="<?php echo $fetch_products['id']; ?>" name="update_p_id">
   <input type="hidden" value="<?php echo $fetch_products['image']; ?>" name="update_p_image">
   <input type="text" class="box-flower " value="<?php echo $fetch_products['flower_name']; ?>" required placeholder="update product name" name="flower_name">
   <input type="number" min="0" class="box-flower " value="<?php echo $fetch_products['flower_price']; ?>" required placeholder="update product price" name="flower_price">
   <input type="number" min="0" class="box-flower " value="<?php echo $fetch_products['flower_pice_redux']; ?>" required placeholder="update product reduction" name="flower_pice_redux">
   <textarea name="flower_detail" class="box-flower " required placeholder="update product details"  cols="30" rows="10"><?php echo $fetch_products['flower_detail']; ?></textarea>
   <input type="file" accept="image/jpg, image/jpeg, image/png" class="box-flower " name="image">

   <input type="submit" value="update product" name="update_product" class="btn">
  <a href="admin_products.php" class="btn">go back</a>    
</div>
 
</form>

<?php
      }
   }else{
      echo '<p class="empty">no update product select</p>';
   }
?>


</section>













<script src="admin_script.js"></script>

</body>
</html>