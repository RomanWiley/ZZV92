<html>

<head>

<title> Opdracht 04, arrays in PHP </title>

</head>

<body>

<?PHP

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
</body>

</html>
