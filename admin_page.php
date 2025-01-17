<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="Admin panel for managing users and accounts in the furniture system.">
   <link rel="icon" href="images/sofa.png" type="image/x-icon">
   <title>Admin Panel</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin.css">

</head>
<body>
   
<?php include 'admin_header.php'; ?>

<!-- admin dashboard section starts  -->

<section class="dashboard">

   <h1 class="title">dashboard</h1>

   <div class="box-container">

      <div class="box">
         <?php 
            $select_users = mysqli_query($conn, "SELECT * FROM `furniture_form` WHERE user_type = 'user'") or die('query failed');
            $number_of_users = mysqli_num_rows($select_users);
         ?>
         <h3><?php echo $number_of_users; ?></h3>
         <p style="color: #29a396;">normal users</p>
      </div>

      <div class="box">
         <?php 
            $select_admins = mysqli_query($conn, "SELECT * FROM `furniture_form` WHERE user_type = 'admin'") or die('query failed');
            $number_of_admins = mysqli_num_rows($select_admins);
         ?>
         <h3><?php echo $number_of_admins; ?></h3>
         <p style="color: #29a396;">admin users</p>

      </div>

      <div class="box">
         <?php 
            $select_account = mysqli_query($conn, "SELECT * FROM `furniture_form`") or die('query failed');
            $number_of_account = mysqli_num_rows($select_account);
         ?>
         <h3><?php echo $number_of_account; ?></h3>
         <p style="color: #29a396;">total accounts</p>
      </div>
</section>
<script src="js/admin_script.js"></script>
</body>
</html>
