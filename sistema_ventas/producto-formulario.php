<?php

include_once "config.php";
include_once "entidades/producto.php";
include_once "entidades/tipoproducto.php"; #Vinculamos las paginas

$pg = "Edición de producto";

$producto = new Producto();
$producto->cargarFormulario($_REQUEST);

#Agregar y almacenar una imagen
if ($_POST) {
    if (isset($_POST["btnGuardar"])) {

        #Busco el producto que esta en la base de datos, para extraer el nombre anterior de la imagen
        if (isset($_GET["id"]) && $_GET["id"] > 0) {

            $productoAux = new Producto();
            $productoAux->idproducto = $_GET['id']; 
            $productoAux->obtenerPorId();


            if ($_FILES["imagen"]["error"] === UPLOAD_ERR_OK) {
                if (file_exists("file/" . $productoAux->imagen)) {
                    unlink("file/" . $productoAux->imagen);
                }
                $nombreRandom = date("Ymdhmsi") . rand(1000, 2000);
                $extension = pathinfo($_FILES['imagen']["name"], PATHINFO_EXTENSION);
                $archivoTmp = $_FILES["imagen"]["tmp_name"];
                $nombreImagen = $producto->imagen = "$nombreRandom.$extension";
                if ($extension == "jpg" || $extension == "jpeg" || $extension == "png") {
                    move_uploaded_file($archivoTmp, "files/$nombreImagen");
                    $producto->imagen = "$nombreRandom.$extension";
                }
            } else {

                $producto->imagen = $productoAux->imagen;
            }

            #Actualizo un cliente existente
            $producto->actualizar();
        } else { #Almacenamos la imagen en el servidor
            
            if ($_FILES["imagen"]["error"] === UPLOAD_ERR_OK) {
                $nombreRandom = date("Ymdhmsi") . rand(1000, 2000);
                $archivoTmp = $_FILES["imagen"]["tmp_name"];
                $extension = pathinfo($_FILES['imagen']["name"], PATHINFO_EXTENSION);
                if ($extension == "jpg" || $extension == "jpeg" || $extension == "png") {
                    move_uploaded_file($archivoTmp, "files/$nombreImagen");
                    $producto->imagen = "$nombreRandom.$extension";
                }
            }
            #print_r($producto); exit;
            #Es nuevo
            $producto->insertar();
        }
        $msg["texto"] = "Guardado correctamente";
        $msg["codigo"] = "alert-success";

    } else if (isset($_POST["btnBorrar"])) {
        $productoAux = new Producto();
        $productoAux->idproducto = $_GET['id'];
        $productoAux->obtenerPorId();
        if (file_exists("file/" . $productoAux->imagen)) {  
            unlink("file/" . $productoAux->imagen);
        }
        $producto->eliminar();
        header("Location: producto-listado.php");
    }
}
if (isset($_GET["id"]) && $_GET["id"] > 0) {
    $producto->obtenerPorId();
}

$tipoProducto = new Tipoproducto();
$aTipoProductos = $tipoProducto->obtenerTodos(); #Para obtener tipo producto

include_once "header.php";
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Productos</h1>
    <?php if (isset($msg)) : ?>
        <div class="row">
            <div class="col-12">
                <div class="alert <?php echo $msg["codigo"]; ?>" role="alert">
                    <?php echo $msg["texto"]; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-12 mb-3">
            <a href="producto-listado.php" class="btn btn-primary mr-2">Listado</a>
            <a href="producto-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
            <button type="submit" class="btn btn-success mr-2" id="btnGuardar" name="btnGuardar">Guardar</button>
            <button type="submit" class="btn btn-danger" id="btnBorrar" name="btnBorrar">Borrar</button>
        </div>
    </div>
    <div class="row">
        <div class="col-6 form-group">
            <label for="txtNombre">Nombre:</label>
            <input type="text" required="" class="form-control" name="txtNombre" id="txtNombre" value="<?php echo $producto->nombre; ?>">
        </div>
        <div class="col-6 form-group">
            <label for="txtNombre">Tipo de producto:</label>
            <select name="lstTipoProducto" id="lstTipoProducto" class="form-control selectpicker" data-live-search="true" required>
                <option value="" disabled selected>Seleccionar</option>
                <?php foreach ($aTipoProductos as $tipo) : ?>
                    <?php if ($tipo->idtipoproducto == $producto->fk_idtipoproducto) : ?>
                        <option selected value="<?php echo $tipo->idtipoproducto; ?>"><?php echo $tipo->nombre; ?></option>
                    <?php else : ?>
                        <option value="<?php echo $tipo->idtipoproducto; ?>"><?php echo $tipo->nombre; ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="col-6 form-group">
            <label for="txtCantidad">Cantidad:</label>
            <input type="number" required="" class="form-control" name="txtCantidad" id="txtCantidad" value="<?php echo $producto->cantidad; ?>">
        </div>
        <div class="col-6 form-group">
            <label for="txtPrecio">Precio:</label>
            <input type="text" class="form-control" name="txtPrecio" id="txtPrecio" value="<?php echo $producto->precio; ?>">
        </div>
        <div class="col-12 form-group">
            <label for="txtDescripcion">Descripción:</label>
            <textarea type="text" name="txtDescripcion" id="txtDescripcion"><?php echo $producto->descripcion; ?></textarea>
        </div>
        <div class="col-6 form-group">
            <label for="fileImagen">Imagen:</label>
            <input type="file" class="form-control-file" name="imagen" id="imagen">
            <img src="files/<?php echo $producto->imagen; ?>" class="img-thumbnail">
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<script>
    ClassicEditor
        .create(document.querySelector('#txtDescripcion'))
        .catch(error => {
            console.error(error);
        });
</script>
<?php include_once "footer.php"; ?>