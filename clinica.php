<?php //Abro php
ini_set('display_errors', 1); //Lineas para registrar los errores
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aPacientes = array(); //Declaro mi array
$aPacientes[0] = array( //Mi array numerico a su vez tiene un array asociativo
    "dni" => "33.765.012",
    "nombre" => "Ana Acuña",
    "edad" => 45,
    "peso" => 81.50,
);

$aPacientes[1] = array(
    "dni" => "23.684.385",
    "nombre" => "Gonzalo Bustamante",
    "edad" => 66,
    "peso" => 79
);
$aPacientes[2] = array(
    "dni" => "23.684.386",
    "nombre" => "Juan Iraola",
    "edad" => 28,
    "peso" => 70
);
$aPacientes[3] = array(
    "dni" => "23.684.792",
    "nombre" => "Beatriz Ocampo",
    "edad" => 50,
    "peso" => 79
);

?> <!--Cierro php -->

<!DOCTYPE html> <!-- Abro html-->
<html lang="es"> <!--Le indicamos el idioma -->

<head>  <!-- Es la configuracion que le indicamos al ordenador -->
    <meta charset="UTF-8">  <!--Para que acepte los caracteres del español -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Para que sea compatible con microsoft edge-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  <!-- Para que las paginas sean responsivas -->
    <title> Listado de pacientes </title>  <!--Titulo de la pestaña -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> <!--Bootstrap-->
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-3">
                <h1> Listado de pacientes </h1>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <table class="table table-hover border">
                    <tr class="text-center">
                        <th> DNI</th>
                        <th>Nombre y apellido </th>
                        <th> Edad </th>
                        <th> Peso </th>
                    </tr>

                    <?php foreach ($aPacientes as $paciente) { //Empieza el bucle 


                    ?>
                        <tr class="text-center">
                            <td><?php echo $paciente["dni"];  ?></td>
                            <td> <?php echo $paciente["nombre"]; ?></td>
                            <td> <?php echo $paciente["edad"]; ?></td>
                            <td> <?php echo $paciente["peso"]; ?></td>
                        </tr>

                    <?php } //Termina el bucle  
                    ?>

                </table>
            </div>
        </div>
    </main>
</body>

</html>