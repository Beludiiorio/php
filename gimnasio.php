<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

abstract class Persona
{
    protected $dni;
    protected $nombre;
    protected $correo;
    protected $celular;

    public function __construct($dni, $nombre, $correo, $celular)
    {
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->celular = $celular;
    }

    public function imprimir(){
        echo "DNI:". $this->dni . "<br>";
        echo "Nombre:". $this->nombre . "<br>";
        echo "Correo:". $this->correo . "<br>";
        echo "Celular:". $this->celular . "<br>";

    }
}
class Entrenador extends Persona
{
    private $aClases;

    public function __construct($dni, $nombre, $correo, $celular)
    {
        parent::__construct($dni, $nombre, $correo, $celular); 
        $this->aClases = array();
    }


    public function __get($propiedad)
    {
        return $this->$propiedad;
    }
    public function __set($propiedad, $valor)
    {
        $this->$propiedad = $valor;
    }

    public function asignarClase($clase)
    {
        $this->aClases[] = $clase;
    }
}
class Alumno extends Persona
{

    private $fechaNac;
    private $peso;
    private $altura;
    private $aptoFisico;
    private $presentismo;


    public function __construct($dni, $nombre, $correo, $celular, $fechaNac)
    {
        parent::__construct($dni, $nombre, $correo, $celular);
        $this->fechaNac = $fechaNac;
        $this->peso = 0.0;
        $this->altura = 0.0;
        $this->aptoFisico = false;
        $this->presentismos = 0.0;
    }
    public function __get($propiedad)
    {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor)
    {
        $this->$propiedad = $valor;
    }
    public function setFichaMedica($peso, $altura, $aptoFisico)
    {
        $this->peso = $peso;
        $this->altura = $altura;
        $this->aptoFisico = $aptoFisico;
    }
}
class Clase
{
    private $nombre;
    private $entrenador;
    private $aAlumnos;

    public function __construct()
    {
        $this->aAlumnos = array();
    }

    public function __get($propiedad){
        return $this->$propiedad;
    }

    public function __set($propiedad,$valor)
    {
        $this->$propiedad = $valor;
    }

    public function asignarEntrenador($entrenador)
    {
        $this->entrenador = $entrenador;
    }
    public function inscribirAlumno($alumno)
    {
        $this->aAlumnos[] = $alumno;
    }
    public function imprimirListado()
    {
        echo "<table  class='text-center table table-hover table-bordered border-dark shadow';
                <tr>
                    <th colspan=2 class='text-center table-primary'>Clase</th>
                    <td colspan=2>" . $this->nombre . "</td>
                    
                </tr>
                <tr>
                    <th colspan=2  class='text-center table-danger'> ENTRENADOR</th>
                    <td colspan=2>" . $this->entrenador->nombre . "</td>
                </tr>
                <tr>
                    <th colspan=4 class='text-center table-secondary' >ALUMNOS </th>
                </tr>
                <tr>
                    <td  class='text-center table-dark'>Nombre</td>
                    <td  class='text-center table-dark'>DNI</td>
                    <td  class='text-center table-dark'>Celular</td>
                    <td  class='text-center table-dark'>Apto Fisico</td>
                </tr>";
                    foreach ($this->aAlumnos as $alumno):
                        echo "<tr>
                                <td >". $alumno->nombre."</td>
                                <td >". number_format($alumno-> dni, 0, ",",  ".") ."</td>
                                <td >". $alumno->celular."</td>
                                <td >". $alumno->aptoFisico."</td> 
                             </tr>";
                    endforeach;
            "</table>";

            // preguntar para que aparezca true o false 
    }
}


//Programa
$entrenador1 = new Entrenador("17180169", "Octavio Allende", "Octaa@gmail.com", "1178682468");
$entrenador2 = new Entrenador("30985469", "Brian Villarreal", "brianvillarreal@mail.com", "1175998213");

$alumno1 = new Alumno("41704438", "Belen Di iorio", "beludiiorio@mail.com", "1150207014", "06-04-1997");
$alumno1->setFichaMedica(90, 1.71, true);
$alumno1->presentismo = 90;

$alumno2 = new Alumno("40746323", "Lucia Foco", "luciafoco@gmail.com", "1175822664", "07-08-1998");
$alumno2->setFichaMedica(70, 1.69, true);
$alumno2->presentismo = 98;

$alumno3 = new Alumno("40676876", "Natalia Anton", "natianton05@gmail.com", "1149875261", "13-10-1997");
$alumno3->setFichaMedica(94, 1.70, true);
$alumno3->presentismo = 90;

$alumno4 = new Alumno("18349781", "Claudia Dumycz", "clau_49@gmail.com", "1147958612", "01-08-1989");
$alumno4->setFichaMedica(70, 1.80, true);
$alumno4->presentismo = 97;

$alumno5 = new Alumno("18755934", "Karina Dumycz", "Kdumyzs@gmail.com", "1178654927", "22-02-1964");
$alumno5->setFichaMedica(60, 1.68, true);
$alumno5->presentismo = 100;

$alumno6 = new Alumno("40751234", "Micaela Pesado", "Mica_97@gmail.com", "1176849237", "30-04-1997");
$alumno6->setFichaMedica(60, 1.67, true);
$alumno6->presentismo = 80;

$alumno7 = new Alumno("40676875", "Florencia Anton", "floranton05@gmail.com", "1178649531", "13-10-1997");
$alumno7->setFichaMedica(90, 1.65, true);
$alumno7->presentismo = 90;

$clase1 = new Clase();
$clase1->nombre = "Funcional";
$clase1->asignarEntrenador($entrenador1);
$clase1->inscribirAlumno($alumno3);
$clase1->inscribirAlumno($alumno4);
$clase1->inscribirAlumno($alumno1);
$clase1->inscribirAlumno($alumno7);
//$clase1->imprimirListado();

$clase2 = new Clase();
$clase2->nombre = "Zumba";
$clase2->asignarEntrenador($entrenador2);
$clase2->inscribirAlumno($alumno5);
$clase2->inscribirAlumno($alumno6);
$clase2->inscribirAlumno($alumno2);
//$clase2->imprimirListado();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title> Ficha gimnasio</title>
</head>

<body>
    <main class="container">
        <div class="row mt-3">
            <div class="col-6">
                <?php echo $clase1->imprimirListado(); ?>
            </div>
            <div class="col-6">
                <?php echo $clase2->imprimirListado(); ?>
            </div>
        </div>
    </main>

</body>

</html>