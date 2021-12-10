<?php
if (isset($_POST["submit"])){
echo "a";
$aantaldozen = $_POST["aantaldozen"];
$factuurnummer = $_POST["factuurnummer"];

require_once 'db_connection.php';
require_once 'functies.inc.php';

$sql = "INSERT INTO inkoop (aantalDozen, factuurNummer)
        VALUES ($aantaldozen, $factuurnummer)";
        if (mysqli_query($conn, $sql)){
            header("location: ../lijstmaken.php?error=succesaangemaakt");
            exit();
        } else{
            echo "Error: " . $sql . " " . mysqli_error($conn);

        }
        mysqli_close($conn);
}
else{
header("location: ../index.php");
exit();
}