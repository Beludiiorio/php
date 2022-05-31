<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Tenemos que capturar los datos ingresados en index.php entonces:


if ($_POST) {
    $nombre = $_POST["txtNombre"];
    $dni = $_POST["txtDni"];
    $telefono = $_POST["txtTelefono"];
    $edad = $_POST["txtEdad"];
}


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso de datos personales </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12">
                <h1 class=" text-center py-4"> Resultado de formulario </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-hover border">
                    <thead>
                        <tr class="text-center">
                            <th>Nombre: </th>
                            <th>Dni: </th>
                            <th>Telefono: </th>
                            <th>Edad: </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td> <?php echo $nombre = $_POST["txtNombre"]; ?> </td>
                            <td> <?php echo $dni = $_POST["txtDni"]; ?></td>
                            <td> <?php echo $telefono = $_POST["txtTelefono"]; ?></td>
                            <td> <?php echo  $edad = $_POST["txtEdad"]; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>

</html>