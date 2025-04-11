<?php 
class Venta {
    private $numero;
    private $fecha;
    private $cliente;
    private $colMotos;
    private $precioFinal;

    public function __construct($numero, $fecha, $cliente, $colMotos, $precioFinal){
        $this->numero = $numero;
        $this->fecha = $fecha;
        $this->cliente = $cliente;
        $this->colMotos = $colMotos;
        $this->precioFinal = $precioFinal;
    }

    public function getNumero(){
        return $this->numero;
    }
    public function getFecha(){
        return $this->fecha;
    }
    public function getCliente() {
        return $this->cliente;
    }
    public function getColMotos(){
        return $this->colMotos;
    }
    public function getPrecioFinal(){
        return $this->precioFinal;
    }

    public function setNumero($num) {
        $this->numero = $num;
    }
    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }
    public function setCliente($cliente) {
        $this->cliente = $cliente;
    }
    public function setColMotos(array $colMotos) {
        $this->colMotos = $colMotos;
    }
    public function setPrecioFinal($precioFinal) {
        $this->precioFinal = $precioFinal;
    }
    public function incorporarMoto($objMoto) {
        $precioMoto = $objMoto->darPrecioVenta();
        $seAgrego = false;
    
        if ($precioMoto > 0) {
            $colMotos = $this->getColMotos();
            $colMotos[] = $objMoto;
            $this->setColMotos($colMotos);
            $this->setPrecioFinal($this->getPrecioFinal() + $precioMoto);
            $seAgrego = true;
        }
    
        return $seAgrego;
    }
    


    public function __toString(){
        $stringMotos = "";
        foreach($this->getColMotos() as $moto){
            $stringMotos .= $moto->tostring()."\n";
        }
        return "Venta Nro: ".$this->getNumero()." - Fecha: ".$this->getFecha()."\n".$this->getCliente()->tostring()."\nMotos vendidas:\n".$stringMotos."Precio final: ".$this->getPrecioFinal()."\n";
    }
}