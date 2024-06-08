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

      <a href="admin_page.php" class="logo">Admin<span style="color:#29a396;;">Panel</span></a>

      <nav class="navbar">  
         <a href="dashboard.php" style =" color: #29a396; " >user</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="account-box">
         <p>username : <span style="color:#29a396;;"><?php echo $_SESSION['admin_name']; ?></span></p>
         <p>email : <span style="color:#29a396;;"><?php echo $_SESSION['admin_email']; ?></span></p>
         <a href="logout.php" class="delete-btn">logout</a>
      </div>

   </div>

</header>