<?php
$nombre = "Belen";
$apellido = "Di iorio Ramirez";
$edad = 25;
$fecha = date("d/m/y");
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha personal </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>


<body>
    <main>
        <div class="container">
            <div class="col-12 p-5 text-center">
                <h1>Ficha personal</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-hover border">
                    <tbody>
                        <tr>
                            <th>Fecha:</th>
                            <td> <?php echo $fecha; ?></td>
                        </tr>
                        <tr>
                            <th>Nombre y Apellido:</th>
                            <td><?php echo $nombre;
                                echo $apellido ?> </td>
                        </tr>
                        <tr>
                            <th>Edad:</th>
                            <td> <?php echo $edad; ?></td>
                        </tr>
                        <tr>
                            <th>Peliculas favoritas:</th>
                            <td>El practicante <br>
                                Tengo ganas de ti <br>
                                Contratiempo <br>
                                3 metros sobre el cielo
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>

</html>
