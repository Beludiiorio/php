<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario datos personales </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <main class="container">
        <div class="col-12">
            <h1 class="text-center py-4"> Formulario datos personales </h1>
        </div>
        <div class="row">
            <div class="offset-sm-3 col-sm-6 col-12"> <!-- sm es para tablet en adelante que ocupe 6 -->
                <form action="resultado.php" method="POST">
                    <!--Queremos que redireccione a resultado.php, lo va a procesar en resultado.php -->
                    <div class="pb-3">
                        <label for=""> Nombre: *</label>
                        <input type="text" name=txtNombre id=txtNombre class="form-control" required>
                        <!--El form-control es una clase de bootstrap para control de formulario -->
                    </div>
                    <div class="pb-3">
                        <label for=""> DNI: * </label>
                        <input type="text" name=txtDni id=txtDni class="form-control" required>
                        <!--El form-control es una clase de bootstrap para control de formulario -->
                    </div>
                    <div class="pb-3">
                        <label for=""> Telefono: * </label>
                        <input type="text" name=txtTelefono id=txtTelefono class="form-control" required>
                        <!--El form-control es una clase de bootstrap para control de formulario, con mas estilo -->
                    </div>
                    <div class="pb-3">
                        <label for=""> Edad:* </label>
                        <input type="text" name=txtEdad id=txtEdad class="form-control " required>
                        <!--El form-control es una clase de bootstrap para control de formulario -->
                    </div>
                    <div class="pb-3">
                        <button type="submit" class="btn btn-primary pt-2"> ENVIAR </button>
                    </div>

                </form>
            </div>
        </div>
    </main>
</body>

</html>