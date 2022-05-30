<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$aEmpleados= array ();
$aEmpleados[]= array ("dni"=> 33300123, "nombre" => "David Garcia", "bruto"=> 85000.30);
$aEmpleados[]= array ("dni"=> 40874456, "nombre" => "Ana del Valle", "bruto"=> 90000);
$aEmpleados[]= array("dni"=> 67567565, "nombre" => "Andres Perez", "bruto"=> 100000);
$aEmpleados[]= array ("dni"=> 75744545, "nombre" => "Victoria Luz", "bruto"=> 70000);


//Definicion:

function calcularNeto ($bruto) {

    return $bruto - ($bruto * 0.17);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de empleados </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <main>
<div class="container">
    <div class="col-12 text-center py-3 ">
        <h1> Listado de empleados </h1>
    </div>
</div>
<div class="row">
    <div class="col-12 text-center">
        <table class="table table-hover border">
<tr>
    <th>DNI</th>
    <th>Nombre</th>
    <th>Sueldo</th>
</tr>

<?php for ($i=0; $i< count($aEmpleados); $i++) { ?>
<tr>
   <td><?php echo $aEmpleados [$i]["dni"] ?> </td>
   <td><?php echo mb_strtoupper($aEmpleados[$i]["nombre"]); ?> </td>
   <td><?php echo number_format(calcularNeto($aEmpleados[$i]["bruto"]), 2, ",", "." ) ?> </td>
</tr>
<?php } ?>
        </table>

    </div>
</div>
<div>
    <div class="col-12">
<p> Cantidad de empleados activos: <?php echo count($aEmpleados); ?></p>
    </div>
</div>
    </main>
</body>
</html>