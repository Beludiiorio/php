<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aProductos = array();
$aProductos[] = array("nombre" => "Smart TV 55\" 4K UHD",
    "marca" => "Hitachi",
    "modelo" => "554KS20",
    "stock" => 60,
    "precio" => 58000,
);
$aProductos[] = array("nombre" => "Samsung Galaxy A30 Blanco",
    "marca" => "Samsung",
    "modelo" => "Galaxy A30",
    "stock" => 0,
    "precio" => 22000,
);
$aProductos[] = array("nombre" => "Aire Acondicionado Split Inverter Frío/Calor Surrey 2900F",
    "marca" => "Surrey",
    "modelo" => "553AIQ1201E",
    "stock" => 5,
    "precio" => 45000,
);
$aProductos[] = array("nombre" => "Impresora HP laser ",
    "marca" => "HP",
    "modelo" => "1102W",
    "stock" => 5,
    "precio" => 20000,
);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
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
                <table class="table table-dark table-hover border">
                    <tr>
                        <th>Nombre</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Stock</th>
                        <th>Precio</th>
                        <th>Acción</th>
                    </tr>
            
                      <?php
                        $sumatoria = 0;  //Lo coloco afuera del bucle porque sino lo pierdo
                        for($i = 0; $i < count($aProductos); $i++){ //El count me devuelve la cantidad de elementos que tenga en mi array                  
                            //Si pongo $sumatoria=0 aca, lo pierdo.
                            
                            echo "<tr>";
                            echo "<td>" . $aProductos[$i]["nombre"] . "</td>";
                            echo "<td>" . $aProductos[$i]["marca"] . "</td>";
                            echo "<td>" . $aProductos[$i]["modelo"] . "</td>";
                            echo "<td>" . $aProductos[$i]["stock"] . "</td>";
                            echo "<td> $" . $aProductos[$i]["precio"] . "</td>";
                            echo "<td><button class=\"btn btn-primary\">Comprar</button></td>";
                            echo "</tr>";
                            $sumatoria += $aProductos[$i]["precio"];
                        }
                        ?>
                </table>
          
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h2> Suma un total de $ <?php echo $sumatoria; ?></h3>
            </div>
        </div>
    </div>
</body>
</html>

