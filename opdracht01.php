<html>

<head>


<meta charset="UTF-8">
    <style>
    .message {color: #FF0000;}
    </style>

</head>

    <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"> 

    Minimum nummer: <input type="number" name = "getal1" placeholder = "Eerste getal"> getal 1
    <br><br>
    Maximum nummer: <input type="number" name = "getal2" placeholder = "Tweede getal"> getal 2
    <br><br>

    <input type="submit"><br><br>

   <!-- <span class="message">Resultaat: <?php echo $tekst;?></span> -->

<?php
$getal1 = $_POST["getal1"];
$getal2 = $_POST["getal2"];

// echo $var_min . "  en " . $var_max . "<br><br>";

// form met 2 vakjes
// PHP ontvangt de min en max
if ($getal2 < $getal1){
    $var_temp = $getal2;
    $getal2 = $getal1;
    $getal1 = $var_temp;
    }
    // denk hieronder aan: echo (voorwaarde ? true :false)
for ($x = $getal1; $x <= $getal2;$x++ ) {
    echo $x . ($x % 2 == 0 ? "E" : "") . ($x < $getal2 ? "," : ".");
    // $tekst = $tekst . $x . ", ";
}
// $x++; dit maakt er 1 teveel aan 
// $tekst = $tekst . $x . ".";

// echo "<br><br> Resultaat: " . $tekst;
?>
</form>
</html>