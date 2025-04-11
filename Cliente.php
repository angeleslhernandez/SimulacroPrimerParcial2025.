<?php
class Cliente {
    private $nombre;
    private $apellido;
    private $estadoBaja;
    private $tipoDoc;
    private $documento;

    public function __construct($nombre,$apellido,$tipoDoc,$doc,$estado){
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->estadoBaja=$estado;
        $this->tipoDoc=$tipoDoc;
        $this->documento=$doc;
    }

    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function getEstado(){
        return $this->estadoBaja;
    }
    public function getTipoDoc(){
        return $this->tipoDoc;
    }
    public function getDoc(){
        return $this->documento;
    }

    public function setNombre( $nombre ){
        $this->nombre=$nombre;
    }
    public function setApellido($apellido){
        $this->apellido=$apellido;
    }
    public function setTipoDoc($tipoDoc){
        $this->tipoDoc=$tipoDoc;
    }
    public function setDoc($doc){
        $this->documento=$doc;
    }
    public function setEstado($estadoBaja){
        $this->estadoBaja=$estadoBaja;
    }

    public function __tostring(){
        $estado = $this->getEstado()? "BAJA" : "ACTIVO";
        return "Cliente:". $this->getNombre()." ".$this->getApellido()." - Documento: ". $this->getTipoDoc()." ".$this->getDoc()." - Estado: $estado";   
    }
}