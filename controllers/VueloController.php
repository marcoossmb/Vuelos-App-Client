<?php

class VueloController {

    private $service;
    private $view;

    public function __construct() {
        $this->service = new VueloService();
        $this->view = new VueloView();
    }

    // Muestra el login
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
}