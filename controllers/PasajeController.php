<?php

class PasajeController {

    private $service;
    private $view;

    public function __construct() {
        $this->service = new PasajeService();
        $this->view = new PasajeView();
    }

    public function mostrar() {
        // Decodificar el JSON devuelto por la API
        $pasajesAll = json_decode($this->service->request_curl(), true);

        // Asignar los datos de registros1 a la variable $pasajes
        $pasajes = [];
        foreach ($pasajesAll["registros1"] as $pasaje) {
            $pasajes[] = new Pasaje($pasaje['idpasaje'], $pasaje['nombre'], $pasaje['identificador'], $pasaje['numasiento'], $pasaje['clase'], $pasaje['pvp']);
        }

        // Pasar los objetos a la vista
        $this->view->mostrarPasajes($pasajes);
    }

    public function mostrarUnPasaje() {
        $id = $_POST['id'];

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

        // Pasar el objeto Pasaje a la vista
        $this->view->mostrarUnPasaje($pasajeOne);
    }

    public function borrarPasaje() {
        $id = $_GET['id'];

        $res = $this->service->request_delete($id);

        if ($res == true) {
            header('Location: ./index.php?controller=Pasaje&action=mostrar&delete=true');
        } else {
            header('Location: ./index.php?controller=Pasaje&action=mostrar&delete=false');
        }
    }

    public function mostrarInsertar() {

        $pasajesAll = json_decode($this->service->request_curl(), true);

        $selectPasajero = [];
        foreach ($pasajesAll["registros2"] as $pasaje) {
            $selectPasajero[] = new Pasaje($pasaje['nombre'], $pasaje['pasajerocod'], $pasaje['nombre'], $pasaje['nombre'], $pasaje['nombre'], $pasaje['nombre']);
        }

        $selectIdentificador = [];
        foreach ($pasajesAll["registros3"] as $pasaje) {
            $selectIdentificador[] = new Pasaje($pasaje['identificador'], $pasaje['aeropuertoorigen'], $pasaje['aeropuertodestino'], $pasaje['identificador'], $pasaje['identificador'], $pasaje['identificador']);
        }

        $this->view->mostrarInsertar($selectPasajero, $selectIdentificador);
    }

    public function insertarPasaje() {

        $pasajerocod = $_POST['pasajero'];
        $identificador = $_POST['identificador'];
        $numasiento = $_POST['numAsiento'];
        $clase = $_POST['clase'];
        $pvp = $_POST['pvp'];

        $resultado = $this->service->request_post($pasajerocod, $identificador, $numasiento, $clase, $pvp);

        // Construir la URL base
        $baseURL = "./index.php?controller=Pasaje&action=mostrar";

        // Verificar el resultado
        if ($resultado === true) {
            // Inserción exitosa
            header('Location: ' . $baseURL . '&check=true');
        } elseif (is_string($resultado)) {
            // Si el resultado es una cadena, significa que hubo un error personalizado
            header('Location: ' . $baseURL . '&check=false&error=' . urlencode($resultado));
        }
    }

    public function mostrarModificar() {

        $pasajesAll = json_decode($this->service->request_curl(), true);

        $selectPasajero = [];
        foreach ($pasajesAll["registros2"] as $pasaje) {
            $selectPasajero[] = new Pasaje($pasaje['nombre'], $pasaje['pasajerocod'], $pasaje['nombre'], $pasaje['nombre'], $pasaje['nombre'], $pasaje['nombre']);
        }

        $selectIdentificador = [];
        foreach ($pasajesAll["registros3"] as $pasaje) {
            $selectIdentificador[] = new Pasaje($pasaje['identificador'], $pasaje['aeropuertoorigen'], $pasaje['aeropuertodestino'], $pasaje['identificador'], $pasaje['identificador'], $pasaje['identificador']);
        }

        $idpasaje = $_POST['idpasaje'];
        $pasajerocod = $_POST['pasajerocod'];
        $identificador = $_POST['identificador'];
        $numasiento = $_POST['numasiento'];
        $clase = $_POST['clase'];
        $pvp = $_POST['pvp'];

        $this->view->mostrarModificar($idpasaje, $pasajerocod, $identificador, $numasiento, $clase, $pvp, $selectPasajero, $selectIdentificador);
    }

    public function modificarPasaje() {
        $id = $_GET['id'];
        $pasajerocod = $_POST['pasajero'];
        $identificador = $_POST['identificador'];
        $numasiento = $_POST['numAsiento'];
        $clase = $_POST['clase'];
        $pvp = $_POST['pvp'];

        // Llamada a la función request_put para actualizar un pasaje
        $resultado = $this->service->request_put($id, $pasajerocod, $identificador, $numasiento, $clase, $pvp);

        // Construir la URL base
        $baseURL = "./index.php?controller=Pasaje&action=mostrar";

        // Verificar el resultado
        if ($resultado === true) {
            // Actualización exitosa
            header('Location: ' . $baseURL . '&mody=true');
        } elseif (is_string($resultado)) {
            // Si el resultado es una cadena, significa que hubo un error personalizado
            header('Location: ' . $baseURL . '&mody=false&error=' . urlencode($resultado));
        }
    }

    public function mostrarDetallePasaje() {
        $identificador = $_POST['identificador'];

        $res = json_decode($this->service->request_detalle($identificador), true);

        if ($res == false) {
            $this->view->mostrarError($identificador);
        } else {
            $pasajes = [];
            foreach ($res["registros1"] as $pasaje) {
                $pasajes[] = new Pasaje($pasaje['idpasaje'], $pasaje['pasajerocod'], $pasaje['identificador'], $pasaje['numasiento'], $pasaje['clase'], $pasaje['pvp']);
            }

            $pasajeros = [];
            foreach ($res["registros2"] as $pasaje) {
                $pasajeros[] = new Pasajero($pasaje['pasajerocod'], $pasaje['nombre'], $pasaje['tlf'], $pasaje['direccion'], $pasaje['pais']);
            }
            $this->view->mostrarDetallePasaje($pasajes, $pasajeros);
        }
    }
}
