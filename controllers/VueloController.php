<?php

// Definición de la clase VueloController
class VueloController {

    // Declaración de propiedades privadas
    private $service;
    private $view;

    // Constructor de la clase
    public function __construct() {
        $this->service = new VueloService();
        $this->view = new VueloView();
    }

    /**
     * Método para mostrar todos los vuelos
     */
    public function mostrar() {
        // Obtener los vuelos del servicio y decodificar el JSON
        $vuelos = json_decode($this->service->request_curl(), true);

        $vuelosAll = [];

        // Iterar sobre cada vuelo obtenido y crear objetos Vuelo
        foreach ($vuelos as $vuelo) {
            $vuelosAll[] = new Vuelo($vuelo['identificador'], $vuelo['aeroorigen'], $vuelo['aeronameorigen'],
                    $vuelo['paisorigen'], $vuelo['aerodestino'], $vuelo['aeronamedestino'],
                    $vuelo['paisdestino'], $vuelo['tipovuelo'], $vuelo['idpasaje']);
        }

        $this->view->mostrarVuelos($vuelosAll);
    }

    /**
     * Método para mostrar los identificadores de vuelos
     */
    public function mostrarIdentificadores() {
        // Obtener los vuelos del servicio y decodificar el JSON
        $vuelos = json_decode($this->service->request_curl(), true);

        $vuelosAll = [];

        // Iterar sobre cada vuelo obtenido y crear objetos Vuelo
        foreach ($vuelos as $vuelo) {
            $vuelosAll[] = new Vuelo($vuelo['identificador'], $vuelo['aeroorigen'], $vuelo['aeronameorigen'],
                    $vuelo['paisorigen'], $vuelo['aerodestino'], $vuelo['aeronamedestino'],
                    $vuelo['paisdestino'], $vuelo['tipovuelo'], $vuelo['idpasaje']);
        }

        $this->view->mostrarIdentificadores($vuelosAll);
    }

    /**
     * Método para mostrar el detalle de un identificador de vuelo
     */
    public function detalleIdentif() {
        $ident = $_POST['identificador'];

        $this->view->detalleIdentif($ident);
    }

    /**
     * Método para mostrar el detalle de un vuelo específico
     */
    public function detalleVuel() {
        $ident = $_POST['identificador'];

        // Obtener el vuelo específico del servicio
        $vuelo = $this->service->request_uno($ident);

        // Crear objeto Vuelo con los datos obtenidos
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
