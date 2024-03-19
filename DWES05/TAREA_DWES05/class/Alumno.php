<?php

class Alumno {
    private $dni;
    private $nombre;
    private $apellido1;
    private $apellido2;
    private $edad;
    private $telefono;
    
    public function __construct($d, $n, $a1, $a2, $e, $t){
        $this->dni=$n;
        $this->nombre=$n;
        $this->apellido1=$a1;
        $this->apellido2=$a2;
        $this->edad=$e;
        $this->telefono=$t;
    }
    public function __destruct() {
        
    }
    //SET
    public function setDni($d) {
        $this->dni=$d;
    }
    public function setNombre($n) {
        $this->nombre=$n;
    }
    public function setApellido1($a1) {
        $this->apellido1=$a1;
    }
    public function setApellido2($a2) {
        $this->apellido2=$a2;
    }
    public function setEdad($e) {
        $this->edad=$e;
    }
    public function setTelefono($t) {
        $this->telefono=$t;
    }

    //GET
    public function getDni(){
        return $this->dni;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido1(){
        return $this->apellido1;
    }
    public function getApellido2(){
        return $this->apellido2;
    }
    public function getEdad(){
        return $this->edad;
    }
    public function getTelefono(){
        return $this->telefono;
    }
}

?>