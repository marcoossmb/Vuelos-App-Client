<?php

class VueloController {

    private $service;
    private $view;

    public function __construct() {
        $this->service = new VueloService();
        $this->view = new VueloView();
    }

    public function mostrar() {

        $vuelos = json_decode($this->service->request_curl(), true);

        $vuelosAll = [];

        foreach ($vuelos as $vuelo) {
            $vuelosAll[] = new Vuelo($vuelo['identificador'], $vuelo['aeroorigen'], $vuelo['aeronameorigen'],
                    $vuelo['paisorigen'], $vuelo['aerodestino'], $vuelo['aeronamedestino'],
                    $vuelo['paisdestino'], $vuelo['tipovuelo'], $vuelo['idpasaje']);
        }

        $this->view->mostrarVuelos($vuelosAll);
    }

    public function mostrarIdentificadores() {
        $vuelos = json_decode($this->service->request_curl(), true);

        $vuelosAll = [];

        foreach ($vuelos as $vuelo) {
            $vuelosAll[] = new Vuelo($vuelo['identificador'], $vuelo['aeroorigen'], $vuelo['aeronameorigen'],
                    $vuelo['paisorigen'], $vuelo['aerodestino'], $vuelo['aeronamedestino'],
                    $vuelo['paisdestino'], $vuelo['tipovuelo'], $vuelo['idpasaje']);
        }

        $this->view->mostrarIdentificadores($vuelosAll);
    }

    public function detalleIdentif() {

        $ident = $_POST['identificador'];

        $this->view->detalleIdentif($ident);
    }

    public function detalleVuel() {

        $ident = $_POST['identificador'];

        $vuelo = $this->service->request_uno($ident);

        $vueloOne = new Vuelo(
                $vuelo->identificador,
                $vuelo->aeroorigen,
                $vuelo->aeronameorigen,
                $vuelo->paisorigen,
                $vuelo->aerodestino,
                $vuelo->aeronamedestino,
                $vuelo->paisdestino,
                $vuelo->tipovuelo,
                $vuelo->idpasaje
        );

        $this->view->detalleVuel($vueloOne);
    }
}
