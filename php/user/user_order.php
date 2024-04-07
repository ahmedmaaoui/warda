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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>orders</title>
    <link rel="stylesheet" href="userStyle.css">
</head>
<body>
    <?php @include 'user_header.php'; ?>
   


<section class="heading">
    <h3>your orders</h3>
    <p> <a href="user_home.php">home</a> / order </p>
</section>

<section class="placed-orders">

    <h1 class="title">placed orders</h1>

    <div class="box-container">

    <?php
        $select_orders = mysqli_query($conn, "SELECT * FROM `orders` WHERE user_id = '$user_id'") or die('query failed');
        if(mysqli_num_rows($select_orders) > 0){
            while($fetch_orders = mysqli_fetch_assoc($select_orders)){
    ?>
    <div class="box">
        <p> placed on : <span><?php echo $fetch_orders['placed_on']; ?></span> </p>
        <p> name : <span><?php echo $fetch_orders['name']; ?></span> </p>
        <p> number : <span><?php echo $fetch_orders['number']; ?></span> </p>
        <p> email : <span><?php echo $fetch_orders['email']; ?></span> </p>
        <p> address : <span><?php echo $fetch_orders['address']; ?></span> </p>
        <p> payment method : <span><?php echo $fetch_orders['method']; ?></span> </p>
        <p> your orders : <span><?php echo $fetch_orders['total_products']; ?></span> </p>
        <p> total price : <span>$<?php echo $fetch_orders['total_price']; ?>/-</span> </p>
        <p> payment status : <span style="color:<?php if($fetch_orders['payment_status'] == 'pending'){echo 'tomato'; }else{echo 'green';} ?>"><?php echo $fetch_orders['payment_status']; ?></span> </p>
    </div>
    <?php
        }
    }else{
        echo '<p class="empty">no orders placed yet!</p>';
    }
    ?>
    </div>

</section>
 <?php @include 'userFooter.php'; ?>


</body>
</html>


