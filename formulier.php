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
$betaalPeriodeErr = $betaalWijzeErr = "";

$fname = $lname = $age = $email = $gender = $reknr = "";
$betaalPeriode = $betaalWijze = "";

$maandBedrag = 25;
$kwartaalBedrag = 75;
$jaarbedrag = 300;
$nettoContributie = 0;
$indexJaar = 2018;
$huidigJaar = 2019;
$indexBedrag = $jaarbedrag + ($jaarbedrag * (($huidigJaar-$indexJaar)*.025));
$korting = 0; // korting in procenten
$toeslag = 0;
$leeftijdsKorting = 10;
$leeftijdsGrens = 60;
$vrouwenKorting = 50; // korting in % voor vrouwen

$post_fname = $_POST["voornaam"]; // VRAAG; TEST_INPUT HIER DOEN??
$post_lname = $_POST["achternaam"];
$post_reknr = $_POST["rekeningnummer"];
$post_age = $_POST["leeftijd"];
$post_gender = $_POST["geslacht"];
$post_email = $_POST["emailadres"];
$post_betaalPeriode = $_POST["betaalperiode"];
$post_betaalWijze = $_POST["betaalwijze"];


// let op: hieronder mag ik er vanuit gaan dat:
// verlichte zijn ingevuld
// er zit geen rommel in de input
// weet dat ...



if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($post_fname)) {
    $fnameErr = "Voornaam is verplicht";
  } else {
    $fname = test_input($post_fname);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
      $fnameErr = "Alleen letters en spaties toegestaan";
    }
    if (strlen($fname) < 5){
      $toeslag = 5 * (5 - strlen($fname));
            
    }
  }

    if (empty($post_lname)) {
      $lnameErr = "Achternaam is verplicht";
    } else {
      $lname = test_input($post_lname);
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
        $lnameErr = "Alleen letters en spaties toegestaan";
      }
    }

    if (empty($post_age)) {
      $ageErr = "Leeftijd is verplicht";
    } else {
      $age = test_input($post_age);
      if ($post_age >= $leeftijdsGrens && $korting < $leeftijdsKorting){
        $korting = $leeftijdsKorting;
      }
    }

 /* geslachts keuze */
  if (empty($post_gender)) {
    $genderErr = "Geslacht is verplicht";
  } else {
    $gender = test_input($post_gender);
    if ($post_gender == "vrouw" && $korting < $vrouwenKorting){
      $korting = $vrouwenKorting;
    }
  }
     
  if (empty($post_email)) {
    $emailErr = "Emailadres is verplicht";
  } else {
    $email = test_input($post_email);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Ongeldig emailadres";
    }
  }

/* betaalperiode */
  if (empty($post_betaalPeriode)) {
    $betaalPeriodeErr = "invoer betaalperiode is verplicht";
  } else {
    $betaalPeriode = $post_betaalPeriode;
  }

/* betaalwijze */
  if (empty($post_betaalWijze)) {
    $betaalWijzeErr = "keuze betaalwijze is verplicht";
  } else {
    $betaalWijze = $post_betaalWijze;
    if ($betaalWijze == 'contant') {
      if ($betaalPeriode != 'jaar') {
        $betaalWijzeErr  = "Bij contante betaling is betalen per jaar verplicht.";

      }
    }
    }

    /* rekeningnummer */
  if (empty($post_reknr)) {
    $reknrErr = "Rekeningnummer is verplicht";
  } else {
    $reknr = test_input($post_reknr);
  // check if name only contains letters and whitespace
  /*hier check op nummers en lengte*/
  if (strlen($post_reknr )!= 9 ) {
    $reknrErr = "Alleen 9 cijfers toegestaan";
  }
}
  

} // sluit check op post

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
<!-- Als het jaar niet geselecteerd is dan mag de gebruiker niet kiezen voor contant-->
<!-- Word contant wel gekozen laat een error zien met de tekst -->
<input type="radio" name="betaalperiode" value="jaar"> jaar
<span class="error">* <?php echo $betaalPeriodeErr;?></span>
<br><br>
Betaalwijze<br>
<input type="radio" name="betaalwijze" value="incasso"> incasso
<input type="radio" name="betaalwijze" value="contant"> contant
<span class="error">* <?php echo $betaalWijzeErr;?></span>
<br><br>
Rekeningnummer: <input type="number" name="rekeningnummer">
<span class="error">* <?php echo $reknrErr;?></span>
<br><br>

<input type="submit" >

</form>

<?php
/*
-- 60+? 10% korting
-- basis 25 euro per maand
-- vrouwen de helft
-- voornaam 5 letters, korter? per letter 5 extra, ook per maand, toeslag NA korting toepassen
-- per maand hele tarief per kwartaal 1% korting, per jaar 3%
in 2018 100 index
** 2019 2,5% (elk jaar een indexatie van 2,5%)
altijd hoogste enkelvoudige korting
-- output betaling per maand/kwartaal/jaar
betaling per incasso, per jaar mag ook overmaken
*/

echo "<h2>Your Input:</h2>";
echo "Naam: " . $fname . " " . $lname;
if ($toeslag > 0){
  echo " (te korte voornaam) Toeslag van € " . $toeslag . " per maand";
}

echo "<br>Leeftijd: " . $age . "  ";
if ($age >= $leeftijdsGrens){
  echo " Iemand van " . $leeftijdsGrens . " jaar of ouder krijgt " . $leeftijdsKorting . "% korting";
}

echo "<br>Geslacht: ". $gender . " "; 
if ($gender == "vrouw") {
  echo " Een vrouw krijgt 50% korting <br>";
}

echo "<br>Emailadres: " . $email .  "<br>";
echo "Betaling per " . $betaalPeriode  . ", " . $betaalWijze . "<br>";
echo "Rekeningnummer " . $reknr . "<br><br>";

$jaarContributie = number_format(round($indexBedrag,2),2); // berekening jaarbedrag zonder korting ZONDER toeslagen
$nettoContributie = number_format(round($jaarContributie * (1-($korting/100)),2),2);

echo "het geindexeerde jaarbedrag zonder korting is: € " . $jaarContributie . " in " . $huidigJaar . "<br>";
echo "Contributie na korting op jaarbasis: " . $nettoContributie . "<br>";
echo "het jaarbedrag na toeslagen is: € " . number_format($nettoContributie + ($toeslag * 12),2);

echo "<br>De door u gekozen betaalperiode en -wijze resulteert in dit termijnbedrag: ";
switch ($betaalPeriode) {
case "maand":
echo "€ " . number_format(round(($nettoContributie / 12),2) + $toeslag,2) . " per maand";
break;
case "kwartaal":
echo "€ " . number_format(round((($nettoContributie + ($toeslag * 12)) / 4),2),2) . " per kwartaal";
break;
case "jaar":
echo "het jaarbedrag is: € " . number_format($jaarContributie + ($toeslag * 12),2);
break;
}

?>
 </body>


</html> 