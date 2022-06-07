<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (file_exists("archivo.txt")) {
    #Si el archivo existe, cargo las tareas en la variable $aTareas:
    $strJson = file_get_contents("archivo.txt");
    $aTareas = json_decode($strJson, true);
} else {
    #Si el archivo no existe es porque no hay tareas:
    $aTareas = array();
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];
} else {
    $id = "";
}

if ($_POST) {
    $titulo = $_POST["txtTitulo"];
    $prioridad = $_POST["lstPrioridad"];
    $usuario = $_POST["lstUsuario"];
    $estado = $_POST["lstEstado"];
    $descripcion = $_POST["txtDescripcion"];

    if ($id >= 0) {
        #Estoy editando una tarea:
        $aTareas[$id] = array(
            "fecha" => $aTareas[$id]["fecha"],
            "prioridad" => $prioridad,
            "usuario" => $usuario,
            "estado" => $estado,
            "titulo" => $titulo,
            "descripcion" => $descripcion
        );
    } else {
        #Estoy insertando una tarea:
        $aTareas[] = array(
            "fecha" => date("d/m/Y"),
            "prioridad" => $prioridad,
            "usuario" => $usuario,
            "estado" => $estado,
            "titulo" => $titulo,
            "descripcion" => $descripcion
        );
    }

    #Convertir el array de aTareas en json:
    $strJson = json_encode($aTareas);

    #Almacenar en un archivo.txt el json con file_put_contents:
    file_put_contents("archivo.txt", $strJson);
}
if (isset($_GET["do"]) && $_GET["do"] == "eliminar") {
    unset($aTareas[$id]);

    #Convertir aTareas en json:
    $strJson = json_encode($aTareas);

    #Almacenar el json en el archivo:
    file_put_contents("archivo.txt", $strJson);

    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Gestor de tareas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="fontawesome6.1.1/css/all.min.css">
    <link rel="stylesheet" href="fontawesome6.1.1/css/fontawesome.min.css">
    <!--Bootstrap-->

</head>

<body>
    <main class="container">
        <div class="row">
            <div class="col-12 pb-3 pt-3 text-center">
                <h1> Gestor de tareas </h1>
            </div>
        </div>
        <div class="row pb-3">
            <div>
                <form action="" method="post">
                    <div class="row">
                        <div class="py-1 col-4">
                            <label for="lstPrioridad">Prioridad</label>
                            <select name="lstPrioridad" id="lstPrioridad" class="form-control" required>
                                <option value="" disabled selected>Seleccionar</option>
                                <option value="Alta" <?php echo isset($aTareas[$id]) && $aTareas[$id]["prioridad"] == "Alta" ? "selected" : ""; ?>>Alta</option>
                                <option value="Media" <?php echo isset($aTareas[$id]) && $aTareas[$id]["prioridad"]  == "Media" ? "selected" : ""; ?>>Media</option>
                                <option value="Baja" <?php echo isset($aTareas[$id]) && $aTareas[$id]["prioridad"]  == "Baja" ? "selected" : ""; ?>>Baja</option>
                            </select>
                        </div>
                        <div class="py-1 col-4">
                            <label for="lstUsuario">Usuario</label>
                            <select name="lstUsuario" id="lstUsuario" class="form-control" required>
                                <option value="" disabled selected>Seleccionar</option>
                                <option value="Ana" <?php echo isset($aTareas[$id]) && $aTareas[$id]["usuario"] == "Ana" ? "selected" : ""; ?>>Ana</option>
                                <option value="Bernabe" <?php echo isset($aTareas[$id]) && $aTareas[$id]["usuario"] == "Bernabe" ? "selected" : ""; ?>>Bernabe</option>
                                <option value="Daniela" <?php echo isset($aTareas[$id]) && $aTareas[$id]["usuario"] == "Daniela" ? "selected" : ""; ?>>Daniela</option>
                            </select>
                        </div>
                        <div class="py-1 col-4">
                            <label for="lstEstado">Estado</label>
                            <select name="lstEstado" id="lstEstado" class="form-control" required>
                                <option value="" disabled selected>Seleccionar</option>
                                <option value="Sin asignar" <?php echo isset($aTareas[$id]) && $aTareas[$id]["estado"] == "Sin asignar" ? "selected" : ""; ?>>Sin asignar</option>
                                <option value="Asignado" <?php echo isset($aTareas[$id]) && $aTareas[$id]["estado"] == "Asignado" ? "selected" : ""; ?>>Asignado</option>
                                <option value="En proceso" <?php echo isset($aTareas[$id]) && $aTareas[$id]["estado"] == "En proceso" ? "selected" : ""; ?>>En proceso</option>
                                <option value="Terminado" <?php echo isset($aTareas[$id]) && $aTareas[$id]["estado"] == "Terminado" ? "selected" : ""; ?>>Terminado</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 py-1">
                            <label for="txtTitulo">Título</label>
                            <input type="text" name="txtTitulo" id="txtTitulo" class="form-control" required value="<?php echo isset($aTareas[$id]) ? $aTareas[$id]["titulo"] : ""; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 py-1">
                            <label for="txtDescripcion">Descripción</label>
                            <textarea name="txtDescripcion" id="txtDescripcion" required class="form-control"><?php echo isset($aTareas[$id]) ? $aTareas[$id]["descripcion"] : ""; ?></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 py-1 text-center">
                            <button type="submit" id="btnEnviar" name="btnEnviar" class="btn btn-primary">ENVIAR</button>
                            <a href="index.php" class="btn btn-danger">NUEVO</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php if (count($aTareas)) : ?>
            <div class="row">
                <div class="col-12 pt-3">
                    <thead>
                        <table class="table table-hover table-striped border">
                            <tr>
                                <th> ID </th>
                                <th>Fecha de inserción</th>
                                <th>Título</th>
                                <th>Prioridad </th>
                                <th>Usuario</th>
                            </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($aTareas as $pos => $tarea) : ?>
                            <tr>
                                <td><?php echo $pos ?></td>
                                <td><?php echo $tarea["fecha"]; ?></td>
                                <td><?php echo $tarea["titulo"]; ?></td>
                                <td><?php echo $tarea["prioridad"]; ?></td>
                                <td><?php echo $tarea["usuario"]; ?></td>
                                <td><?php echo $tarea["estado"]; ?></td>
                                <td>
                                <a href="?id=<?php echo $pos ?>" class="btn btn-success"> <i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="?id=<?php echo $pos ?>&do=eliminar" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    </table>
                </div>
            </div>
        <?php else : ?>
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-success" role="alert">
                        Aún no se han cargado tareas.
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </main>
</body>

</html>