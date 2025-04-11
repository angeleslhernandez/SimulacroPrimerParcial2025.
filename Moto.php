<?php
class Moto {
    private $codigo;
    private $costo;
    private $anioFabric;
    private $descrip;
    private $porcenIncr;
    private $activa;

    public function __construct($codigo,$costo,$anio,$descrip,$porc,$activa){
        $this->codigo = $codigo;
        $this->costo = $costo;
        $this->anioFabric = $anio;
        $this->descrip = $descrip; 
        $this->porcenIncr = $porc;
        $this->activa = $activa;
    }

    public function getCodigo(){
        return $this->codigo;
    }
    public function getCosto(){
        return $this->costo;
    }
    public function getAnio(){
        return $this->anioFabric;
    }
    public function getPorcentaje(){
        return $this->porcenIncr;
    }
    public function getDescrip(){
        return $this->descrip;
    }
    public function getActiva(){
        return $this->activa;
    }

    public function setCodigo($cod){
        $this->codigo = $cod;
    }
    public function setCosto($costo){
        $this->costo = $costo;
    }
    public function setAnio($anio){
        $this->anioFabric = $anio;
    }
    public function setPorcentaje($porc){
        $this->porcenIncr = $porc;
    }
    public function setActiva($activa){
        $this->activa = $activa;
    }

    public function darPrecioVenta(){
        $precioVenta = -1;
        if ($this->getActiva()) {
            $anioActual = date("Y"); //nose si poedirlo como parametro o usar esta funcion
            $aniosPasados = $anioActual - $this->getAnio();
            $precioVenta = $this->getCosto() + ($this->getCosto() * ($aniosPasados * ($this->getPorcentaje()/100)));

        }
        return $precioVenta;
    }

    public function __tostring(){
        $estado = $this->getActiva()? "DISPONIBLE" : " NO DISPONIBLE";
        return "Codigo:". $this->getCodigo().". Costo: ".$this->getCosto().". Año de fabricacion: ". $this->getAnio().". Porcentaje: ".$this->getPorcentaje().". Estado: $estado";   
    }
}
