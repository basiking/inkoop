<?php
if(isset($_POST["submit"])){
    require_once 'functies.inc.php';
    require_once 'db_connection.php';

    $gebruikersnaam = $_POST["gebruikersnaam"];
    $password = $_POST["password"];


        if (emptyInputLogin($gebruikersnaam, $password) !== false){
            header("location: ../loginpage.php?error=emptyInput");
            exit();
            
        }

    loginUser($conn, $gebruikersnaam, $password);
}
else{
    header("location: ../loginpage.php");
    exit();
}