<header class="header-admin">

    <div class="flex-admin">

        <a href="admin_home.php" ><img class="logo-warda" src="uploads/Wardalogo.svg" alt=""></a>

        <nav class="navbar-admin">
            <ul>
                <li><a href="admin_home.php">home</a></li>
                <li><a href="admin_products.php">products</a></li>
                <li><a href="admin_users.php">users</a></li>
                <li><a href="admin_orders.php">orders</a></li>
                <li><a href="admin_messages.php">messages</a></li>
           
            </ul>
        </nav>

        <div class="icons-admin">
            <i id="menu-btn" class="fa fa-bars"></i>
         <i id="user-btn" class="fa fa-user"></i>

        </div>

      <div class="account-box">
         <p>username : <span><?php echo $_SESSION['admin_name']; ?></span></p>
         <p>email : <span><?php echo $_SESSION['admin_email']; ?></span></p>
         <form method ="post" class="logout">
                <button name="logout" class="logout-btn"> logout </button>
         </form>
         <?php
// Inclure le fichier de configuration et démarrer la session si ce n'est pas déjà fait
include '../auth/config.php';
session_start();

// Vérifier si le bouton de déconnexion est soumis
if(isset($_POST['logout'])) {
    // Détruire toutes les données de session
    session_unset();
    session_destroy();
    
    // Rediriger l'utilisateur vers la page de connexion par exemple
    header("Location: ../auth/login.php");
    exit;
}
?>
        
      </div>
          






 

            
        </div>

    </div>

</header>