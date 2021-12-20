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
        //Login messages
        if(isset($_GET["error"])){
            if ($_GET["error"] == "succesaangemaakt"){
              echo "<p>U heeft succesvol een nieuwe lijst aangemaakt.</p>";
            }
        }

        $sql = "SELECT * FROM inkoop ORDER BY datum DESC";
        $result = mysqli_query($conn, $sql) or die ("Bad Query: $sql");
        

        echo "<table><tr><b>
        <td> ID</td>
        <td> Datum</td>
        <td> Aantal dozen</td>
        <td> Factuurnummer</td>
        </b></tr>";
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                echo "<tr><td><a class='inkooplijst' href='info.php?ID={$row['inkoopID']}'>{$row['inkoopID']}</td><td><a class='inkooplijst' href='info.php?ID={$row['inkoopID']}'>" . date('d/m/y', strtotime($row['datum'])) . "</td><td><a class='inkooplijst' href='info.php?ID={$row['inkoopID']}'>{$row['aantalDozen']}</td><td><a class='inkooplijst' href='info.php?ID={$row['inkoopID']}'>{$row['factuurNummer']}</a></td></tr>";
            }
        } else{
            echo "<h2>Geen data</h2>";
        }
        echo "</table>";
    }

// date('d-m-y', strtotime($row2["datum"]))
?>



<?php include_once 'includes/footer.php';?>