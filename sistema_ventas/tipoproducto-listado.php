<?php

include_once "config.php"; //Incluye el archivo de configuracion
include_once "entidades/tipoproducto.php"; //Incluye la entidad (tipoproducto)
$pg = "Listado de tipos de productos"; //Es el titulo de la pagina

$tipoProducto = new TipoProducto(); //Crea el objeto de tipo producto para llamar al metodo obtenerTodos 
$aTipoProductos = $tipoProducto->obtenerTodos(); //Nos trae todos los productos de la base de datos

include_once("header.php"); //Incluye el header 
?>
<!--Comienza la maquetacion en html-->
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Listado de tipos de productos</h1>
          <div class="row">
                <div class="col-12 mb-3">
                    <a href="tipoproducto-formulario.php" class="btn btn-primary mr-2">Nuevo</a>
                </div>
            </div>
          <table class="table table-hover border">
            <tr>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
            <?php foreach ($aTipoProductos as $tipoProducto): ?>
              <tr>
                  <td><?php echo $tipoProducto->nombre; ?></td>
                  <td style="width: 110px;">
                      <a href="tipoproducto-formulario.php?id=<?php echo $tipoProducto->idtipoproducto; ?>"><i class="fas fa-search"></i></a>   
                  </td>
              </tr>
            <?php endforeach; ?>
          </table>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<?php include_once("footer.php"); ?>