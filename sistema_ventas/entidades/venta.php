<?php

class Venta //Es POO por eso la clase comienza en mayuscula y las entidades en singular
{
    private $idventa; //Se corresponden a las columnas de la base de datos
    private $fk_idcliente;
    private $fk_idproducto;
    private $fecha;
    private $cantidad;
    private $preciounitario;
    private $total;
    

    public function __construct() //constructor por defecto
    {
                $this -> cantidad= 0.0;
                $this -> total= 0.0;
    }

    public function __get($atributo)
    {
        return $this->$atributo;
    }

    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
        return $this;
    }

    public function cargarFormulario($request)
    {
        $this->idventa = isset($request["id"]) ? $request["id"] : "";
        $this->fk_idcliente = isset($request["lsCliente"]) ? $request["lsCliente"] : "";
        $this->fk_idproducto = isset($request["lsProducto"]) ? $request["lsProducto"] : "";
        $this->cantidad = isset($request["txtCantidad"]) ? $request["txtCantidad"] : "";
        $this->precionitario = isset($request["txtPrecioUnitario"]) ? $request["txtPrecioUnitario"] : "";
        $this->total = isset($request["total"]) ? $request["total"] : "";
        if (isset($request["txtAnio"]) && isset($request["txtMes"]) && isset($request["txtDia"])) {
            $this->fecha_nac = $request["txtAnioNac"] . "-" . $request["txtMesNac"] . "-" . $request["txtDiaNac"]; //Para leer la fecha
        }
    }

    public function insertar()
    {
        //Instancia la clase mysqli con el constructor parametrizado
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        //Arma la query, es un string:
        $sql = "INSERT INTO ventas ( #El metodo insert tiene 4 partes, se conecta a la BBDD, utiliza el programa mySQLI, crea el objeto mySQLI.
                    fk_idcliente,
                    fk_idproducto,
                    fecha,
                    cantidad,
                    preciounitario,
                    total

                ) VALUES (
                    '$this-> fk_idcliente,
                    '$this-> fk_idproducto,
                    '$this-> fecha,
                    '$this->cantidad,
                    '$this-> preciounitario,
                    $this-> total
                    
                );";
        // print_r($sql);exit;
        //Ejecuta la query
        if (!$mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }
        //Obtiene el id generado por la inserción
        $this->idventa = $mysqli->insert_id;
        //Cierra la conexión
        $mysqli->close();
    }

    public function actualizar()
    {

        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        $sql = "UPDATE ventas SET
                fk_idcliente, = '" . $this-> fk_idcliente . "',
                fk_idproducto = '" . $this->fk_idproducto . "',
                fecha = '" . $this->fecha . "',
                cantidad= " . $this->cantidad . ",
                preciounitario =  " . $this->preciounitario . ",
                total =  " . $this-> total . "
                WHERE idventas = " . $this->idventas;

        if (!$mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }
        $mysqli->close();
    }

    public function eliminar()
    {
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        $sql = "DELETE FROM ventas WHERE idventa = " . $this->idventa;
        //Ejecuta la query
        if (!$mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }
        $mysqli->close();
    }

    public function obtenerPorId()
    {
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        $sql = "SELECT idventa,
                         fk_idcliente,
                         fk_idproducto ,
                         fecha,
                         cantidad,
                         preciounitario,
                         total
                       
                FROM ventas
                WHERE idventa = $this->idventa";
        if (!$resultado = $mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }

        //Convierte el resultado en un array asociativo
        if ($fila = $resultado->fetch_assoc()) {
            $this->idventa = $fila["idventa"];
            $this->fk_idcliente = $fila["fk_idcliente"];
            $this->fk_idproducto = $fila["fk_idproducto"];
           
            if(isset($fila["fecha"])){
                $this->fecha= $fila["fecha"];
            } else {
                $this->fecha = "";
            }
            $this->cantidad = $fila["cantidad"];
            $this->preciounitario = $fila["precionunitario"];
            $this->total= $fila["total"];
        }
        $mysqli->close();

    }

     public function obtenerTodos(){
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        $sql = "SELECT 
                    idventa,
                    fk_idcliente,
                    fk_idcliente,
                    fecha,
                    cantidad,
                    preciounitario,
                    total

                FROM ventas";
        if (!$resultado = $mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }

        $aResultado = array();
        if($resultado){
            //Convierte el resultado en un array asociativo

            while($fila = $resultado->fetch_assoc()){
                $entidadAux = new Venta();
                $entidadAux->idventa = $fila["idventa"];
                $entidadAux->fk_idcliente = $fila["fk_idcliente"];
               
                if(isset($fila["fecha"])){
                    $entidadAux->fecha = $fila["fecha"];
                } else {
                    $entidadAux->fecha = "";
                }
                $entidadAux->cantidad= $fila["cantidad"];
                $entidadAux->preciounitario = $fila["preciounitario"];
                $entidadAux->total = $fila["total"];
                $aResultado[] = $entidadAux;
            }
        }
        return $aResultado;
    }

}
?>