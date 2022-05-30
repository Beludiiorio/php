<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



//Definicion

function promediar($aNumeros) {
    $suma = 0;
    foreach ($aNumeros as $numero) {
$suma = $suma + $numero; //Es lo mismo que poner $suma += $numero; 
 }
$promedio= $suma / count($aNumeros);
return $promedio;
}


//Uso

$aNotas= array(8,4,5,3,9,1);
echo "El promedio es: " . promediar($aNotas). "<br>";

?>