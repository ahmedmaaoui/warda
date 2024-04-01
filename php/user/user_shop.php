<?php

@include './auth/config.php';

session_start();
$user_id = $_SESSION['user_id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="userStyle.css">
</head>
<body>
    <?php @include 'user_header.php'; ?>
      <div>

<?php

      $select_products = mysqli_query($conn,"SELECT * FROM ``")
      ?>
      </div>
    <?php @include 'userFooter.php'; ?>
  
</body>
</html>