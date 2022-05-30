<?php

$stock= 800;

if ($stock > 0) {
    echo "Hay stock";
} else { echo "No hay stock";
}
?>

<br>

<!---Otro ejercicio-->

<?php 
$valor=rand(100,300); 
print_r($valor)
?>

<br>

<!---Otro ejercicio-->

<?php 

$valor= rand(1,5);

    if ( $valor== 1|| $valor == 3 || $valor== 5) {
    echo "El numero $valor es impar" ;
}
    else { echo "El numero $valor es par"; }
?>
