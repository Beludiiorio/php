<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Definicion
function print_f1($variable)
{

    if (is_array($variable)) {
        $contenido = "";
        //Si es un array, lo corro y guardo el contenido en el archivo "datos.txt"
        foreach ($variable as $item) {
            $contenido .= $item . "\n";
            file_put_contents("datos.txt", $contenido);
        }
    } else {
        //Entonces es string, guardo el contenido en el archivo "datos.txt"
        file_put_contents("datos.txt" . $variable);
    }
    echo "Archivo actualizado.";
}

//Uso
$aNotas = array(8, 5, 7, 9, 10);
$msg = "Este es un mensaje";

print_f($aNotas);

                    #Otra forma de hacerlo es:

function print_f2($variable)
{
    if (is_array($variable)) {
        //Si es un array, lo recorro y guardo el contenido en el archivo “datos.txt”
        $contenido = "";
        $archivo1 = fopen("datos.txt", "w");
        foreach ($variable as $item) {
            $contenido .= $item . "\n";
        }
        fwrite($archivo1, $contenido);
        fclose($archivo1);
    } else {
        //Entonces es string, guardo el contenido en el archivo “datos.txt”
        file_put_contents("datos.txt", $variable);
    }
    echo "Archivo actualizado.";
}
function print_f3($variable)
{

    if (is_array($variable)) {
        //Si es un array, lo recorro y guardo el contenido en el archivo “datos.txt”
        $contenido = "";
        $archivo1 = fopen("datos.txt", "w");
        foreach ($variable as $item) {
            $contenido .= $item . "\n";
        }
        fwrite($archivo1, $contenido);
        fclose($archivo1);
    } else {
        //Entonces es string, guardo el contenido en el archivo “datos.txt”
        file_put_contents("datos.txt", $variable);
    }
    echo "Archivo actualizado.";
}


                        #Otra forma de hacerlo es:


function print_f($variable)
{
    if (is_array($variable)) {
        //Si es un array, lo recorro y guardo el contenido en el archivo “datos.txt”
        file_put_contents("datos.txt", "");
        $archivo1 = fopen("datos.txt", "a");
        foreach ($variable as $item) {
            fwrite($archivo1, $item . "\n");
        }
        fclose($archivo1);
    } else {
        //Entonces es string, guardo el contenido en el archivo “datos.txt”
        file_put_contents("datos.txt", $variable);
    }
    echo "Archivo actualizado.";
}
