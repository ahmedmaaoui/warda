<header class="header-user">
 
    <div class="flex-user">

        <a href="user_home.php" ><img class="logo-warda" src="../img/Wardalogo.svg" alt=""></a>

        <nav class="navbar-user">
            <ul>
                <li><a href="user_home.php">home</a></li>
               
                   
                 
                <li><a href="user_contact.php">contact</a></li>
                 
            
                <li><a href="user_shop.php">shop</a></li>
                <li><a href="user_order.php">orders</a></li>
           
            </ul>
        </nav>

        <div class="icons-user">
            <div id="menu-btn-user" class="fa fa-bars"></div>
            <a href="search_page.php" class="fa fa-search"></a>
       
            <i id="user-btn-user" class="fa fa-user" aria-hidden="true"></i>
           
            <a href="wishlist.php"><i class="fa fa-heart"></i><span>(0)</span></a>
           
            <a href="cart.php"><i class="fa fa-shopping-cart"></i><span>(0)</span></a>
        </div>

        <!-- <div class="account-box-user">
            <p>username : <span><?php echo $_SESSION['user_name']; ?></span></p>
            <p>email : <span><?php echo $_SESSION['user_email']; ?></span></p>
            <a href="logout.php" class="delete-btn-user">logout</a>
        </div> -->

    </div>

</header>