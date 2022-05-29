<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$aAlumnos = array();
$aAlumnos[0] = array("nombre" => "Ana Valle", "notas" =>  array(7, 8));
$aAlumnos[1] = array("nombre" => "Juan Perez", "notas" =>  array(9, 8));
$aAlumnos[2] = array("nombre" => "Gonzalo Roldan", "notas" => array(7, 6));
$aAlumnos[3] = array("nombre" => "Monica Ledesma ", "notas" => array(8, 9));


function promediar($aNumeros){
     $sumatoria= 0;
     foreach($aNumeros as $numero){
         $sumatoria= $sumatoria + $numero;
     }   
     return $sumatoria / count($aNumeros);
      }

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Actas </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center py-3"> Actas </h1>
            </div>
            <table class="table table-hover border">
                <tr>
                    <th>ID</th>
                    <th>Alumno</th>
                    <th>Nota 1</th>
                    <th>Nota 2</th>
                    <th>Promedio</th>
                </tr>
                <?php $promedioCursada= 0;
                 $sumatoria=0;
                 

                 foreach ($aAlumnos as $alumno) : 
                 $promedio = promediar($alumno["notas"]); //En $promedio me guardo la nota del alumno y en $sumatoria empiezo a acumular
                    $sumatoria= $sumatoria + $promedio;
                 ?>
                    <tr>
                        <td><?php echo $alumno["nombre"]; ?></td>
                        <td><?php echo $alumno["notas"][0]; ?></td>
                        <td> <?php echo $alumno["notas"][1]; ?> </td>
                        <td><?php echo number_format($promedio, 2,",", ".");?></td> <!-- Primero va la variable, despues la cantidad de decimales, luego el separador de decimal  y luego separador de miles-->
                    </tr>
                <?php endforeach;
                $promedioCursada= $sumatoria / count($aAlumnos); //Lo que fue acumulando / la cantidad de alumnos
                ?>
            </table>
            <div class="row">
                <div class="col-12">
                    <h2> Promedio de la cursada: <?php echo number_format($promedioCursada, 2, ",", "."); ?></h2>
                </div>
            </div>
        </div>
    </main>
</body>
</html>