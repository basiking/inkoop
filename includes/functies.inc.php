<?php
//Checks if the signup data is not empty
function emptyInputSignup($gebruikersnaam, $email, $password, $passwordRepeat){
    $result = true;
    if (empty($gebruikersnaam) || empty($email) || empty($password) || empty($passwordRepeat)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

//Checks if the username is valid (no weird characters)
function invalidGebruikersnaam($gebruikersnaam){
    $result = true;
    if (!preg_match("/^[a-zA-Z0-9]*$/" ,$gebruikersnaam )){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

//Checks if the email is valid
function invalidEmail($email){
    $result = true;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

//Checks if the passwords are the same
function pwdMatch($password, $passwordRepeat){
    $result = true;
    if ($password !== $passwordRepeat){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

//Checks if the username and email already exist in the database
function gebruikersnaamExists($conn, $gebruikersnaam, $email){
    $sql = "SELECT * FROM gebruiker WHERE Gebruikersnaam = ? OR Email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../registreren.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $gebruikersnaam, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

//Function for creating an user
function createUser($conn, $gebruikersnaam, $email, $password){
    $sql = "INSERT INTO gebruiker (Gebruikersnaam, Wachtwoord, Email) VALUES (?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../registreren.php?error=stmtfailed");
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $gebruikersnaam, $hashedPassword, $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../registreren.php?error=none");
    exit();
}

//Checks if the user actually entered some data
function emptyInputLogin($gebruikersnaam, $password){
    $result = true;
    if (empty($gebruikersnaam) || empty($password) ){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

//Function that logs in the user
function loginUser($conn, $gebruikersnaam, $password){
    $gebruikerExists = gebruikersnaamExists($conn, $gebruikersnaam, $gebruikersnaam);

    if ($gebruikerExists === false) {
        header("location: ../loginpage.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $gebruikerExists["Wachtwoord"];
    $checkPassword = password_verify($password, $pwdHashed);

    if ($checkPassword === false){
        header("location: ../loginpage.php?error=wronglogin");
        exit();
    }
    else if ($checkPassword === true){
        session_start();
        $_SESSION["userID"] = $gebruikerExists["GebruikerID"];
        $_SESSION["username"] = $gebruikerExists["Gebruikersnaam"];
        $_SESSION["email"] = $gebruikerExists["Email"];
        $_SESSION["creationDate"] = $gebruikerExists["aanmaakDatum"];
        $_SESSION["adminstatus"] = $gebruikerExists["isAdmin"];
        header("location: ../index.php?error=sheesh");
        exit();
    }
}