<?php $title = "Inkooprij aanpassen: " . $_GET['InkooprijID'];
require 'includes/head.inc.php';
if($_SESSION['adminstatus'] == "1"){
    $admin = true;
    }else{
            header("location: ../inkoop/index.php?error=notallowed");
    exit();
    }
    
    if ($admin){
        if(isset($_GET['InkooprijID'])){
            $ID = mysqli_real_escape_string($conn, $_GET['InkooprijID']);
            ?>
                <h1>Test</h1>
                <form>
                    
                </form>
            <?php

            echo $_SERVER["PHP_SELF"] . "?InkooprijID=$ID";

            $sql = "SELECT * FROM inkooprij WHERE ID = '$ID' ";
            $result = mysqli_query($conn, $sql) or die("Bad Query: $sql");
            echo "<div style='overflow-x:auto;''>";
            ?>
            <table class = 'tabel'>"
            <tr> 
            <th>Type</th> <th>Kleur</th> <th>Merk</th> <th>Art:Num</th><th>XS</th> <th>S</th> <th>M</th> <th>L</th> <th>XL</th> <th>XXL</th><th>44</th> <th>46</th> <th>48</th> <th>50</th> <th>Nieuw?</th> <th>Datum</th><th>extra</th>
            </tr>
            <?php while($row = mysqli_fetch_array($result)){
                $date = strtotime($row['Datum']);
                echo $row['productType'];
                ?>
            <form action = "includes/aangepast.php" method="post">
                <tr>
                <td><input type = "text" name = "productType" value = "<?php echo $row['productType']; ?>"></td>
                <td><input type = "text" name = "kleur" value = "<?php echo $row['kleur']; ?>"></td>
                <td><input type = "text" name = "merk" value = "<?php echo $row['merk']; ?>"></td>
                <td><input type = "text" name = "artikelnummer" value = "<?php echo $row['artikelnummer']; ?>"></td>
                <td><input type = "text" name = "xs" value = "<?php echo $row['XS']; ?>"></td>
                <td><input type = "text" name = "s" value = "<?php echo $row['S']; ?>"></td>
                <td><input type = "text" name = "m" value = "<?php echo $row['M']; ?>"></td>
                <td><input type = "text" name = "l" value = "<?php echo $row['L']; ?>"></td>
                <td><input type = "text" name = "xl" value = "<?php echo $row['XL']; ?>"></td>
                <td><input type = "text" name = "xxl" value = "<?php echo $row['XXL']; ?>"></td>
                <td><input type = "text" name = "44" value = "<?php echo $row['44']; ?>"></td>
                <td><input type = "text" name = "46" value = "<?php echo $row['46']; ?>"></td>
                <td><input type = "text" name = "48" value = "<?php echo $row['48']; ?>"></td>
                <td><input type = "text" name = "50" value = "<?php echo $row['50']; ?>"></td>
                <td><select name = "isNieuw">
                <option value = '1'>Ja</option>    
                <option value = '0' <?php if (!$row['isNieuw']){echo "selected";} ?>>Nee</option>
                </select></td>
                <td><input name = "datum" type = "text" readonly value = "<?php echo date('d/m/y', $date); ?>"></td>
                <td><input name = "extra" type = "text" value = "<?php echo $row['Extra'];?>"></td>
                </tr>
                <input type = "hidden" name = "inkoopID" value = "<?php echo $row['inkoopID']; ?>">
                <input type = "hidden" name = "inkooprijID" value = "<?php echo $ID;?>">
                <tr><td><input type="submit" value="Aanpassen"></td></tr>
            </form>
                <?php
                // echo "<td><input type = "text" value = "<?php echo ($row['isNieuw'] ? '<b>ja</b>' : 'nee');
        }
    }
}