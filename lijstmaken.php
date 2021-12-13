
<?php $title = "Lijst maken";
 require 'includes/head.inc.php';
 $admin = false;

if($_SESSION['adminstatus'] == "1"){
    $admin = true;
    //only shows content if user is admin
    }
    else{
        header("location: ../inkoop/index.php?error=notallowed");
    exit();
    }
    
    if ($admin){
        echo "ID: " . $_SESSION["userID"] . "<br>";
        $sql = "SELECT * FROM inkoop";
        $result = mysqli_query($conn, $sql) or die ("Bad Query: $sql");
    }
    if (!$admin){
        header("location: ../inkoop/index.php?error=notallowed");
        exit();
    }
?>
<form action="../inkoop/includes/nieuwelijst.inc.php" method="post">
                <input type="text" name="aantaldozen" class="inputlogin" required placeholder="Aantal dozen: "><br>
                <input type="text" name="factuurnummer" class="inputlogin" placeholder="Factuurnummer: "><br>
                <button type="submit" name="submit">Aanmaken</button><br>
            </form>
    <?php
        //Login messages
        if(isset($_GET["error"])){
            if ($_GET["error"] == "succesaangemaakt"){
              echo "<p>" . $_SESSION["username"] . ", u heeft succesvol een lijst aangemaakt.</p>";
            }
        }
            ?>