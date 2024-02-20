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
        curl_close($conexion);

        if ($res) {
            // Verificar si la respuesta contiene un mensaje de error
            $response = json_decode($res, true);
            if (isset($response['resultado']) && strpos($response['resultado'], 'ERROR') !== false) {
                return $response['resultado'];
            } else {
                return true;
            }
        }
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
        curl_close($conexion);

        if ($res) {
            // Verificar si la respuesta contiene un mensaje de error
            $response = json_decode($res, true);
            if (isset($response['mensaje']) && strpos($response['mensaje'], 'ERROR') !== false) {
                return $response['mensaje'];
            } else {
                return true;
            }
        }
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
        $res_dec = json_decode($res, true);
        if ($res_dec['resultado'] == true) {
            return true;
        } else {
            return false;
        }
        curl_close($conexion);
    }

    function request_detalle($identificador) {
        $urlmiservicio = "http://localhost/_servWeb/restfulApiVuelos/Pasajes.php?identificador=" . $identificador;
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
}
