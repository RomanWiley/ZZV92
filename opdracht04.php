<html>

<head>

<title> Opdracht 04, arrays in PHP </title>
<!-- de opdracht is om een afbeelding van een ladenkast te maken,
daarmee wordt dan grafisch het idee van een array weergegeven.
de verschillende PHP functies van arrays moeten worden weergegeven
-->

<meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>

<body>

<?PHP
echo "Een array is een soort ladenkast met gegevens<br>";
echo "Een standaard array geeft iedere lade een nummer, beginnend met 0<br>";

$fruit = array("bananen", "appels", "peren", "sinaasappels");

for($i=0; $i<count($fruit); $i++) {
    echo $fruit[$i] . "<br>";
}

echo "<br>";

$fruit = array("bananen", "appels", "peren", "sinaasappels");

$i=count($fruit)-1;

// echo $i . " stand teller";

for($i; $i >= 0;$i--) {
    echo $fruit[$i] . "<br>";
}


// sorteren; sort()
// array_push, voeg element toe
// array_pop, haalt laatste eruit
// array_shift, haalt eerste eruit

 
        $fruits = array("bananen", "appels", "peren", "sinaasappels");
        sort($fruits);
          print_r($fruits);
          echo "<br><br>";
// de array krijgt nieuwe indexering          
          array_push($fruits, "kersen");
          print_r($fruits); // kersen komt achteraan
// haal eerste en laatste eruit
echo "<br><br>";

// andere notatie voor toevoeging;
        $fruits[] = "kiwi";    
        print_r($fruits);
        echo "<br><br>";


// haal laatste weg
        echo "<b>Met array_pop(ARRAY) het laatste element ophalen<br><br></b>";
        echo " De array voor de bewerking: <br>";
        print_r($fruits);
        echo "<br><br>";
        $laatsteElement = array_pop($fruits);
        echo "<br> Het laatste element is: " . $laatsteElement . " <br>";
        echo "De array bevat nu dit: <br>";
        print_r($fruits);
        echo "<br><br>";

// we voegen frambozen toe, en verwijderen de eerste (appels) uit de array
        array_push($fruits, "frambozen");
        echo " De frambozen zijn toegevoegd: ";
        print_r($fruits); // frambozen komt achteraan
        echo "<br><br>";


// array_shift haalt eerste weg
        $eersteElement = array_shift($fruits);
        echo "Dit element is weggehaald: " . $eersteElement . "<br><br>";
        echo "de array is nu dit: ";
        print_r($fruits);
  


?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>
