<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

array();
$aProductos[0] = array(
    "nombre" => "Smart TV 55\" 4K UHD",
    "marca" => "Hitachi",
    "modelo" => "554KS20",
    "stock" => 60,
    "precio" => 58000
);
$aProductos[1] = array(
    "nombre" => "Samsung Galaxy A30 Blanco",
    "marca" => "Samsung",
    "modelo" => "Galaxy A30 ",
    "stock" => 0,
    "precio" => 22000
);
$aProductos[2] = array(
    "nombre" => "Aire acondicionado Split F/C Surrey 2900F",
    "marca" => " Surrey",
    "modelo" => "553AIQ1201E",
    "stock" => 5,
    "precio" => 45000
);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de productos </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
<div class="container">
        <div class="row">
            <div class="col-12 text-center p-5">
                <h1>Listado de productos</h1>
            </div>
        </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-hover border">
                <tr>
                    <th> Nombre </th>
                    <th> Marca </th>
                    <th>Modelo </th>
                    <th> Stock </th>
                    <th> Precio </th>
                    <th> Acción</th>
                </tr>

                <?php 
                
                $contador= 0;
                while ($contador < count ($aProductos)) {   //El count me devuelve la cantidad de elementos que tenga en mi array                  

                ?>

                <tr>
                    <td> <?php echo $aProductos [$contador]["nombre"]?></td>
                    <td> <?php echo $aProductos [$contador]["marca"] ?></td>
                    <td> <?php echo $aProductos [$contador]["modelo"] ?></td>
                    <td> <?php echo $aProductos [$contador]["stock"] == 0? "Sin stock" : ($aProductos [0]["stock"] <=10 ? "Poco stock" : "Hay stock" ) ?> </td>
                    <td> $ <?php echo $aProductos [$contador]["precio"] ?></td>
                    <td> <button class="btn btn-primary"> Comprar </button></td>
                </tr>

                <?php

                $contador ++ ; 
                }
                ?> 
                </table>
            </div>
        </div>
    </div>
</body>
</html>