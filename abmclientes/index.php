<?php #Abro php

ini_set('display_errors', 1); #Las 3 lineas que me permiten ver los posibles errores:
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if(file_exists("archivo.txt")){ #Si el archivo existe lo voy a abrir:
   
    $strJson = file_get_contents("archivo.txt"); #Leer el archivo y almacenar el contenido json en una variable:
    
    $aClientes = json_decode($strJson, true); #Convertir el json en un array aClientes (el true es para que lo convierta en un array y no en un objeto):

} else { #Si no existe es porque no hay clientes:
    
    $aClientes = array(); #Array vacio de clientes $aClientes:
}

if (isset($_GET["id"])){
    $id = $_GET["id"];
} else {
    $id = "";
}


#Si es eliminar:
if(isset($_GET["do"]) && $_GET["do"] == "eliminar") { #El GET accede a toda la query string

    #Elimino la posición $aClientes[$id]:
    unset($aClientes[$id]);

    #Convertir el array en json:
    $strJson = json_encode ($aClientes);

    #Actualizar archivo con el nuevo array de clientes:
    file_put_contents("archivo.txt", $strJson);

    header("Location: index.php"); #Redireccionamiento a index.php
}

if($_POST){
    $dni = trim($_POST["txtDni"]);
    $nombre = trim($_POST["txtNombre"]);
    $telefono = trim($_POST["txtTelefono"]);
    $correo = trim($_POST["txtCorreo"]);
    $nombreImagen="";

    #Si viene una imagen adjunta la guardo:
    if ($_FILES["archivo"]["error"] === UPLOAD_ERR_OK) {
        $nombreAleatorio = date("Ymdhmsi") . rand(1000, 2000); 
        $archivo_tmp = $_FILES["archivo"]["tmp_name"]; 
        $extension = pathinfo($_FILES["archivo"]["name"], PATHINFO_EXTENSION);
        if($extension == "jpg" || $extension == "png" || $extension == "jpeg"){
            $nombreImagen = "$nombreAleatorio.$extension";
            move_uploaded_file($archivo_tmp, "imagenes/$nombreImagen");
        }
    }

    if($id >= 0){
        # Si no se subio una imagen y estoy editando conservar en $nombreImagen el nombre
        # De la imagen anterior que esta asociada al cliente que estamos editando:

         if ($_FILES["archivo"]["error"] !== UPLOAD_ERR_OK) {
            $nombreImagen = $aClientes[$id]["imagen"];
         } else {
            
            #Si viene una imagen Y hay una imagen anterior, eliminar la anterior

            if(file_exists("imagenes/". $aClientes[$id]["imagen"])){
                unlink("imagenes/". $aClientes[$id]["imagen"]);
            }
         }

        #Actualizo/ estoy editando:

        $aClientes[$id] = array("dni" => $dni,
                            "nombre" => $nombre,
                            "telefono" => $telefono,
                            "correo" => $correo,
                            "imagen" => $nombreImagen,
                        );
    } else {
       
        #Es nuevo cliente:
        $aClientes[] = array("dni" => $dni,
                        "nombre" => $nombre,
                        "telefono" => $telefono,
                        "correo" => $correo,
                        "imagen" => $nombreImagen
                    );
    }

    #Convertir el array a json:
    $strJson = json_encode($aClientes);

    #Almacenar el json en archivo.txt:
    file_put_contents("archivo.txt", $strJson);

}

?>

<!DOCTYPE html> <!-- Abro html-->
<html lang="es"> <!--Idioma Español-->
<head> <!-- Es la configuracion que le indicamos al ordenador -->
    <meta charset="UTF-8">    <!--Para que acepte los caracteres del español -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Para que sea compatible con microsoft edge-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   <!-- Para que las paginas sean responsivas -->
    <title> ABM Clientes </title>  <!--Titulo de la pestaña -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> <!--Incluimos Bootstrap-->
    <link rel="stylesheet" href="css/fontawesome6.1.1/css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome6.1.1/css/fontawesome.min.css"> <!--Incluimos fontawesome-->
</head>
<body> <!--Cuerpo -->
    <main class="container">
        <div class="row">
            <div class="col-12 py-4 text-center">
                <h1> Registro de clientes </h1>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <form action="" method="POST" enctype="multipart/form-data"> <!--Enctype es el atributo para adjuntar archivos -->
                    <div>
                        <label for=""> DNI:* </label>
                        <input type="text" name="txtDni" id="txtDni" class="form-control pb-2 border border-dark" placeholder="12.345.789" required value="<?php echo isset($aClientes[$id]["dni"])? $aClientes[$id]["dni"] : ""; ?>">
                    </div>
                    <div>
                        <label for=""> Nombre: *</label>
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control pb-2 border border-dark" placeholder=" Juana Rodriguez" required value="<?php echo isset($aClientes[$id]["nombre"])? $aClientes[$id]["nombre"] : ""; ?>">
                    </div>

                    <div>
                        <label for=""> Teléfono:</label>
                        <input type="text" name="txtTelefono" id="txtTelefono" class="form-control pb-2 border border-dark" placeholder="4801-7896" required value="<?php echo isset($aClientes[$id]["telefono"])? $aClientes[$id]["telefono"] : ""; ?>">
                    </div>
                    <div>
                        <label for=""> Correo: *</label>
                        <input type="email" name="txtCorreo" id="txtCorreo" class="form-control pb-2 border border-dark" placeholder="ejemplo@gmail.com" required value="<?php echo isset($aClientes[$id]["correo"])? $aClientes[$id]["correo"] : ""; ?>">
                    </div>
                    <div>
                        <label for="" class="p-3"> Archivo adjunto </label>
                        <input type="file" name="archivo" id="archivo" accept=".jpg, .jpeg, .png"> <!--Accept se refiere al formato que podemos utlizar en este caso -->
                        <small class="d-block"> Archivos admitidos: .jpg, .jpeg, .png </small> <!--Small convierte mi texto en un tamaño más pequeño -->
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success border border-dark"> GUARDAR </button>
                        <a href="index.php" class="btn btn-warning my-2 border border-dark"> NUEVO </a> <!-- Le coloco un borde negro -->
                    </div>
                </form>
            </div>
            <div class="col-6">
                <table class="table table-hover table-striped shadow border">
                  
                <tr class="text-center fs-5 table-secondary"> <!--fs-5 es para modificar el tamaño del texto -->
                        <th>Imagen</th>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                    </tr>
                    <?php foreach ($aClientes as $pos => $cliente): ?> <!--Usamos el foreach para recorrer los clientes -->
                        <tr class="text-center">
                            <td><img src="imagenes/<?php echo $cliente["imagen"]; ?>" class="img-thumbnail"></td>
                            <td><?php echo $cliente["dni"]; ?></td>
                            <td><?php echo $cliente["nombre"]; ?></td>
                            <td><?php echo $cliente["correo"]; ?></td>
                            <td>
                                <a href="?id=<?php echo $pos; ?>"><i class="fa-solid fa-square-pen fa-lg" style="color:green"></i></a> <!--Boton de editar/ fa-ig es para el tamaño de los iconos -->
                                <a href="?id=<?php echo $pos; ?>&do=eliminar"><i class="fa-solid fa-trash-can fa-lg" style="color:red"></i></a> <!--Boton de eliminar -->
                            </td>
                          
                        </tr>
                    <?php endforeach; ?>
                </table> 
            </div>
        </div>
    </main>
</body>
</html>