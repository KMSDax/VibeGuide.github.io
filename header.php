<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>




  <meta charset="UTF-8">
  <title>VibeGuide</title>

  <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
  <link href="https://api.mapbox.com/mapbox-gl-js/v2.13.0/mapbox-gl.css" rel="stylesheet">
  <script src="https://api.mapbox.com/mapbox-gl-js/v2.13.0/mapbox-gl.js"></script>
  <script
    src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
  <link rel="stylesheet"
    href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css" type="text/css">

  <link href="index.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://kit.fontawesome.com/8f4da38e87.js" crossorigin="anonymous"></script>
  <style>

  </style>

</head>

<body>








  <div class="box-area">
    <header>
      <div class="wrapper">

      </div>
      <nav>
        <a class="active" href="index.php"><i class="fa-solid fa-house"></i> Home</a>
        <a href="#"><i class="fa-solid fa-bolt"></i>About Us</a>
        <a href="#"><i class="fa-solid fa-magnifying-glass"></i>Search</a>
        <a href="#"><i class="fa-solid fa-location-dot"></i>Vibes</a>
        <?php
        if (isset($_SESSION["username"])) {
          echo "<a href='profile.php'><i class='fa fa-fw fa-user'></i>Profile</a>";
          echo "<a href ='includes/logout.inc.php'><i class='fa fa-fw fa-user'></i>Logout</i></a>";
        } 
        else {
          echo "<a href='login.php'><i class='fa fa-fw fa-user'></i> Login</a>";
          echo "<a href ='signup.php'><i class='fa fa-fw fa-user'></i>Register</i></a>";
        }

        ?>
        <a href='contact.php'><i class="fa fa-fw fa-envelope"></i> Contact</a>
      </nav>
  </div>
  </header>