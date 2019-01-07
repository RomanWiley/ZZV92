<html>

<head>

<title> Functies in PHP </title>

</head>
<body>

<?php
function maakKoffie($type = "", $aantal = 1) {
    $type = ($type == "" ?  "cappuccino" : $type); // turnary (shorthand IF)
    return "Maak een " . $aantal  . " X een kop koffie van het type $type.<br>";

}

echo maakKoffie();
echo maakKoffie(null);
echo maakKoffie("");

echo maakKoffie("espresso");

echo maakKoffie("espresso, 5");
echo maakKoffie("espresso");
echo maakKoffie();

echo maakKoffie(null,10);
echo maakKoffie("",100);

echo "<br><br><br><br>";

echo maakKoffie("koffie", 5) . "<br>" . maakKoffie ("", 4);

?>

</body>

</head>
