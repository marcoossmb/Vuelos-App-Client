<?php

class PasajeService {

        //GET
    function request_curl() {
        $urlmiservicio = "http://localhost/_servWeb/restfulApiVuelos/Pasajes.php";
        $conexion = curl_init();
        //Url de la petición
        curl_setopt($conexion, CURLOPT_URL, $urlmiservicio);
        //Tipo de petición
        curl_setopt($conexion, CURLOPT_HTTPGET, TRUE);
        //Tipo de contenido de la respuesta
        curl_setopt($conexion, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        //para recibir una respuesta
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);

        $res = curl_exec($conexion);
        if ($res) {
            return($res);
        } else {
            return false;
        }
        curl_close($conexion);
    }

    //GET con un pasaje
    function request_uno($id) {
        $urlmiservicio = "http://localhost/_servWeb/restfulApiVuelos/Pasajes.php?id=" . $id;
        $conexion = curl_init();
        //Url de la petición
        curl_setopt($conexion, CURLOPT_URL, $urlmiservicio);
        //Tipo de petición
        curl_setopt($conexion, CURLOPT_HTTPGET, TRUE);
        //Tipo de contenido
        curl_setopt($conexion, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        //para recibir una respuesta
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);

        $res = curl_exec($conexion);
        if ($res) {
            $objeto_res = json_decode($res);
            return($objeto_res);
        } else {
            return false;
        }
        curl_close($conexion);
    }
    
    //POST Van datos, se pone el Content-Length del envío
    function request_post($pasajerocod, $identificador, $numasiento, $clase, $pvp) {
        $envio = json_encode(array("pasajerocod" => $pasajerocod, "identificador" => $identificador, "numasiento" => $numasiento, "clase" => $clase, "pvp" => $pvp));
        $urlmiservicio = "http://localhost/_servWeb/restfulApiVuelos/Pasajes.php";
        $conexion = curl_init();
        curl_setopt($conexion, CURLOPT_URL, $urlmiservicio);
        //Cabecera, tipo de datos y longitud de envío
        curl_setopt($conexion, CURLOPT_HTTPHEADER,
                array('Content-type: application/json', 'Content-Length: ' . mb_strlen($envio)));
        //Tipo de petición
        curl_setopt($conexion, CURLOPT_POST, TRUE);
        //Campos que van en el envío
        curl_setopt($conexion, CURLOPT_POSTFIELDS, $envio);
        //para recibir una respuesta
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);

        $res = curl_exec($conexion);
        if ($res) {
            echo "<br>Salida request_post<br>";
            print_r($res);
        }
        curl_close($conexion);
    }

    //PUT  para modificar
    function request_put($id, $pasajerocod, $identificador, $numasiento, $clase, $pvp) {
        $envio = json_encode(array("pasajerocod" => $pasajerocod, "identificador" => $identificador, "numasiento" => $numasiento, "clase" => $clase, "pvp" => $pvp));
        $urlmiservicio = "http://localhost/_servWeb/restfulApiVuelos/Pasajes.php?id=" . $id;
        $conexion = curl_init();
        curl_setopt($conexion, CURLOPT_URL, $urlmiservicio);
        //Cabecera, tipo de datos y longitud de envío
        curl_setopt($conexion, CURLOPT_HTTPHEADER,
                array('Content-type: application/json', 'Content-Length: ' . mb_strlen($envio)));
        //Tipo de petición
        curl_setopt($conexion, CURLOPT_CUSTOMREQUEST, 'PUT');
        //Campos que van en el envío
        curl_setopt($conexion, CURLOPT_POSTFIELDS, $envio);
        //para recibir una respuesta
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);

        $res = curl_exec($conexion);
        if ($res) {
            echo "<br>Salida request_put<br>";
            print_r($res);
        }
        curl_close($conexion);
    }

    //DELETE para borrar
    function request_delete($id) {
        $urlmiservicio = "http://localhost/_servWeb/restfulApiVuelos/Pasajes.php?id=" . $id;
        $conexion = curl_init();
        curl_setopt($conexion, CURLOPT_URL, $urlmiservicio);
        //Cabecera, tipo de datos y longitud de envío
        curl_setopt($conexion, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        //Tipo de petición
        curl_setopt($conexion, CURLOPT_CUSTOMREQUEST, 'DELETE');
        //Campos que van en el envío
        //curl_setopt($conexion, CURLOPT_POSTFIELDS, $envio);
        //para recibir una respuesta
        curl_setopt($conexion, CURLOPT_RETURNTRANSFER, true);

        $res = curl_exec($conexion);
        if ($res) {
            echo "<br>Salida request_delete<br>";
            print_r($res);
        }
        curl_close($conexion);
    }
}
