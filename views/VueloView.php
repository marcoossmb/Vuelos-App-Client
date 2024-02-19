<?php

class VueloView {

    public function mostrarVuelos($vuelosAll) {
        include './lib/templates/header.php';
        ?>
        <div class="container bg-white rounded p-5 mt-3">
            <h1 class="text-center mt-3">Vuelos</h1>
            <!-- INICIO TABLA -->
            <table class="table mt-5">
                <thead>
                    <tr>
                        <th>Identificador</th>
                        <th>Aeropuerto Origen</th>
                        <th>Nombre Aeropuerto Origen</th>
                        <th>Pais Origen</th>
                        <th>Aeropuerto Destino</th>
                        <th>Nombre Aeropuerto Destino</th>
                        <th>Pais Destino</th>
                        <th>Tipo de Vuelo</th>
                        <th>Número pasajeros</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($vuelosAll as $vuelo) {
                        ?>
                        <tr>
                            <td><?php echo $vuelo->getIdentificador(); ?></td>
                            <td><?php echo $vuelo->getAeropuertoorigen(); ?></td>
                            <td><?php echo $vuelo->getAeropuertodestino(); ?></td>
                            <td><?php echo $vuelo->getTipovuelo(); ?></td>
                            <td><?php echo $vuelo->getFechavuelo(); ?></td>
                            <td><?php echo $vuelo->getDescuento(); ?></td>
                            <td><?php echo $vuelo->getParamextra1(); ?></td>
                            <td><?php echo $vuelo->getParamextra2(); ?></td>
                            <td><?php echo $vuelo->getParamextra3(); ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
            <!-- FIN TABLA -->
        </div>
        <?php
        // Fin del contenedor
    }

    public function mostrarIdentificadores($vuelosAll) {
        include './lib/templates/header.php';
        ?>
        <div class="container bg-white rounded p-5 mt-3">
            <h1 class="text-center mt-3">Identificadores de vuelos</h1>
            <div class="d-flex justify-content-center mt-5">
                <form action="./index.php?controller=Vuelo&action=detalleIdentif" method="POST">
                    <label class="form-label">Selecciona un Identificador:</label><br>
                    <select name="identificador">
                        <?php
                        foreach ($vuelosAll as $vuelo) {
                            ?>
                            <option value="<?php echo $vuelo->getIdentificador(); ?>"><?php echo $vuelo->getIdentificador(); ?></option>
                            <?php
                        }
                        ?>
                    </select><br>
                    <button type="submit" class="btn btn-secondary mt-3">Seleccionar</button> 
                </form>
            </div>
        </div>
        <?php
        // Fin del contenedor
    }

    public function detalleIdentif($ident) {
        include './lib/templates/header.php';
        ?>
        <div class="container bg-white rounded p-5 mt-3">
            <h1 class="text-center mt-3">Identificadores de vuelos</h1>
            <p class="text-center mt-5">Has seleccionado el pasaje: <strong><?php echo $ident ?></strong></p>
            <div class="d-flex justify-content-center">
                <form action="./index.php?controller=Vuelo&action=detalleVuel" method="POST" class="me-3">
                    <input type="hidden" name="identificador" value="<?php echo $ident ?>">
                    <button type="submit" class="btn btn-secondary mt-3">Detalle vuelo</button>
                </form>
                <form action="./index.php?controller=Vuelo&action=detalleIdentif" method="POST">
                    <input type="hidden" name="identificador" value="<?php echo $ident ?>">
                    <button type="submit" class="btn btn-secondary mt-3">Detalle pasaje</button>
                </form>
            </div>
            <a href="./index.php?controller=Vuelo&action=mostrarIdentificadores" class="btn btn-secondary mt-3">Volver</a>            
        </div>
        <?php
        // Fin del contenedor
    }

    public function detalleVuel($vueloOne) {
        include './lib/templates/header.php';
        ?>
        <div class="container bg-white rounded p-5 mt-3">
            <h1 class="text-center mt-3">Identificadores de vuelos</h1>
            <!-- INICIO TABLA -->
            <table class="table mt-5">
                <thead>
                    <tr>
                        <th>Identificador</th>
                        <th>Aeropuerto Origen</th>
                        <th>Nombre Aeropuerto Origen</th>
                        <th>Pais Origen</th>
                        <th>Aeropuerto Destino</th>
                        <th>Nombre Aeropuerto Destino</th>
                        <th>Pais Destino</th>
                        <th>Tipo de Vuelo</th>
                        <th>Número pasajeros</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $vueloOne->getIdentificador(); ?></td>
                        <td><?php echo $vueloOne->getAeropuertoorigen(); ?></td>
                        <td><?php echo $vueloOne->getAeropuertodestino(); ?></td>
                        <td><?php echo $vueloOne->getTipovuelo(); ?></td>
                        <td><?php echo $vueloOne->getFechavuelo(); ?></td>
                        <td><?php echo $vueloOne->getDescuento(); ?></td>
                        <td><?php echo $vueloOne->getParamextra1(); ?></td>
                        <td><?php echo $vueloOne->getParamextra2(); ?></td>
                        <td><?php echo $vueloOne->getParamextra3(); ?></td>
                    </tr>
                </tbody>
            </table>
            <!-- FIN TABLA -->
            <form action="./index.php?controller=Vuelo&action=detalleIdentif" method="POST">
                <input type="hidden" name="identificador" value="<?php echo $vueloOne->getIdentificador(); ?>">
                <button type="submit" class="btn btn-secondary mt-3">Volver</button>
            </form>
        </div>
        <?php
        // Fin del contenedor
    }
}
