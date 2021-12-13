<?php
    $title = "Inkoopformulier";
    include 'includes/head.inc.php';
    include 'includes/db_connection.php';
?>

<h1>Inkoopformulier</h1>
    <?php
     $date = new DateTime('now', new DateTimeZone('Europe/Amsterdam'));
     echo "Het is nu: " . $date->format('d-m-Y H:i:s') . "<br>";

        //Login messages
        if(isset($_GET["error"])){
            if ($_GET["error"] == "loginsucces"){
              echo "<p>" . $_SESSION["name"] . ", u bent succesvol ingelogd.</p>";
            }
            else if($_GET["error"] == "logout"){
                echo "<p>U bent succesvol uitgelogd.</p>";
            }
            else if($_GET["error"] == "notallowed"){
                echo "<p>Geen toestemming</p>";
            }
        }
    ?>
    <a href="lijstmaken.php"><button>Nieuwe lijst</button></a>
    <a href="formulier.php"><button>Lijsten inzien</button></a>

<?php
    include 'includes/footer.php';
?>