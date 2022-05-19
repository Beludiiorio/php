<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


//si es postback
if ($_POST) {
    $usuario = $_POST["txtUsuario"];
    $clave = $_POST["txtClave"];


    //Si nombre es distinto de vacio y clave es distinto de vacio entonces:
    if ($usuario != "" &&  $clave != "") {
        //redireccionar a acceso-confirmado.php
        header("Location:acceso-confirmado.php");
        //sino 
    } else {
        $mensaje = "Válido para usuarios registrados.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>

<body>
    <main class="container">
        <div class="row" >
            <div class="col-12 text-center py-3 ">
                <h1> Formulario </h1>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <!--isset lo usamos para saber si existe la variable mensaje -->
                <?php if (isset($mensaje)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $mensaje; ?>
                    </div>
                <?php } ?>
                <form method="POST" action="">
                    <div>
                        <label for="txtUsuario">Usuario:</label>
                            <input type="text" id="txtUsuario" name="txtUsuario" class="form-control">
                    </div>
                    <div class="py-3">
                        <label for="txtClave">Clave:</label>
                            <input type="password" id="txtClave" name="txtClave" class="form-control">
                    </div>
                    <div class="py-3">
                        <button class="btn btn-primary" type="submit">ENVIAR</button>
                    </div>
                </form>
            </div>
        </div>

    </main>
</body>

</html>