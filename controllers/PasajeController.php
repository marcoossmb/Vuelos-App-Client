<?php

class PasajeController {

    private $service;
    private $view;

    public function __construct() {
        $this->service = new PasajeService();
        $this->view = new PasajeView();
    }

    public function mostrar() {

        $pasajes = json_decode($this->service->request_curl(), true);

        $pasajesAll = [];

        foreach ($pasajes as $pasaje) {
            $pasajesAll[] = new Pasaje($pasaje['idpasaje'], $pasaje['pasajerocod'], $pasaje['identificador'], $pasaje['numasiento'], $pasaje['clase'], $pasaje['pvp']);
        }

        $this->view->mostrarPasajes($pasajesAll);
    }

    public function mostrarUnPasaje() {
        $id = $_GET['id'];

        $objeto_res = $this->service->request_uno($id);

        // Crear un nuevo objeto Pasaje con los valores adecuados
        $pasajeOne = new Pasaje(
                $objeto_res->idpasaje,
                $objeto_res->pasajerocod,
                $objeto_res->identificador,
                $objeto_res->numasiento,
                $objeto_res->clase,
                $objeto_res->pvp
        );

        // Ahora puedes utilizar $pasajeOne según sea necesario
        $this->view->mostrarUnPasaje($pasajeOne);
    }
    
        public function borrarPasaje() {
        $id = $_GET['id'];

        $this->service->request_delete($id);

        header('Location: ./index.php?controller=Pasaje&action=mostrar');
    }
}
