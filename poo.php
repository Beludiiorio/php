<?php  /*Abro php */

ini_set('display_errors', 1); /*3 lineas para mostrar los posibes errores*/
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    
class Persona  //Primera clase (persona) que tiene 4 propiedades (son los atributos):
{
    protected $dni;
    protected $nombre;
    protected $edad;
    protected $nacionalidad;

    public function setDni($dni){$this->dni=$dni;}
    public function getDni(){return $this->dni;}

    public function setNombre($nombre){$this->nombre=$nombre;}
    public function getNombre(){return $this->nombre;}

    public function setEdad($edad){$this->edad=$edad;}
    public function getEdad(){return $this->edad;}

    public function setNacionalidad($nacionalidad){$this->nacionalidad=$nacionalidad;}
    public function getNacionalidad(){return $this->nacionalidad;}

    public function imprimir() //Tiene un metodo/funcion que es imprimir:
    {
    } 
    
}

class Alumno extends Persona  //Segunda clase que tiene otras 4 propiedades:
/* El alumno va a tener las propiedades de la persona */

{
    private $legajo;
    private $notaPorfolio;
    private $notaPhp;
    private $notaProyecto;

    public function __get($propiedad)
    {
        return $this->$propiedad;       
    }
    public function __set($propiedad, $valor){
        $this->$propiedad=$valor;
    }

    public function __construct($dni="", $nombre=""){ //Para poder acceder a las variables de las notas, lo hacemos con this:
        $this->nombre=$nombre;
        $this->dni=$dni;
        $this->notaPorfolio= 0.0;
        $this->notaPhp= 0.0;
        $this->notaProyecto= 0.0;
    }
    public function __destruct()
    {
        echo "Destruyendo el objeto " . $this->nombre . "<br>";
    }

    public function calcularPromedio(){

    }
    public function imprimir()
    {
        echo "Alumno: " . $this->nombre . "<br>";
        echo "Documento: " . $this->dni . "<br>";
        echo "Nota portfolio: " . $this->notaPorfolio . "<br>" . "<br>";
        
    } 
}
class Docente extends Persona  //Tercera clase:
{
    private $especialidad;

    const ESPECIALIDAD_WP="Wordpress";
    const ESPECIALIDAD_CONTA="Contabilidad";
    const ESPECIALIDAD_BBDD="Base de datos";

    public function __get($propiedad){
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor)
    {
        $this->$propiedad=$valor;
        
    }

    public function __destruct()
    {
        echo "Destruyendo el objeto " . $this->nombre . "<br>";
        echo "Destruyendo el objeto " . $this->especialidad . "<br>";
    }
    public function imprimirEspecialidadesHabilitadas(){ /*self accede a las contantes dentro de la clase  */
        echo "Especialidades:  <br>";
        echo self::ESPECIALIDAD_BBDD . "<br>";
        echo self::ESPECIALIDAD_CONTA . "<br>";
        echo self::ESPECIALIDAD_WP . "<br>" . "<br>";
    }
    public function imprimir()
    {
        echo "Docente: " . $this->nombre . "<br>";
        echo "Especialidad: " . $this->especialidad . "<br>" . "<br>";
        
    } 
}

/* Programa */


$alumno1= new Alumno();
$alumno1->setNombre("Belen Di iorio");
$alumno1->setEdad(25);
$alumno1->setNacionalidad("Argentina");
$alumno1->setDni("41704438");
$alumno1->legajo="u604627";
$alumno1->notaPhp=8;
$alumno1->notaPorfolio=10;
$alumno1->notaProyecto=9;
$alumno1->imprimir();

$alumno2= new Alumno();
$alumno2->setDni("39044113");
$alumno2->setNombre("Juan Gomez");
$alumno2->setEdad(27);
$alumno2->setNacionalidad("Argentina");
$alumno2->notaPhp=6;
$alumno2->notaPorfolio=6;
$alumno2->notaProyecto=5;
$alumno2->legajo="u603157";
$alumno2->imprimir();


$docente1= new Docente();
$docente1->setNombre("Pedro Dumycz");
$docente1->especialidad=Docente::ESPECIALIDAD_WP;
$docente1->imprimir();
$docente1->imprimirEspecialidadesHabilitadas();



?>