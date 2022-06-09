<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
ini_set('error_reporting', E_ALL);


//Si existe el archivo invitados lo abrimos y cargamos en una variable del tipo array
//los DNIs permitidos

//Sino el array queda como un array vacio

//Lista de invitados admitidos


if ($_POST) {
    if (file_exists("invitados.txt")) {
        $aInvitados = explode(",", file_get_contents("invitados.txt"));
    } else {
        $aInvitados = array();
    }
    if (isset($_REQUEST['btnInvitado'])) { //Si el DNI ingresado se encuentra en la lista se mostrará un mensaje de bienvenido. Sino un mensaje de No se encuentra en la lista de invitados.
        $nombre = trim($_REQUEST['txtNombre']);
        if (in_array($nombre, $aInvitados)) {

            $aMensaje = array(
                "texto" => "¡Bienvenid@ $nombre , disfruta la fiesta!",
                "alerta" => "success"
            );
        } else {
            $aMensaje = array(
                "texto" => "No se encuentra en la lista de invitados.",
                "alerta" => "danger"
            );
        }
    } else if (isset($_REQUEST['btnVip'])) {  //Si el codigo es verde entonces mostrará Su código de acceso es ... Sino Ud. no tiene pase VIP
        $respuesta = trim($_REQUEST['txtClave']);
        if ($respuesta == "clave") {
            $aMensaje = array("texto" => "Su clave vip es " . rand(1000, 9999), "alerta" => "success");
        } else {
            $aMensaje = array("texto" => "Ud. no tiene pase VIP", "alerta" => "danger");
        }
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Acceso Invitados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12 py-3">
                <h1 class="text-center pb-3">Lista de invitados</h1>
            </div>
            <?php if (isset($aMensaje)) : ?>
                <div class="col-12">
                    <div class="alert alert-<?php echo $aMensaje["alerta"]; ?>" role="alert">
                        <?php echo $aMensaje["texto"]; ?>
                    </div>
                </div>
            <?php endif; ?>
            <div class="col-12">
                <p>Complete el siguiente formulario:</p>
            </div>
            <div class="col-6">
                <form method="POST" action="">
                    <div class="row">
                        <div class="col-12">
                            <label for="txtDni" class="py-2">Ingrese DNI:</label>
                            <input type="text" name="txtDni" id="txtDni" class="form-control shadow">
                        </div>
                        <div class="mb-3 mt-3">
                            <button type="submit" name="btnProcesar" id="btnProcesar" class="btn btn-outline-dark shadow py-1">Verificar invitado</button>
                        </div>
                </form>
                <div class="my-3">
                    <label for="txtCodigo" class="py-2">Ingrese el código secreto para el pase VIP:</label>
                    <input type="text" name="txtCodigo" id="txtCodigo" class="form-control shadow">
                </div>
                <div class="mb-3 mt-3">
                    <button type="submit" name="btnVip" id="btnVip" class="btn btn-outline-dark shadow py-1">Verificar código </button>
                </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>