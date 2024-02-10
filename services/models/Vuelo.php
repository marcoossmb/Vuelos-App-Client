<?php

class Vuelo {

    private $identificador;
    private $aeropuertoorigen;
    private $aeropuertodestino;
    private $tipovuelo;
    private $fechavuelo;
    private $descuento;
    private $paramextra1;
    private $paramextra2;
    private $paramextra3;

    public function __construct($identificador, $aeropuertoorigen, $aeropuertodestino, $tipovuelo, $fechavuelo, $descuento, $paramextra1, $paramextra2, $paramextra3) {
        $this->identificador = $identificador;
        $this->aeropuertoorigen = $aeropuertoorigen;
        $this->aeropuertodestino = $aeropuertodestino;
        $this->tipovuelo = $tipovuelo;
        $this->fechavuelo = $fechavuelo;
        $this->descuento = $descuento;
        $this->paramextra1 = $paramextra1;
        $this->paramextra2 = $paramextra2;
        $this->paramextra3 = $paramextra3;
    }

    public function getIdentificador() {
        return $this->identificador;
    }

    public function getAeropuertoorigen() {
        return $this->aeropuertoorigen;
    }

    public function getAeropuertodestino() {
        return $this->aeropuertodestino;
    }

    public function getTipovuelo() {
        return $this->tipovuelo;
    }

    public function getFechavuelo() {
        return $this->fechavuelo;
    }

    public function getDescuento() {
        return $this->descuento;
    }

    public function getParamextra1() {
        return $this->paramextra1;
    }

    public function getParamextra2() {
        return $this->paramextra2;
    }

    public function getParamextra3() {
        return $this->paramextra3;
    }

    public function setIdentificador($identificador): void {
        $this->identificador = $identificador;
    }

    public function setAeropuertoorigen($aeropuertoorigen): void {
        $this->aeropuertoorigen = $aeropuertoorigen;
    }

    public function setAeropuertodestino($aeropuertodestino): void {
        $this->aeropuertodestino = $aeropuertodestino;
    }

    public function setTipovuelo($tipovuelo): void {
        $this->tipovuelo = $tipovuelo;
    }

    public function setFechavuelo($fechavuelo): void {
        $this->fechavuelo = $fechavuelo;
    }

    public function setDescuento($descuento): void {
        $this->descuento = $descuento;
    }

    public function setParamextra1($paramextra1): void {
        $this->paramextra1 = $paramextra1;
    }

    public function setParamextra2($paramextra2): void {
        $this->paramextra2 = $paramextra2;
    }

    public function setParamextra3($paramextra3): void {
        $this->paramextra3 = $paramextra3;
    }

    public function __destruct() {
        
    }
}
