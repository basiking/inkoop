<?php
session_start();
?>
<!doctype HTML>
<html lang ="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/main.css">

    <title><?php echo $title; ?></title>
<?php require 'includes/db_connection.php'; ?>
</head>

<body>
<div class="container-fluid">
<div class="container-fluid ">
    <div class="row">
    <div class="offset-sm-1 col-sm-11">
    <a href="home.php"><img src="images/logo.png" alt="logo" class="logo"></a>
    </div>
    </div>
</div>
<nav>
<div class="container-fluid">
<ul class="nav nav-pills justify-content-center nav-fill">
  <li class="nav-item">
    <a class="nav-link active   mb-1" href="home.php">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active ml-1  mb-1" href="service.php">Service</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active ml-1  mb-1" href="overzicht.php">Voorlichting</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active ml-1  mb-1" href="contact.php">Contact</a>
  </li>
  <?php 
    if (isset($_SESSION['userID'])){
          //Data that is only shown if the user is logged in
      echo "<li class='nav-item'>";
      echo "<a class='nav-link active ml-1  mb-1' href='mijnapo.php'>Mijn apo</a></li>";
      echo "<li class='nav-item'>";
      echo "<a class='nav-link active ml-1  mb-1' href='includes/loguit.inc.php'>Loguit</a></li>";
    }
    else{
          //Data that is only shown if the user is not logged in
      echo "  <li class='nav-item'>";
      echo "<a class='nav-link active ml-1  mb-1' href='loginpage.php'>Login</a></li>";
    }
  ?>

</ul>
</nav>
</div>
</div>
</div>