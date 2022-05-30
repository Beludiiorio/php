<?php //Abro php
ini_set('display_errors', 1); //Nos ayuda a detectar los errores
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Definicion:

function calcularNeto ($bruto) { // calcularNeto recibe a la variable $bruto
    return $bruto - ($bruto * 0.17);
}

//Uso:

echo "El sueldo neto es $ " . calcularNeto(50000); //Llamada a la funcion

//50000 es el valor que va recibir la variable $bruto

?>