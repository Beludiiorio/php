<?php //Abro php
ini_set('display_errors', 1); //3 lineas para poder visualizar los errores
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

date_default_timezone_set('America/Argentina/Buenos_Aires');
//date_default_timezone_set('America/Bogota');

abstract class Persona{
    protected $dni;
    protected $nombre;
    protected $correo;
    protected $celular;

    abstract public function imprimir();

}

class Cliente extends Persona{
    private $aTarjetas;
    private $bActivo;
    private $fechaAlta;
    private $fechaBaja;

    public function __construct(){
        $this->fechaAlta = date("d/m/Y H:i:s");
        $this->aTarjetas = array();
        $this->bActivo = true;
    }

    public function __get($propiedad){
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor){
        $this->$propiedad = $valor;
    }

    public function agregarTarjeta($tarjeta){
        $this->aTarjetas[] = $tarjeta;
    }

    public function darDeBaja($fechaBaja){
        $this->bActivo = false;
        $this->fechaBaja = $fechaBaja;
    }

    public function imprimir(){
        
    }
}

class Tarjeta{
    private $numero;
    private $fechaDesde;
    private $fechaVto;
    private $tipo;
    private $cvv;

    //Constantes de las tarjetas:

    const VISA = "Visa";
    const MASTERCARD = "Mastercard";
    const AMEX = "American Express";
    const NARANJA = "Naranja";
    const CABAL = "CABAL";

    public function __construct($tipo, $numero, $fechaVto, $cvv) {
        $this->numero = $numero;
        $this->fechaVto = $fechaVto;
        $this->tipo = $tipo;
        $this->cvv = $cvv;
    }

    public function __get($propiedad){
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor){
        $this->$propiedad = $valor;
    }

}

//Desarrollo del programa, damos de alta a los  clientes:

$cliente1 = new Cliente();
$cliente1->dni = "40123789";
$cliente1->nombre = "Valentina Toro";
$cliente1->correo = "Valentoro@correo.com";
$cliente1->celular = "1145867981";
$tarjeta1 = new Tarjeta(Tarjeta::VISA, "4223750742806383", "02/2024", "142");
$tarjeta2 = new Tarjeta(Tarjeta::AMEX, "347547886783981", "08/2027", "166");
$tarjeta3 = new Tarjeta(Tarjeta::MASTERCARD, "54157814959715909", "11/2024", "877");
$cliente1->agregarTarjeta($tarjeta1);
$cliente1->agregarTarjeta($tarjeta2);
$cliente1->agregarTarjeta($tarjeta3);

$cliente2 = new Cliente();
$cliente2->dni = "40476876";
$cliente2->nombre = "Octavio Allende";
$cliente2->correo = "octaallende@correo.com";
$cliente2->celular = "1178617863";
$cliente2->agregarTarjeta(new Tarjeta(Tarjeta::VISA, "4969508071710316", "04/2025", "687"));
$cliente2->agregarTarjeta(new Tarjeta(Tarjeta::MASTERCARD, "5149107669552238", "03/2026", "157"));

print_r($cliente1);
print_r($cliente2);
