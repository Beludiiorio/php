<?php //Abro php
ini_set('display_errors', 1); //Las 3 lineas me muestran los errores que quedan almacenados en el apache
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$aNotas=  array(9,8,9.50,4,7,8); //Es un array de 6 elementos
$aEmpleados = array("gomez","ramirez","di iorio","barrionuevo","gonzalez","perez","tucci");

$aPacientes = array(); //Defino el array que es una lista de elementos
$aPacientes[0] = array( //Hay un array asociativo con 4 elementos
    "dni" => "33.765.012",
    "nombre" => "Ana Acuña",
    "edad" => 45,
    "peso" => 82
);

$aPacientes[1] = array( //El $aPacientes 0,1 y 2 son array numericos y cuando hay palabras es asociativo.
    "dni" => "23.684.385",
    "nombre" => "Gonzalo Bustamante",
    "edad" => 66,
    "peso" => 79,
);

$aPacientes[2] = array(
    "dni" => "23.684.385",
    "nombre" => "Juan Irraola",
    "edad" => 28,
    "peso" => 90,
);

$aPacientes[3] = array(
    "dni" => "36.630.478",
    "nombre" => "Beatriz Ocampo",
    "edad" => 50,
    "peso" => 83,

);

function contar ($aArray) { //La funcion contar recibe como parametro un array
    $contador = 0; //$contador se almacena en memoria RAM
    foreach ($aArray as $item) { //El foreach recorre cada elemento del array.
   
    $contador++; //$contador= $contador +1.
    }

    return $contador; //Me devuelve $contador.
}

echo "Cantidad de notas es: ". contar($aNotas) . "<br>";
echo "Cantidad de pacientes es: ". contar($aPacientes) . "<br>";
echo "Cantidad de empleados es: ". contar($aEmpleados);

?>

