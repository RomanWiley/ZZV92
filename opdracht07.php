<html>

<head>

<title> dbproducttoevoegen </title>

</head>

<body>

<?PHP
Echo "Connectie wordt gemaakt <BR>";

// maak de connectie

try {
    $conn = new PDO("mysql:host=127.0.0.1;dbname=webshop","root","");
} catch (PDOException $e) {
    phpinfo();
    die($e->getMessage());
}
// pdo nog instellen


// haal de recordset op (met SQL)
// echo "Record wordt opgehaald";
$stmt = $conn->query("SELECT * FROM deelnemers Where woonplaats <> 'Enschede'");

// bewerk/toon de resultaten
while ($row = $stmt->fetch()) {

    echo "<LI>". $row["naam"] . " komt uit " . $row["woonplaats"] . " wil " . $row[aantalkoffie] ." koffie.</li>";

}
$stmt = $conn->query("SELECT d1.id, d1.naam FROM deelnemers d1
WHERE (select(MAX(d2.leeftijd)) from deelnemers d2) = d1.leeftijd;");

// bewerk/toon de resultaten
while ($row = $stmt->fetch()) {

    echo "<LI>". $row["naam"] . " is de oudste " . $row["woonplaats"] . "</li>";

}
// echo "Record wordt opgehaald";
echo "<BR>";
$stmt = $conn->query("SELECT * FROM deelnemers Where aantalkoffie > 5 ORDER BY aantalkoffie");

// bewerk/toon de resultaten
while ($row = $stmt->fetch()) {

    echo "<LI>" . $row[naam] . " drinkt "  . $row[aantalkoffie] . " koffie." . "</li>";

}

$conn = null;


?>

</html>
