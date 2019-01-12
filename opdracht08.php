<html>

<head>

<title> Opdracht 08, INSERT maken </title>

</head>

<body>
Voorbeeld insert<br><br>

<?PHP
$naam = $_POST['naam'];
$woonplaats = $_POST['woonplaats'];
$aantalkoffie = $_POST['aantalkoffie'];
$leeftijd = $_POST['leeftijd'];

echo $naam;
echo $woonplaats;
echo $aantalkoffie;
echo $leeftijd;

$conn = new PDO("mysql:host=127.0.0.1;dbname=project1","root","");



/* $stmt = ("INSERT INTO deelnemers 
    (naam, woonplaats, aantalkoffie, leeftijd) 
    VALUES 
    ('Ron', 'Buurse', 10, 47);");

$conn->exec($stmt);
*/

// gebruik exec bij unprepared en prepared heeft execute (MAC)

// Prepare statement
$stmt = $conn->prepare("INSERT INTO deelnemers 
    (naam, woonplaats, aantalkoffie, leeftijd) 
    VALUES 
    (:fnaam, :fwoonplaats, :faantalkoffie, :fleeftijd);");


/*
// Bind parameters
$stmt->bindParam(':fnaam', $naam);
$stmt->bindParam(':fwoonplaats', $woonplaats);
$stmt->bindParam(':faantalkoffie', $aantalkoffie);
$stmt->bindParam(':fleeftijd', $leeftijd);
*/

// Execute SQL statement
$stmt->execute([
    ':fnaam' => $naam,
    ':fwoonplaats' => $woonplaats,
    ':faantalkoffie' => $aantalkoffie,
    ':fleeftijd' => $leeftijd
]);


$conn = null;

?>

</html>
