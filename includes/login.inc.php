<?php
if(isset($_POST["submit"])){
    require_once 'db_connection.php';
    require_once 'functies.inc.php';

    $gebruikersnaam = $_POST["gebruikersnaam"];
    $password = $_POST["password"];

        //$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        if (emptyInputLogin($gebruikersnaam, $password) !== false){
            header("location: ../loginpage.php?error=emptyInput");
            exit();
            
        }

    loginUser($conn, $gebruikersnaam, $password);
}
else{
    header("location: ../login.php");
    exit();
}