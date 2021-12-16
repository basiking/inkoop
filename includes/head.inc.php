<?php
session_start();
?>
<!doctype HTML>
<html lang ="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../inkoop/css/style.css">
    <?php require 'db_connection.php'; ?>
    <title><?php echo $title; ?></title>

</head>
<body>
<div class="content">
<div class="header">
    <nav class="navigatie noPrint">
  <a href="../inkoop/index.php" class="logo">Fashion to Fashion</a>
  <div class="header-right">
    <a class="" href="../inkoop/index.php">Home</a>
    <?php
        if(isset($_SESSION["userID"])){
            echo "  <a href='../inkoop/profile.php'>Profiel</a>
                    <a href='../inkoop/includes/loguit.inc.php'>Uitloggen</a>
                    <a href='../inkoop/formulier.php'>Lijsten</a>";
        }
        else{
            echo "  <a href='../inkoop/registreren.php'>Registreren</a>
            <a href='../inkoop/loginpage.php'>Inloggen</a>";
        }
    ?>
  </div>
    </nav>
</div>