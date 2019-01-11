<html>

<head>

<title> Opdracht 06, assosiative arrays in PHP </title>

</head>

<body>

<?PHP

$persoon1 = array (
    "klantnummer"=>105,
    "naam"=>"Toos",
    "woonplaats"=>"Amsterdam"
);
$persoon2 = array (
    "klantnummer"=>180,
    "naam"=>"Piet",
    "woonplaats"=>"Enschede"
);

$klanten = [$persoon1, $persoon2];

foreach($klanten as $klant)
    echo <LI> <A HREF ='toonklant.php' . $klant[klantnummer]> . " - " . $klant[naam] . "<br>";

?>

</body>

</html>