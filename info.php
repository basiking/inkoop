<?php $title = "Formulierinformatie lijst: " . $_GET['ID'];
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
        if(isset($_GET['ID'])){
            $ID = mysqli_real_escape_string($conn, $_GET['ID']);
            $ID2 = $_GET['ID'];

            $sql2 = "SELECT inkoop.datum
            FROM inkoop
            INNER JOIN inkooprij ON inkoop.inkoopID = inkooprij.inkoopID
            WHERE inkooprij.inkoopID = '$ID'
            LIMIT 1";
            $result2 = $conn->query($sql2);

            if ($result2->num_rows > 0){
                while($row2 = $result2->fetch_assoc()){
                    echo "Datum aangemaakt: " . date('d-m-y', strtotime($row2["datum"])) . "<br>";
                }
            }

            $sql = "SELECT * FROM inkooprij WHERE inkoopID = '$ID' ";
            $result = mysqli_query($conn, $sql) or die("Bad Query: $sql");
            echo "<div style='overflow-x:auto;''>";
            echo "<table class = 'tabel'>";
            echo "<tr> 
            <th>Type</th> <th>Kleur</th> <th>Merk</th> <th>Art:Num</th><th>XS</th> <th>S</th> <th>M</th> <th>L</th> <th>XL</th> <th>XXL</th> <th>44</th> <th>46</th> <th>48</th> <th>50</th> <th>Nieuw?</th> <th>Datum</th><th>extra</th> 
            </tr>";
            while($row = mysqli_fetch_array($result)){
                $date = strtotime($row['Datum']);
                echo "<tr>
                <td>" . $row['productType'] . "</td>"
                 ."<td>" . $row['kleur'] . "</td>"
                 ."<td>" . $row['merk'] . "</td>"
                 ."<td>" . $row['artikelnummer'] . "</td>"
                 ."<td>" . $row['XS'] . "</td>"
                 ."<td>" . $row['S'] . "</td>"
                 ."<td>" . $row['M'] . "</td>"
                 ."<td>" . $row['L'] . "</td>"
                 ."<td>" . $row['XL'] . "</td>"
                 ."<td>" . $row['XXL'] . "</td>"
                 ."<td>" . $row['44'] . "</td>"
                 ."<td>" . $row['46'] . "</td>"
                 ."<td>" . $row['48'] . "</td>"
                 ."<td>" . $row['50'] . "</td>"
                 ."<td>" . ($row['isNieuw'] ? '<b>ja</b>' : 'nee') . "</td>"
                 ."<td>" . date('d/m/y', $date) . "</td>"
                 ."<td>" . $row['Extra'] . "</td>"
                 . "</tr>";
                //echo "Datum: " . date('d/m/y', $date) . "<br>";
            }

            $dateNow = new DateTime('now', new DateTimeZone('Europe/Amsterdam'));
            $userID = $_SESSION['userID'];
            echo "<tr>".
            "<form action='rijtoevoegen.php' method='post'>".
            "<td><input type='text' class = 'forminput noPrint' name = 'productType' placeholder='Type' required></td>".
            "<td><input type='text' class = 'forminput noPrint' name = 'kleur' placeholder='kleur' required></td>".
            "<td><input type='text' class = 'forminput noPrint' name = 'merk' placeholder='merk' required></td>".
            "<td><input type='text' class = 'forminput noPrint' name = 'artikelnummer' placeholder='artikelnummer'></td>".
            "<td><input type='text' class = 'forminput noPrint' name = 'xs' placeholder='xs'></td>".
            "<td><input type='text' class = 'forminput noPrint' name = 's' placeholder='s'></td>".
            "<td><input type='text' class = 'forminput noPrint' name = 'm' placeholder='m'></td>".
            "<td><input type='text' class = 'forminput noPrint' name = 'l' placeholder='l'></td>".
            "<td><input type='text' class = 'forminput noPrint' name = 'xl' placeholder='xl'></td>".
            "<td><input type='text' class = 'forminput noPrint' name = 'xxl' placeholder='xxl'></td>".
            "<td><input type='text' class = 'forminput noPrint' name = '44' placeholder='4'></td>".
            "<td><input type='text' class = 'forminput noPrint' name = '46' placeholder='46'></td>".
            "<td><input type='text' class = 'forminput noPrint' name = '48' placeholder='48'></td>".
            "<td><input type='text' class = 'forminput noPrint' name = '50' placeholder='50'></td>".
            "<td><select name = 'nieuw' type='text' class = 'forminput noPrint'>
            <option value = '0'>Nee</option>
            <option value = '1'>Ja</option>
            </select></td>".
            "<td class = 'noPrint'>" . $dateNow->format('d/m/y') .  "</td>".
            "<td><input type='text' class = 'forminput noPrint' name = 'Extra' placeholder='Extra'></td>".
            "<input type='hidden' name='inkoopID' value ='$ID'>".
            "<input type='hidden' name='userID' value = $userID>". 
            "</tr><tr><td><input type = 'submit' class = 'noPrint'></input></td>" .
            "</form>".
            "</tr>";
            echo "</table>";
            echo "</div>";
            mysqli_close($conn);

        }
    }
?>

<button class = "printer noPrint" onclick="window.print(); return false;">Print</button>

<?php include_once 'includes/footer.php';?>