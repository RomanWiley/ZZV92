<html>

<title>Inschrijfformulier ZZV'92</title>

<head>

    <meta charset="UTF-8">

 </head>

<body>
<?php
// define variables and set to empty values
$fnameErr = $lnameErr = $emailErr = $genderErr = "";
$fname = $lname= $email = $geslacht = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
}

// hier opschoning invoer
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<br>
<h2>Inschrijfformulier ZZV'92</h2>
<p><span class="error">* required field</span></p>
<br>
<br>
<br>
// meldingen komen in het formulier zelf, geen geschakel tussen resultaat en invoer
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 

Voornaam: <input type="text" name="voornaam"><br>
<span class="error">* <?php echo $fnameErr;?></span>
<br><br>
Achternaam: <input type="text" name="achternaam"><br>
<span class="error">* <?php echo $lnameErr;?></span><br>
<br>

Leeftijd: <input type="text" name="leeftijd"><br>
<br>
<br>
Geslacht<br>
  <input type="radio" name="geslacht" value="man" checked> Man
  <input type="radio" name="geslacht" value="vrouw"> Vrouw
  <input type="radio" name="geslacht" value="anders"> Anders<br>
  <span class="error">* <?php echo $genderErr;?></span>
<br>
<br>
Emailadres: <input type="text" name="emailadres"><br>
<span class="error">* <?php echo $emailErr;?></span>
<br>
<br>
Betaalperiode<br>
<input type="radio" name="betaalperiode" value="maand"> maand
<input type="radio" name="betaalperiode" value="kwartaal"> kwartaal
<input type="radio" name="betaalperiode" value="jaar"> jaar
<br>
<br>
<br>
Rekeningnummer: <input type="text" name="rekeningnummer"><br>
<br>
<br>

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