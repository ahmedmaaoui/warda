<?php


session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_POST['send'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $msg =  $_POST['message'];
      require_once "config.php";
    
         $select_message = mysqli_query($conn, "SELECT * FROM `client_message` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die('query failed');

    if(mysqli_num_rows($select_message) > 0){
        $message[] = 'message sent already!';
    }else{
        mysqli_query($conn, "INSERT INTO `client_message`(user_id, name, email, number, message) VALUES('$user_id', '$name', '$email', '$number', '$msg')") or die('query failed');
        $message[] = 'message sent successfully!';
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
    <title>  contact  </title>
    <link rel="stylesheet" href="userStyle.css">
</head>
<body>
    <?php @include 'user_header.php'; ?>

<section class="heading">
    <h3>contact us</h3>
    <p> <a href="user_home.php">home</a> / contact </p>
</section>

<section class="contact">

    <form action="" method="POST">
        <h3>send us message!</h3>
        <div>
        <input type="text" name="name" placeholder="enter your name" class="box" required> 
</div>
<div>
        <input type="email" name="email" placeholder="enter your email" class="box" required>
</div>
<div>
        <input type="number" name="number" placeholder="enter your number" class="box" required>
</div>
<div>
        <textarea name="message" class="box" placeholder="enter your message" required cols="30" rows="10"></textarea>
</div>
<div>
        <input type="submit" value="send message" name="send" class="btn">
</div>
    </form>

</section>

    <?php @include 'userFooter.php'; ?>
</html>