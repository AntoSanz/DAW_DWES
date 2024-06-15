<?php

class Alumno
{
    private $Dni;
    private $Nombre;
    private $Apellido1;
    private $Apellido2;
    private $Edad;
    private $Telefono;

    public function __get($propiedad)
    {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor)
    {
        $this->$propiedad = $valor;
    }
}
