<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start(); //Indica que utilizaremos variables de session, es un array asociativo

if (!isset($_SESSION["listadoClientes"])) {
    $_SESSION["listadoClientes"] = array();
}

if ($_POST) {
    $nombre = $_REQUEST["txtNombre"];
    $dni = $_REQUEST["txtDni"];
    $telefono = $_REQUEST["txtTelefono"];
    $edad = $_REQUEST["txtEdad"];

    if (isset($_POST["btnAgregar"])) {
        
        $_SESSION["listadoClientes"][] = array(
            "nombre" => $nombre,
            "dni"  => $dni,
            "telefono"  => $telefono,
            "edad"  => $edad
        );

    } else if (isset($_POST["btnEliminar"])) {
        session_destroy();
        $_SESSION["listadoClientes"] = array();
    }
}
?>


<!DOCTYPE html>
<html lang="es"> 

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Listado de clientes</title>
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1> Listado de clientes </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-3 offset-1 me-2">
                <form action="" method="POST" class="form">
                    <label for="txtNombre"> Nombre:</label>
                    <input type="text" name="txtNombre" class="form-control my-2 " placeholder="Ingrese el nombre y apellido">

                    <label for="txtDni">DNI:</label>
                    <input type="text" name="txtDni" class="form-control my-2" placeholder="11111111">

                    <label for="txtTelefono">Telefono:</label>
                    <input type="tel" name="txtTelefono" class="form-control my-2" placeholder="1111111111">

                    <label for="txtEdad">Edad:</label>
                    <input type="text" name="txtEdad" class="form-control my-2" placeholder="99">

                    <input type="submit" name="btnAgregar" class="btn bg-primary text-white" value="Enviar">
                    <input type="submit" name="btnEliminar" class="btn bg-danger text-white" value="eliminar">
                </form>
            </div>
            <div class="col-7 ms-2">
                <table class="table table-hover shadow border "> <!--El shadow hace que se vea una sombra en la tabla -->
                    <thead>
                        <tr class="text-center">
                        <th>Nombre:</th>
                        <th>DNI:</th>
                        <th>Telefono:</th>
                        <th>Edad:</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($_SESSION["listadoClientes"] as $cliente) {
                            echo "<tr>";
                            echo "<td>" . $cliente["nombre"] . "</td>";
                            echo "<td>" . $cliente["dni"] . "</td>";
                            echo "<td>" . $cliente["telefono"] . "</td>";
                            echo "<td>" . $cliente["edad"] . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>