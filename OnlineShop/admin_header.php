<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">

   <div class="flex">

      <a href="admin_page.php" class="logo">Panou<span>Administrator</span></a>

      <nav class="navbar">
         <a href="admin_page.php">Acasa</a>
         <a href="admin_products.php">Produse</a>
         <a href="admin_orders.php">Comenzi</a>
         <a href="admin_users.php">Utilizatori</a>
         <a href="admin_contacts.php">Mesaje</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="account-box">
         <p>username : <span><?php echo $_SESSION['admin_name']; ?></span></p>
         <p>email : <span><?php echo $_SESSION['admin_email']; ?></span></p>
         <a href="logout.php" class="delete-btn">Deconectare</a>
         <div>Nou <a href="login.php">Autentificare</a> | <a href="register.php">Inregistrare</a> </div>
      </div>

   </div>

</header>