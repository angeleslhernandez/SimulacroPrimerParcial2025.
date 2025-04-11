<?php 
class Empresa {
    private $denominacion;
    private $direccion;
    private $colClientes;
    private $colMotos;
    private $colVentas;

    public function __construct($denomin, $direccion, $colClientes, $colMotos, $colVentas) {
        $this->denominacion = $denomin;
        $this->direccion = $direccion;
        $this->colClientes = $colClientes;
        $this->colMotos = $colMotos;
        $this->colVentas = $colVentas;
    }

    public function getDenominacion() {
        return $this->denominacion;
    }
    public function getDireccion() {
        return $this->direccion;
    }
    public function getColClientes() {
        return $this->colClientes;
    }
    public function getColMotos() {
        return $this->colMotos;
    }
    public function getColVentas() {
        return $this->colVentas;
    }

    public function setDenominacion($denominacion) {
        $this->denominacion = $denominacion;
    }
    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }
    public function setColMotos($colMotos) {
        $this->colMotos = $colMotos;
    }
    public function setColVentas($colVentas) {
        $this->colVentas = $colVentas;
    }
    public function setColClientes($colClientes) {
        $this->colClientes = $colClientes;
    }
    public function retornarMoto($codigoMoto) {
        $motoEncontrada = null;
        $i = 0;
        $colMotos = $this->getColMotos();
        $n = count($colMotos);
    
        while ($i < $n && $motoEncontrada == null) {
            if ($colMotos[$i]->getCodigo() == $codigoMoto) {
                $motoEncontrada = $colMotos[$i];
            }
            $i++;
        }
    
        return $motoEncontrada;
    }
    public function registrarVenta($colCodigosMoto,$objCliente){
        $precioFinal = 0;

        $colMotosVenta = [];

        if(!$objCliente->getEstado()){
            foreach($colCodigosMoto as $codigoMoto){
                $moto= $this->retornarMoto($codigoMoto);
                if ($moto != null){
                    if($moto->darPrecioVenta() > 0){
                        $colMotosVenta[] = $moto;
                        $precioFinal += $moto->darPrecioVenta();
                    }
                }
            }
            if(count($colMotosVenta) > 0){
                $venta= new Venta(count($this->getColVentas()) + 1,date("d-m-y"),$objCliente,$colMotosVenta,$precioFinal);
                $ventas = $this->getColVentas();
                $ventas[] = $venta;
                $this->setColVentas($ventas);   
            }
            //nose q num ponerle a la venta 
        return $precioFinal;
        }
    }
    public function retornarVentasXCliente($tipo, $numDoc) {
        $ventasDelCliente = [];
    
        foreach ($this->getColVentas() as $venta) {
            $cliente = $venta->getCliente();
            if ($cliente->getTipoDoc() == $tipo && $cliente->getDoc() == $numDoc) {
                $ventasDelCliente[] = $venta;
            }
        }
    
        return $ventasDelCliente;
    }
    

    
    public function __toString() {
        $clientes = "";
        $motos = "";
        $ventas = "";
        foreach($this->getColClientes() as $cliente){
            $clientes .= $cliente->__toString()."\n";
        }
        foreach($this->getColMotos() as $moto){
            $motos .= $moto->__toString()."\n";
        }
        foreach($this->getColVentas() as $venta){
            $ventas .= $venta->__toString()."\n";
        }

        return "Empresa: ".$this->getDenominacion()."Direccion: ".$this->getDireccion()."\nClientes:\n".$clientes."\nMotos:\n".$motos."\nVentas:\n".$ventas;
    }
}
