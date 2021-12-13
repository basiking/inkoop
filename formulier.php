<?php $title = "Formulier";
 require 'includes/head.inc.php';
 $admin = false;

if($_SESSION['adminstatus'] == "1"){
    $admin = true;
    }
    else{
            header("location: ../inkoop/index.php?error=notallowed");
    exit();
    }
    
    if ($admin){
        echo "Admin status: ja";
        echo "<h2>Ingevulde lijsten</h2>";

        $sql = "SELECT * FROM inkoop ORDER BY datum DESC;";
        $result = mysqli_query($conn, $sql) or die ("Bad Query: $sql");
        
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                echo "<a class='inkooplijst' href='info.php?ID={$row['inkoopID']}'>ID: {$row['inkoopID']} Datum: {$row['datum']} Aantal dozen: {$row['aantalDozen']} Factuurnummer: {$row['factuurNummer']}</a><br>\n";
            }
        } else{
            echo "<h2>No Images to display</h2>";
        }
    }
?>



<?php include_once 'includes/footer.php';?>