<html>

<title>Inschrijfformulier ZZV'92</title>

<head>

    <meta charset="UTF-8">
    <style>
    .error {color: #FF0000;}
    </style>
 </head>

<body>
<?php
// define variables and set to empty values
$fnameErr = $lnameErr = $ageErr = $emailErr = $genderErr = "";
$fname = $lname = $age = $email = $geslacht = $reknr = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $var_reknr = $_POST["rekeningnummer"];

  if (empty($_POST["voornaam"])) {
    $fnameErr = "Voornaam is verplicht";
  } else {
    $fname = test_input($_POST["voornaam"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
      $fnameErr = "Alleen letters en spaties toegestaan";
    }
  }

    if (empty($_POST["achternaam"])) {
      $lnameErr = "Achternaam is verplicht";
    } else {
      $lname = test_input($_POST["achternaam"]);
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
        $lnameErr = "Alleen letters en spaties toegestaan";
      }
    }

    if (empty($_POST["leeftijd"])) {
      $ageErr = "Leeftijd is verplicht";
    } else {
      $age = test_input($_POST["leeftijd"]);
    }
      
  if (empty($_POST["emailadres"])) {
    $emailErr = "Emailadres is verplicht";
  } else {
    $email = test_input($_POST["emailadres"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Ongeldig emailadres";
    }
  }

  if (empty($_POST["geslacht"])) {
    $genderErr = "Geslacht is verplicht";
  } else {
    $gender = test_input($_POST["geslacht"]);
  }

  if (empty($var_reknr)) {
    $reknrErr = "Rekeningnummer is verplicht";
  } else {
    $reknr = test_input($var_reknr);
  // check if name only contains letters and whitespace
  /*hier check op nummers en lengte*/
  if (strlen($var_reknr )!= 9 ) {
    $reknrErr = "Alleen 9 cijfers toegestaan";

  }
}
  


}

// hier opschoning invoer
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Inschrijfformulier ZZV'92</h2>
<p><span class="error">* Verplichte invoer</span></p>
<br>
<br>
<!-- meldingen komen in het formulier zelf, geen geschakel tussen resultaat en invoer -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 

Voornaam: <input type="text" name="voornaam">
<span class="error">* <?php echo $fnameErr;?></span>
<br><br>
Achternaam: <input type="text" name="achternaam">
<span class="error">* <?php echo $lnameErr;?></span>
<br><br>

Leeftijd: <input type="text" name="leeftijd">
<span class="error">* <?php echo $ageErr;?></span>
<br><br>
Geslacht<br>
  <input type="radio" name="geslacht" value="man" checked> Man
  <input type="radio" name="geslacht" value="vrouw"> Vrouw
  <input type="radio" name="geslacht" value="anders"> Anders
<span class="error">* <?php echo $genderErr;?></span>
<br><br>
Emailadres: <input type="text" name="emailadres">
<span class="error">* <?php echo $emailErr;?></span>
<br><br>
Betaalperiode<br>
<input type="radio" name="betaalperiode" value="maand"> maand
<input type="radio" name="betaalperiode" value="kwartaal"> kwartaal
<input type="radio" name="betaalperiode" value="jaar"> jaar
<br><br>
Betaalwijze<br>
<input type="radio" name="betaalwijze" value="incasso"> incasso
<input type="radio" name="betaalwijze" value="contant"> contant
<br><br>
Rekeningnummer: <input type="number" name="rekeningnummer">
<span class="error">* <?php echo $reknrErr;?></span>
<br><br>

<input type="submit" >

</form>

<?php
echo "<h2>Your Input:</h2>";
echo $fname . " " . $lname;
echo "<br>";
echo $email;
echo "<br>";
echo $gender;
?>
 </body>


</html> 