<?php   //Abrimos php 
ini_set('display_errors', 1);//Las primeras 3 lineas las colocamos para que xamp nos muestre los posibles errores de nuestro php 
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$base= 100; //Tomamos las variables de base y altura
$altura = 0.60;

//Definicion:
function calcularAreaRect ($base, $altura) { //Llamada o invocacion a la funcion
    return $base * $altura ;
}

//Uso:    

echo "El area es" . calcularAreaRect(100,0.60)."<br>"; //Utilizamos el echo para mostrar el resultado en pantalla
echo "El area es" . calcularAreaRect(800,300);         //El br es un etiqueta de html para generar un salto de linea
 