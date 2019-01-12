<html>

<head>

<title> Opdracht 09, update uitvoeren </title>

</head>

<body>
<h2>De naam is veranderd</h2><br><br>

<?PHP

$id = $_POST['id'];
$naam = $_POST['nieuwenaam'];


echo "de id en nieuwe naam: " . $id . " - " . $naam . "<br><br>";

$conn = new PDO("mysql:host=127.0.0.1;dbname=project1","root","");

// Prepare statement
$stmt = $conn->prepare("UPDATE deelnemers SET naam=(:fnaam) WHERE id=(:fid);");

// Execute SQL statement
$stmt->execute([
    ':fid' => $id,
    ':fnaam' => $naam
]);

$conn = null;

?>

</html>
