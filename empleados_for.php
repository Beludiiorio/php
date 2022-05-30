<?php //Abro php
ini_set('display_errors', 1); //Lineas que me permiten visualizar los errores en pantalla
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$aEmpleados = array(); //Llamamos $aEmpleados a nuestro array y le dimos 4 parametros, en cada posicion hay un empleado (array asociativo).
$aEmpleados[0] = array("dni" => 33300123, "nombre" => "David Garcia", "bruto" => 85000.30);
$aEmpleados[1] = array("dni" => 40874456, "nombre" => "Ana del Valle", "bruto" => 90000);
$aEmpleados[2] = array("dni" => 67567565, "nombre" => "Andres Perez", "bruto" => 100000);
$aEmpleados[3] = array("dni" => 75744545, "nombre" => "Victoria Luz", "bruto" => 70000);


//Definicion:

function calcularNeto($bruto)
{

    return $bruto - ($bruto * 0.17); //Le sacamos el 17% al bruto
}

?> <!-- Cerramos php y comenzamos a escribir en html-->

<!DOCTYPE html>
<html lang="es">

<head> <!-- Es la configuracion que le indicamos al ordenador -->
    <meta charset="UTF-8"> <!--Para que acepte los caracteres del español -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Para que sea compatible con microsoft edge-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Para que las paginas sean responsivas -->
    <title>Listado de empleados </title>  <!--Titulo de la pestaña -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> <!--Bootstrap-->

</head>

<body> <!-- Parte principal de la pagina-->
    <main class="container">
        <div class="row"> <!-- Hace que la pagina se comporte como una grilla de 12 columnas. Container deja un margen en los laterales y container fluid ocupa el 100% de la pantalla -->
            <div class="col-12 text-center  pt-3 pb-4 ">
                <h1> Listado de empleados </h1>
            </div>
        </div>
        <div class="row">  <!--Fila -->
            <div class="col-12 text-center">
                <table class="table table-hover border"> <!-- Estructura de tabla con sombreado y borde-->
                    <tr>
                        <th>DNI</th> <!--Encabezado (Es una tabla con 3 columnas) -->
                        <th>Nombre</th>
                        <th>Sueldo</th>
                    </tr>

                    <?php for ($i = 0; $i < count($aEmpleados); $i++) { ?> <!--Abrimos y cerramos php otra vez en una sola linea, es un for que repite un ciclo mientras se cumpla una condicion (mientras $i sea menor a la cantidad de empleados) -->
                        <tr>
                            <td><?php echo $aEmpleados[$i]["dni"] ?> </td>
                            <td><?php echo mb_strtoupper($aEmpleados[$i]["nombre"]); ?> </td> <!--mb_strtoupper es una funcion que nos da php para convertir en mayuscula -->
                            <td><?php echo number_format(calcularNeto($aEmpleados[$i]["bruto"]), 2, ",", ".") ?> </td> <!--El formato dice que tiene 2 decimales, el separador decimal es la coma y el separador de miles el punto.   -->
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p> Cantidad de empleados activos: <?php echo count($aEmpleados); ?></p>
            </div>
        </div>
    </main>
</body>
</html>