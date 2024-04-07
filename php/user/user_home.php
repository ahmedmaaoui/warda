<?php
@include '../auth/config.php';

session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
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
    <title>  welcome  </title>
<link rel="stylesheet" href="userStyle.css">
<style>



</style>
    
</head>
<body>
 
 <?php @include 'user_header.php'; ?>
<section class="header_user_box">
 
   <div class="content">
   
       <img class="logo-warda" src="../img/Wardalogo.svg" alt="">
      <h1 >The Gift of Flowers </h1>
      <a href="user_shop.php" class="btn" >discover more</a>
   </div>
   <div class="content">

  
   </div>

</section>

<section class="products">

   <h1 class="title">latest products</h1>

   <div class="box-container">

      <?php
         $select_products = mysqli_query($conn, "SELECT * FROM `flowers` LIMIT 6") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
      <form action="" method="POST"  class="box">
         <a href="view_flower.php?pid=<?php echo $fetch_products['id']; ?>" class="fa fa-eye"></a>
         <div class="price"><?php echo $fetch_products['flower_price']; ?> dt /- dt<?php echo $fetch_products['flower_pice_redux']; ?></div>
         <img src="../admin/uploads/<?php echo $fetch_products['image']; ?>" alt="" class="image">
         <div class="name"><?php echo $fetch_products['flower_name']; ?></div>
         <input type="number" name="product_quantity" value="1" min="0" class="qty">
         <input type="hidden" name="product_id" value="<?php echo $fetch_products['id']; ?>">
         <input type="hidden" name="product_name" value="<?php echo $fetch_products['flower_name']; ?>">
         <input type="hidden" name="product_price" value="<?php echo $fetch_products['flower_price']; ?>">
         <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
         <input type="submit" value="add to wishlist" name="add_to_wishlist" class="btnhome">
         <input type="submit" value="add to cart" name="add_to_cart" class="btnhome">
      </form>
      <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>

   </div>

   <div class="more-btn">
      <a href="shop.php" class="option-btn">load more</a>
   </div>

</section>


    
    <div class="container">
        <h1>  Welcome <?php echo $_SESSION['user_name']; ?> </h1>
        <a href="logout.php" class="btn btn-warning">Logout</a>
         <?php @include '../show_product.php'; ?>
    </div>

<?php @include 'userFooter.php'; ?>
</body>
</html>