<html>

<head>

<title> Opdracht 09, update checken  </title>

</head>

<body>

<?PHP

$ingevoerdeNaam = $_POST['zoeknaam'];

echo "<h2>Oude naam: " . $ingevoerdeNaam . "</h2><br><br>";

$conn = new PDO("mysql:host=127.0.0.1;dbname=project1","root","");

//haal de ingevoerde naam op, met bijbehorende id
$stmt = $conn->query("SELECT * FROM deelnemers Where naam = '" . $ingevoerdeNaam . "'");

// toon de gezochte én gevonden persoon:
while ($row = $stmt->fetch()) {

    echo "<LI> ID: [". $row[id] . "] " . $row["naam"] . " komt uit " . $row["woonplaats"] . " wil " . $row[aantalkoffie] ." koffie.</li>";
$id = $row["id"];
$naam = $row["naam"];
$woonplaats = $row["woonplaats"];
$aantalkoffie = $row["aantalkoffie"];
$leeftijd = $row["leeftijd"];
}

$conn = null;

?>

// maak nu een input voor de nieuwe waarde

<form action="opdracht09_update.php" method="POST">
<label for="nieuwenaam">Voer de nieuwe naam in</label>
<input type="text" name="nieuwenaam" placeholder="Nieuwe naam"> 
<input type="hidden" name="id" value= <?php echo "'" . $id . "'"; ?> >


</form>



</html>
