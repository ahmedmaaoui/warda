<?php
@include 'config.php';

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


    
    <div class="container">
        <h1>  Welcome <?php echo $_SESSION['user_name']; ?> </h1>
        <a href="logout.php" class="btn btn-warning">Logout</a>
         <?php @include '../show_product.php'; ?>
    </div>

<?php @include 'userFooter.php'; ?>
</body>
</html>