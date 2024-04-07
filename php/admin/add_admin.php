


<?php
//l'appel du base de donnée
 require_once '../auth/config.php';

if (isset($_POST["submit"])) {
         
           $username = $_POST["username"];
           $email = $_POST["email"];
           $password = $_POST["password"];
           $passwordRepeat = $_POST["repeat_password"] ;
           $user_type = "admin" ;


           //tableau pour stockee les messags d'erreurs
           $errors = array();
           
           //les conditions d'erreur
           //valeur vide
           if (empty($username)  OR empty($email) OR empty($password) OR empty($passwordRepeat)) {
            array_push($errors,"All fields are required");
           }
           //verifier l'ecriture d'un email
           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid");
           
           }
           //verifier l'equivallance du mot de passe

           if ($password!==$passwordRepeat) {
            array_push($errors,"Password does not match");
           }

       $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) > 0) {
        $errors[] = "Email already exists";
    }

    mysqli_stmt_close($stmt);
     } 
    if (empty($errors)) {
        // $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $insert_sql = "INSERT INTO users (username, email, password, user_type) VALUES (?, ?, ?, ?)";
        $insert_stmt = mysqli_prepare($conn, $insert_sql);
        mysqli_stmt_bind_param($insert_stmt, "ssss", $username, $email, $password, $user_type);
        mysqli_stmt_execute($insert_stmt);
        mysqli_stmt_close($insert_stmt);
        
      $errors[]="You are registered successfully.";
        
       
    } else {
        foreach ($errors as $error) {
            echo "<div class='alert alert-danger'>$error</div>";
        }
    }
            
            // $sql = "INSERT INTO users (username , email, password ,user_type) VALUES ('$username', '$email', '$password','$user_type' )";
            // $stmt = mysqli_stmt_init($conn);
            // $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
            // if ($prepareStmt) {
            //     // mysqli_stmt_bind_param($stmt,"ssss",$username, $email, $password, $user_type);
            //     mysqli_stmt_execute($stmt);
            //     echo "<div class='alert alert-success'>You are registered successfully.</div>";
             
            // }else{
            //     die("Something went wrong");
            // }
           
          

        




?>

<section class="form-container-add-admin">

   <form action="" method="post">
      <h3>ADD ADMIN</h3>
      <input type="text" name="username" class="box-product" placeholder="enter your username" required>
      <input type="email" name="email" class="box-product" placeholder="enter your email" required>
      <input type="password" name="password" class="box-product" placeholder="enter your password" required>
      <input type="password" name="repeat_password" class="box-product" placeholder="confirm your password" required>
      <input type="submit" class="btn" name="submit" value="add">
 
   </form>

</section>