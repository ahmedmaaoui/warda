<?php

@include '../auth/config.php';
session_start();
$admin_id=$_SESSION['admin_id'];

?>
<section class="show-products-admin">

   <div class="box-container-product">

      <?php
         $select_products = mysqli_query($conn, "SELECT * FROM `flowers`") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
      <div class="box-flower">
         <div class="price"><?php echo $fetch_products['flower_price']; ?> dt remise  -<?php echo $fetch_products['flower_pice_redux']; ?> %</div>
         <img class="image" src="uploads/<?php echo $fetch_products['image']; ?>" alt="">
         <div class="name"><?php echo $fetch_products['flower_name']; ?></div>
         <p class="details"><?php echo $fetch_products['flower_detail']; ?></p>
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