<?php

class PasajeView {

    public function mostrarPasajes($pasajes) {
        include './lib/templates/header.php';
        ?>

        <div class="container bg-white rounded p-5 mt-3">
            <h1 class="text-center mt-3">Pasajes</h1>
            <a href="./index.php?controller=Pasaje&action=mostrarInsertar" class="btn btn-primary">Insertar Pasaje</a>
            <?php
            if (isset($_GET["check"])) {
                if ($_GET["check"] == 'true') {
                    ?>
                    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                        <strong>PASAJE INSERTADO CORRECTAMENTE</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                } else {
                    $error_message;
                    if (isset($_GET["error"])) {
                        $error_message = urldecode($_GET["error"]);
                    }
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                        <strong><?php echo $error_message; ?></strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                }
            }
            if (isset($_GET["delete"])) {
                if ($_GET["delete"] == 'true') {
                    ?>
                    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                        <strong>PASAJE BORRADO CORRECTAMENTE</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                        <strong>ERROR AL BORRAR, EL PASAJE NO EXISTE</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                }
            }
            if (isset($_GET["mody"])) {
                if ($_GET["mody"] == 'true') {
                    ?>
                    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                        <strong>PASAJE MODIFICADO CORRECTAMENTE</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                } else {
                    $error_message;
                    if (isset($_GET["error"])) {
                        $error_message = urldecode($_GET["error"]);
                    }
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                        <strong><?php echo $error_message; ?></strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                }
            }
            ?>
            <!-- INICIO TABLA -->
            <table class="table mt-5">
                <thead>
                    <tr>
                        <th>Id Pasaje</th>
                        <th>Código Pasajero</th>
                        <th>Identificador</th>
                        <th>Numero de asiento</th>
                        <th>Clase</th>
                        <th>Pvp</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($pasajes as $pasaje) {
                        ?>
                        <tr>
                            <td><?php echo $pasaje->getIdpasaje(); ?></td>
                            <td><?php echo $pasaje->getPasajerocod(); ?></td>
                            <td><?php echo $pasaje->getIdentificador(); ?></td>
                            <td><?php echo $pasaje->getNumasiento(); ?></td>
                            <td><?php echo $pasaje->getClase(); ?></td>
                            <td><?php echo $pasaje->getPvp(); ?>€</td>
                            <td>
                                <form action="./index.php?controller=Pasaje&action=mostrarUnPasaje" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $pasaje->getIdpasaje(); ?>">
                                    <button class="border-0 bg-transparent" type="submit"><i class="fa-solid fa-eye btn btn-primary p-2 text-white rounded"></i></button>
                                </form>
                            </td>
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

    public function mostrarUnPasaje($pasajeOne) {
        include './lib/templates/header.php';
        ?>
        <div class="container bg-white rounded p-5 mt-3">
            <h1 class="text-center mt-3">Pasaje con Id <?php echo $pasajeOne->getIdpasaje(); ?></h1>            
            <!-- INICIO TABLA -->
            <table class="table mt-5">
                <thead>
                    <tr>
                        <th>Código Pasajero</th>
                        <th>Identificador</th>
                        <th>Numero de asiento</th>
                        <th>Clase</th>
                        <th>Pvp</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $pasajeOne->getPasajerocod(); ?></td>
                        <td><?php echo $pasajeOne->getIdentificador(); ?></td>
                        <td><?php echo $pasajeOne->getNumasiento(); ?></td>
                        <td><?php echo $pasajeOne->getClase(); ?></td>
                        <td><?php echo $pasajeOne->getPvp(); ?>€</td>
                    </tr>
                </tbody>
            </table>
            <!-- FIN TABLA -->   
            <div class="d-flex justify-content-center">
                <a href="./index.php?controller=Pasaje&action=mostrar"><i class="fa-solid fa-arrow-left btn btn-secondary p-2 text-white rounded fs-3 me-2"></i></a>
                <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-trash btn btn-danger p-2 text-white rounded fs-3 me-n"></i></a>

                <form action="./index.php?controller=Pasaje&action=mostrarModificar" method="POST">
                    <input type="hidden" name="idpasaje" value="<?php echo $pasajeOne->getIdpasaje(); ?>">
                    <input type="hidden" name="pasajerocod" value="<?php echo $pasajeOne->getPasajerocod(); ?>">
                    <input type="hidden" name="identificador" value="<?php echo $pasajeOne->getIdentificador(); ?>">
                    <input type="hidden" name="numasiento" value="<?php echo $pasajeOne->getNumasiento(); ?>">
                    <input type="hidden" name="clase" value="<?php echo $pasajeOne->getClase(); ?>">
                    <input type="hidden" name="pvp" value="<?php echo $pasajeOne->getPvp(); ?>">

                    <button class="border-0 bg-transparent" type="submit"><i class="fa-solid fa-pencil btn btn-success p-2 text-white rounded fs-3"></i></button>
                </form>                                
            </div>

            <!-- INICIO MODAL -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title" id="exampleModalLabel">Eliminar Pasaje</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>¿Estás seguro de que quieres eliminar el siguiente pasaje?<br></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <a href="./index.php?controller=Pasaje&action=borrarPasaje&id=<?php echo $pasajeOne->getIdpasaje(); ?>" class="btn btn-danger">Eliminar</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FIN MODAL -->
        </div>
        <?php
        // Fin del contenedor
    }

    public function mostrarModificar($idpasaje, $pasajerocod, $identificador, $numasiento, $clase, $pvp, $selectPasajero, $selectIdentificador) {
        include './lib/templates/header.php';
        ?>
        <div class="container bg-white rounded p-5 mt-3">
            <h1 class="text-center mt-3">Modificar pasaje con Id <?php echo $idpasaje ?></h1>
            <div>
                <div class="d-flex justify-content-center">
                    <form class="row g-3 mt-3 w-75 border border-secondary rounded p-3" action="./index.php?controller=Pasaje&action=modificarPasaje&id=<?php echo $idpasaje ?>" method="POST">
                        <div class="col-md-5">
                            <label class="form-label">Selecciona Pasajero:</label><br>
                            <select name="pasajero">
                                <?php
                                foreach ($selectPasajero as $pasaje) {
                                    $selected = "";
                                    if ($pasaje->getPasajerocod() == $pasajerocod) {
                                        $selected = "selected";
                                    }
                                    ?>
                                    <option value="<?php echo $pasaje->getPasajerocod(); ?>" <?php echo $selected; ?>>
                                        <?php echo $pasaje->getPasajerocod(); ?> - <?php echo $pasaje->getIdpasaje(); ?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>

                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-5">
                            <label class="form-label">Selecciona Identificador:</label><br>
                            <select name="identificador">
                                <?php
                                foreach ($selectIdentificador as $pasaje) {
                                    $selected2 = "";
                                    if ($pasaje->getIdpasaje() == $identificador) {
                                        $selected2 = "selected";
                                    }
                                    ?>
                                    <option value="<?php echo $pasaje->getIdpasaje(); ?>" <?php echo $selected2; ?>>
                                        <?php echo $pasaje->getIdpasaje(); ?> - <?php echo $pasaje->getPasajerocod(); ?> - <?php echo $pasaje->getIdentificador(); ?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>

                        </div>
                        <div class="col-md-5">
                            <label class="form-label">Número de Asiento</label>
                            <input type="number" class="form-control" id="numAsiento" name="numAsiento" required min="1" max="200" value=<?php echo $numasiento ?>>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-5">
                            <label class="form-label">PVP</label>
                            <input type="number" class="form-control" id="pvp" name="pvp" required min="1" value=<?php echo $pvp ?>>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Marca la clase:</label><br>
                            <div class="d-flex justify-content-evenly">
                                <div>
                                    <input type="radio" name="clase" value="TURISTA" <?php if ($clase === 'TURISTA') echo 'checked'; ?>>
                                    <label class="form-check-label">TURISTA</label>
                                </div>
                                <div>
                                    <input type="radio" name="clase" value="PRIMERA" <?php if ($clase === 'PRIMERA') echo 'checked'; ?>>
                                    <label class="form-check-label">PRIMERA</label>
                                </div>
                                <div>
                                    <input type="radio" name="clase" value="BUSINESS" <?php if ($clase === 'BUSINESS') echo 'checked'; ?>>
                                    <label class="form-check-label">BUSINESS</label>
                                </div>                                        
                            </div>
                        </div>
                        <div class="modal-footer col-12 d-flex justify-content-center">
                            <button type="submit" class="btn btn-success mt-3">Modificar</button>
                        </div>
                    </form>
                </div>

                <form action="./index.php?controller=Pasaje&action=mostrarUnPasaje" method="POST">
                    <input type="hidden" name="id" value="<?php echo $idpasaje ?>">

                    <button type="submit" class="btn btn-secondary mt-3 me-3">Volver</button>
                </form>
            </div>            
        </div>
        <?php
        // Fin del contenedor
    }

    public function mostrarInsertar($selectPasajero, $selectIdentificador) {
        include './lib/templates/header.php';
        ?>
        <div class="container bg-white rounded p-5 mt-3">
            <h1 class="text-center mt-3">Insertar Pasaje</h1>
            <div class="d-flex justify-content-center">
                <form class="row g-3 mt-3 w-75 border border-secondary rounded p-3" action="./index.php?controller=Pasaje&action=insertarPasaje" method="POST">
                    <div class="col-md-5">
                        <label class="form-label">Selecciona Pasajero:</label><br>
                        <select name="pasajero">
                            <?php
                            foreach ($selectPasajero as $pasaje) {
                                ?>
                                <option value="<?php echo $pasaje->getPasajerocod(); ?>"><?php echo $pasaje->getPasajerocod(); ?> - <?php echo $pasaje->getIdpasaje(); ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-5">
                        <label class="form-label">Selecciona Identificador:</label><br>
                        <select name="identificador">
                            <?php
                            foreach ($selectIdentificador as $pasaje) {
                                ?>
                                <option value="<?php echo $pasaje->getIdpasaje(); ?>"><?php echo $pasaje->getIdpasaje(); ?> - <?php echo $pasaje->getPasajerocod(); ?> - <?php echo $pasaje->getIdentificador(); ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-5">
                        <label class="form-label">Número de Asiento</label>
                        <input type="number" class="form-control" id="numAsiento" name="numAsiento" required min="1" max="200">
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-5">
                        <label class="form-label">PVP</label>
                        <input type="number" class="form-control" id="pvp" name="pvp" required min="1">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Marca la clase:</label><br>
                        <div class="d-flex justify-content-evenly">
                            <div>
                                <input type="radio" name="clase" value="TURISTA" checked>
                                <label class="form-check-label">TURISTA</label>
                            </div>
                            <div>
                                <input type="radio" name="clase" value="PRIMERA">
                                <label class="form-check-label">PRIMERA</label>
                            </div>
                            <div>
                                <input type="radio" name="clase" value="BUSINESS">
                                <label class="form-check-label">BUSINESS</label>
                            </div>                                        
                        </div>
                    </div>
                    <div class="modal-footer col-12 d-flex justify-content-center">
                        <a href="./index.php?controller=Pasaje&action=mostrar" class="btn btn-secondary mt-3 me-3">Volver</a>
                        <button type="submit" class="btn btn-primary mt-3">Insertar</button>                    
                    </div>
                </form>
            </div>
        </div>
        <?php
        // Fin del contenedor
    }

    public function mostrarDetallePasaje($pasajes, $pasajeros) {
        include './lib/templates/header.php';
        ?>
        <div class="container bg-white rounded p-5 mt-3">
            <h1 class="text-center mt-3">Detalle Pasajes</h1>
            <!-- INICIO TABLA -->
            <table class="table mt-5">
                <thead>
                    <tr>
                        <th>Id de pasaje</th>
                        <th>Código pasajero</th>
                        <th>Nombre pasajero</th>
                        <th>País pasajero</th>                        
                        <th>Número de asiento</th>
                        <th>Clase</th>
                        <th>Pvp</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = count($pasajes);

                    for ($i = 0; $i < $count; $i++) {
                        $pasaje = $pasajes[$i];
                        $pasajero = $pasajeros[$i];

                        $identificador = $pasaje->getIdentificador();
                        ?>
                        <tr>
                            <td><?php echo $pasaje->getIdpasaje(); ?></td>
                            <td><?php echo $pasaje->getPasajerocod(); ?></td>
                            <td><?php echo $pasajero->getNombre(); ?></td>
                            <td><?php echo $pasajero->getPais(); ?></td>
                            <td><?php echo $pasaje->getNumasiento(); ?></td>
                            <td><?php echo $pasaje->getClase(); ?></td>
                            <td><?php echo $pasaje->getPvp(); ?>€</td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
            <!-- FIN TABLA -->
            <form action="./index.php?controller=Vuelo&action=detalleIdentif" method="POST">
                <input type="hidden" name="identificador" value="<?php echo $identificador ?>">
                <button type="submit" class="btn btn-secondary mt-3">Volver</button>
            </form>
        </div>
        <?php
        // Fin del contenedor
    }

    public function mostrarError($identificador) {
        include './lib/templates/header.php';
        ?>
        <div class="container bg-white rounded p-5 mt-5">
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                <strong>NO EXISTEN PASAJES PARA ESTE VUELO</strong>
            </div>
            <form action="./index.php?controller=Vuelo&action=detalleIdentif" method="POST">
                <input type="hidden" name="identificador" value="<?php echo $identificador ?>">
                <button type="submit" class="btn btn-secondary mt-3">Volver</button>
            </form>
        </div>
        <?php
    }
}
