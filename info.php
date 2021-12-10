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

            $sql2 = "SELECT inkoop.datum
            FROM inkoop
            INNER JOIN inkooprij ON inkoop.inkoopID = inkooprij.inkoopID
            WHERE inkooprij.inkoopID = '$ID'
            LIMIT 1";
            $result2 = $conn->query($sql2);

            if ($result2->num_rows > 0){
                while($row2 = $result2->fetch_assoc()){
                    echo "Datum aangemaakt: " . $row2["datum"] . "<br>";
                }
            }
            
            
            
            
            




            $sql = "SELECT * FROM inkooprij WHERE inkoopID = '$ID' ";
            $result = mysqli_query($conn, $sql) or die("Bad Query: $sql");
            echo "<div style='overflow-x:auto;''>";
            echo "<table>";
            echo "<tr> 
            <th>type</th> <th>kleur</th> <th>merk</th> <th>artikelnummer</th> <th>S</th> <th>M</th> <th>L</th> <th>XL</th> <th>XXL</th> <th>44</th> <th>46</th> <th>48</th> <th>50</th> <th>Nieuw?</th> <th>Datum</th><th>extra</th> 
            </tr>";
            while($row = mysqli_fetch_array($result)){
                $date = strtotime($row['Datum']);
                echo "<tr>
                <td>" . $row['productType'] . "</td>"
                 ."<td>" . $row['kleur'] . "</td>"
                 ."<td>" . $row['merk'] . "</td>"
                 ."<td>" . $row['artikelnummer'] . "</td>"
                 ."<td>" . $row['S'] . "</td>"
                 ."<td>" . $row['M'] . "</td>"
                 ."<td>" . $row['L'] . "</td>"
                 ."<td>" . $row['XL'] . "</td>"
                 ."<td>" . $row['XXL'] . "</td>"
                 ."<td>" . $row['44'] . "</td>"
                 ."<td>" . $row['46'] . "</td>"
                 ."<td>" . $row['48'] . "</td>"
                 ."<td>" . $row['50'] . "</td>"
                 ."<td>" . ($row['isNieuw'] ? 'ja' : 'nee') . "</td>"
                 ."<td>" . date('d/m/y', $date) . "</td>"
                 ."<td>" . $row['Extra'] . "</td>"
                 . "</tr>";
                //echo "Datum: " . date('d/m/y', $date) . "<br>";
            }
            echo "</table>";
            echo "</div>";
            mysqli_close($conn);


        }
    }
?>

<button class = "printer noPrint" onclick="window.print(); return false;">Print</button>

<?php include_once 'includes/footer.php';?>