<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

//assign variables to post data
include 'includes/head.inc.php';
$gebruikerID = $_SESSION["userID"];
$productType = $_POST['productType'];
$kleur = $_POST['kleur'];
$merk = $_POST['merk'];
$artikelnummer = $_POST['artikelnummer'];
$XS = $_POST['xs'];
$S = $_POST['s'];
$M = $_POST['m'];
$L = $_POST['l'];
$XL = $_POST['xl'];
$XXL = $_POST['xxl'];
$M44 = $_POST['44'];
$M46 = $_POST['46'];
$M48 = $_POST['48'];
$M50 = $_POST['50'];
$nieuw = $_POST['nieuw'];
$inkoopID = $_POST['inkoopID'];
$extra = $_POST['Extra'];

if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

//prepared statement
$sql = "INSERT INTO inkooprij (GebruikerID, XS, S, M, L, XL, XXL, `44`, `46`, `48`, `50`, isNieuw, Extra, inkoopID, productType, kleur, merk, artikelnummer) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
if($query = $conn->prepare($sql)){
    $query->bind_param("iiiiiiiiiiiisissss", $gebruikerID, $XS, $S, $M , $L ,$XL, $XXL, $M44, $M46, $M48, $M50, $nieuw, $extra, $inkoopID, $productType, $kleur, $merk, $artikelnummer);
    $query->execute();
    header("location: ../inkoop/info.php?ID=$inkoopID");
    exit();
}else{
    $error = $conn->errno . ' ' . $conn->error;
    echo $error;
}

?>