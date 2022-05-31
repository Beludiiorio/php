<?php //Abro php
ini_set('display_errors', 1); //3 lineas para que me muestren los posibles errores 
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start(); //Indica que utilizaremos variables de session, es un array asociativo

if (!isset($_SESSION["listadoClientes"])) { //if isset es para saber si una variable existe o no existe, yo le pongo !isset porque no existe entonces "no existe la variable listadoClientes? 
    $_SESSION["listadoClientes"] = array(); //Bueno si no existe la voy a crear asi no me salta error en la primera vez ya que el foreach no puede cargar algo que no existe
}

if ($_POST) { //Si hay post, es decir que la persona completo el formulario,
    $nombre = $_REQUEST["txtNombre"];
    $dni = $_REQUEST["txtDni"];
    $telefono = $_REQUEST["txtTelefono"];
    $edad = $_REQUEST["txtEdad"];

    if (isset($_POST["btnEnviar"])) { //Esta seteado post btnEnviar? bueno si esta enviado hara lo siguiente 
        
        $_SESSION["listadoClientes"][] = array( //Cargara los datos
            "nombre" => $nombre,
            "dni"  => $dni,
            "telefono"  => $telefono,
            "edad"  => $edad
        );

    } else if (isset($_POST["btnEliminar"])) { // Si esta seteado post btnEliminar hara lo siguiente
        session_destroy(); //Elimina toda la variable session
        
         header("location: clientes_session.php"); //Cuando apreto el boton eliminar, que me redireccione 
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
                <form action="" method="POST" class="form"> <!--El action lo va a procesar en este mismo archivo por lo tanto esta vacio -->
                    <label for="txtNombre"> Nombre:</label>
                    <input type="text" name="txtNombre" class="form-control my-2 " placeholder="Ingrese el nombre y apellido"> 

                    <label for="txtDni">DNI:</label>
                    <input type="text" name="txtDni" class="form-control my-2" placeholder="12345678"> <!--El placeholder es para una ver una referencia de lo que debo colocar en cada input -->

                    <label for="txtTelefono">Telefono:</label>
                    <input type="tel" name="txtTelefono" class="form-control my-2" placeholder="1234-4567">

                    <label for="txtEdad">Edad:</label>
                    <input type="text" name="txtEdad" class="form-control my-2" placeholder="12">

                    <button type="submit" name="btnEnviar" class="btn btn-primary  text-white">Enviar </button> <!--Al hacer click en los botones, voy a capturar la informacion con el php (arriba de todo) -->
                    <button type="submit" name="btnEliminar" class="btn bg-danger text-white">Eliminar </button> <!--Le debo colocar el name ya que lo necesito para luego referirme a ese nombre cuando se aprete un boton o el otro -->
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
                        foreach ($_SESSION["listadoClientes"] as $cliente) { //Utilizo un foreach para que recorra los elementos de mi array que esta almacenado en $SESSION["listadoClientes"], cada item va a ser un $cliente en singular 
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