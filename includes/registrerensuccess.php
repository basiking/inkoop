<?php

//check if user came from registreren page
if (isset($_POST["submit"])){

    $gebruikersnaam = $_POST["gebruikersnaam"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["passwordRepeat"];
    
    $dbhost = "localhost";
        $dbuser = "test";
        $dbpass = "test";
        $db = "pharmacy";

        $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

    //require_once 'db_connection.php';
    require_once "./functies.inc.php";
    
    //Functions from functies.inc.php
    if (emptyInputSignup($gebruikersnaam, $email, $password, $passwordRepeat) !== false){
        header("location: ../registreren.php?error=emptyInput");
        exit();
        
    }

    if (invalidGebruikersnaam($gebruikersnaam) !== false){
        header("location: ../registreren.php?error=invalidGebruikersnaam");
        exit();
        
    }

    if (invalidEmail($email) !== false){
        header("location: ../registreren.php?error=invalidEmail");
        exit();
        
    }

    if (pwdMatch($password, $passwordRepeat) !== false){
        header("location: ../registreren.php?error=passwordsdontmatch");
        exit();
        
    }

    if (gebruikersnaamExists($conn, $gebruikersnaam, $email) !== false){
        header("location: ../registreren.php?error=usernameTaken");
        exit();
        
    }

    //Creates the user
    createUser($conn, $gebruikersnaam, $email, $password, $passwordRepeat );
    
}
else{
    header("location: ../registreren.php");
    exit();
    //send user back
}



?>