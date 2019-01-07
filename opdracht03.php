<html>

<head>

<title>Opdracht; functie met min-max</title>

</head>


<?php

/*

ik wil: 

1. een functie die twee getallen binnenkrijgt
en het grootste getal teruggeeft

2. een aantal demo's hoe ik de functie kan gebruiken

*/

function grootsteGetal($getal1, $getal2) {

    return ($getal1 >= $getal2 ? $getal1 : $getal2);

}
function kleinsteGetal($getal1, $getal2) {

    return ($getal1 <= $getal2 ? $getal1 : $getal2);

}

function gemiddeldeWaarde($getal1, $getal2) {

    return (($getal1 + $getal2) / 2);

}

echo grootsteGetal(5,10);
echo "<br>";
echo grootsteGetal(10,5);
echo "<br>";
echo grootsteGetal(3,3);
echo "<br>";
echo "<br>";


echo kleinsteGetal(5,10);
echo "<br>";
echo kleinsteGetal(10,5);
echo "<br>";
echo kleinsteGetal(3,3);
echo "<br>";
echo "<br>";
echo "<br>";


echo gemiddeldeWaarde(5,10);
echo "<br>";

echo gemiddeldeWaarde(2,2);
echo "<br>";

echo gemiddeldeWaarde(2.5,3.0);
echo "<br>";

echo gemiddeldeWaarde(-5,5);
echo "<br>";



?>



</html>
