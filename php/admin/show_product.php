<?php

@include '../auth/config.php';
session_start();
$admin_id=$_SESSION['admin_id'];

?>
<section class="show-products">

   <div class="box-container">

      <?php
         $select_products = mysqli_query($conn, "SELECT * FROM `flowers`") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
      <div class="box">
         <div class="price"><?php echo $fetch_products['flower_price']; ?> dt /-<?php echo $fetch_products['flower_pice_redux']; ?> %</div>
         <img class="image" src="uploads/<?php echo $fetch_products['image']; ?>" alt="">
         <div class="name"><?php echo $fetch_products['flower_name']; ?></div>
         <div class="details"><?php echo $fetch_products['flower_detail']; ?></div>
         <a href="admin_update_product.php?update=<?php echo $fetch_products['id']; ?>" class="option-btn">update</a>
         <a href="admin_products.php?delete=<?php echo $fetch_products['id']; ?>" class="delete-btn" onclick="return confirm('delete this product?');">delete</a>
      </div>
      <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>
   </div>
   

</section>