<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba</title>
</head>
<body>
   <?php //creacion de variables//
   echo "Hola Mundo <br>";
   echo date("d/m/Y") ;
   ?>
</body>
</html> 

<!-- Ejemplos de condicional for-->
<?php

for ($i = 0; $i <=10; $i++) {
    echo $i ."<br>";
}
?>

<?php

for ($i = 0; $i <count($aProductos); $i++) {
echo $aProductos[$i]["nombre"];
}
?>


<!-- Otro ejemplo de for -->
<?php
for ($i=0; $i<=100; $i+=2) {
    echo $i. "<br>";
}
?>

<!-- Otro ejemplo con for -->

<?php
for ($i=0; $i<=100 && $i != 60; $i+=2) {
    echo $i . "<br>";
}
?>