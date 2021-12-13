<?php $title = "Registreren";
include "includes/db_connection.php";
include "includes/head.inc.php";
?>

<div class='container-fluid col-md-4 col-md-offset-4 center_div'>
<h3>Registreren</h3>
    <form action="includes/registrerensuccess.php" method="post">
    <div class="form-group">
    <label for="exampleInputEmail1">Gebruikersnaam</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="gebruikersnaam" placeholder="Vul hier uw gebruikersnaam in." name="gebruikersnaam">
  </div>
  
  <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Vul hier uw email in." name="email" >
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Wachtwoord</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Vul hier uw wachtwoord in." name="password">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Wachtwoord herhalen</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Vul hier nog een keer uw wachtwoord in." name="passwordRepeat">
  </div>

  <button type="submit" class="btn btn-primary" name="submit">Registreren</button>
  <small id="register" class="form-text text-muted">Al een account? Klik <a href="loginpage.php">hier</a> hier om in te loggen.</small>
    </form>

    <?php
    //error warnings
  if(isset($_GET["error"])){
    if ($_GET["error"] == "emptyInput"){
      echo "<p>Vul alles in aub.</p>";
    }
    else if ($_GET["error"] == "invalidGebruikersnaam"){
      echo "<p>Vul een geldige gebruikersnaam in.</p>";
    }
    else if ($_GET["error"] == "invalidEmail"){
      echo "<p>Vul een geldig email-adres in.</p>";
    }
    else if ($_GET["error"] == "passwordsdontmatch"){
      echo "<p>De wachtwoorden zijn niet hetzelfde.</p>";
    }
    else if ($_GET["error"] == "stmtfailed"){
      echo "<p>Er ging iets fout in de database.</p>";
    }
    else if ($_GET["error"] == "usernameTaken"){
      echo "<p>Het email-adres of de gebruikersnaam is al gebruikt.</p>";
    }
    else if ($_GET["error"] == "none"){
      echo "<p>U bent geregisteerd.</p>";
    }

  }
?>
</div>



    </body>
</html>


<?php
  include 'includes/footer.php';
?>