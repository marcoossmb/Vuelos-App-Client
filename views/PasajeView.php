<?php

class PasajeView {

    public function mostrarPasajes($pasajes, $selectPasajero, $selectIdentificador) {
        ?>
        <!-- INICIO HEADER -->
        <header>
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-nav">
                <div class="container">
                    <img src="./assets/images/fondo.jpg" alt="Logo" draggable="false" height="30" />
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto align-items-center">
                            <li class="nav-item">
                                <a class="nav-link mx-2" href="./index.php?controller=Vuelo&action=mostrar"><i class="fa-solid fa-plane pe-2"></i>Vuelos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mx-2" href="./index.php?controller=Pasaje&action=mostrar"><i class="fa-solid fa-ticket pe-2"></i>Pasajes</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Navbar -->
        </header>
        <!-- FIN HEADER -->
        <div class="container bg-white rounded p-5 mt-3">
            <h1 class="text-center mt-3">Pasajes</h1>
            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Insertar Pasaje</a>
            <?php
            if (isset($_GET["check"])) {
                if ($_GET["check"] == 'true') {
                    ?>
                    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                        <strong>Pasaje insertado correctamente</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                        <strong>Error al insertar el pasaje. Por favor, inténtelo de nuevo más tarde.</strong>
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
                                <a href="./index.php?controller=Pasaje&action=mostrarUnPasaje&id=<?php echo $pasaje->getIdpasaje(); ?>"><i class="fa-solid fa-eye btn btn-primary p-2 text-white rounded"></i></a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
            <!-- FIN TABLA -->

            <!-- INICIO MODAL -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title" id="exampleModalLabel">Insertar Pasaje</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="row g-3" action="./index.php?controller=Pasaje&action=insertarPasaje" method="POST">
                                <div class="col-md-6">
                                    <label class="form-label">Selecciona Pasajero:</label><br>
                                    <select name="pasajero">
                                        <?php
                                        foreach ($selectPasajero as $pasaje) {
                                            ?>
                                            <option value="<?php echo $pasaje->getPasajerocod(); ?>"><?php echo $pasaje->getIdpasaje(); ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Selecciona Identificador:</label><br>
                                    <select name="identificador">
                                        <?php
                                        foreach ($selectIdentificador as $pasaje) {
                                            ?>
                                            <option value="<?php echo $pasaje->getIdentificador(); ?>"><?php echo $pasaje->getIdentificador(); ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Número de Asiento</label>
                                    <input type="number" class="form-control" id="numAsiento" name="numAsiento" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">PVP</label>
                                    <input type="number" class="form-control" id="pvp" name="pvp" required>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Marca la clase:</label><br>
                                    <div class="d-flex justify-content-evenly">
                                        <div>
                                            <input class="form-check-input" type="radio" name="clase" value="Turista" checked>
                                            <label class="form-check-label">TURISTA</label>
                                        </div>
                                        <div>
                                            <input class="form-check-input" type="radio" name="clase" value="Primera">
                                            <label class="form-check-label">PRIMERA</label>
                                        </div>
                                        <div>
                                            <input class="form-check-input" type="radio" name="clase" value="Business">
                                            <label class="form-check-label">BUSINESS</label>
                                        </div>                                        
                                    </div>
                                </div>
                                <div class="modal-footer col-12">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Insertar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FIN MODAL -->
        </div>
        <?php
        // Fin del contenedor
    }

    public function mostrarUnPasaje($pasajeOne) {
        ?>
        <!-- INICIO HEADER -->
        <header>
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-nav">
                <div class="container">
                    <img src="./assets/images/fondo.jpg" alt="Logo" draggable="false" height="30" />
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto align-items-center">
                            <li class="nav-item">
                                <a class="nav-link mx-2" href="./index.php?controller=Vuelo&action=mostrar"><i class="fa-solid fa-plane pe-2"></i>Vuelos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mx-2" href="./index.php?controller=Pasaje&action=mostrar"><i class="fa-solid fa-ticket pe-2"></i>Pasajes</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Navbar -->
        </header>
        <!-- FIN HEADER -->
        <div class="container bg-white rounded p-5 mt-3">
            <h1 class="text-center mt-3">Pasaje con Id <?php echo $pasajeOne->getIdpasaje(); ?></h1>
            <?php
            if (isset($_GET["check"])) {
                if ($_GET["check"] == 'true') {
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
                <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-trash btn btn-danger p-2 text-white rounded me-2 fs-3"></i></a>
                <a href="./index.php?controller=Pasaje&action=mostrarModificar&id=<?php echo $_GET['id'] ?>"><i class="fa-solid fa-pencil btn btn-success p-2 text-white rounded fs-3"></i></a>                
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

    public function mostrarModificar($selectPasajero, $selectIdentificador) {
        ?>
        <!-- INICIO HEADER -->
        <header>
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-nav">
                <div class="container">
                    <img src="./assets/images/fondo.jpg" alt="Logo" draggable="false" height="30" />
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto align-items-center">
                            <li class="nav-item">
                                <a class="nav-link mx-2" href="./index.php?controller=Vuelo&action=mostrar"><i class="fa-solid fa-plane pe-2"></i>Vuelos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mx-2" href="./index.php?controller=Pasaje&action=mostrar"><i class="fa-solid fa-ticket pe-2"></i>Pasajes</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Navbar -->
        </header>
        <!-- FIN HEADER -->
        <div class="container bg-white rounded p-5 mt-3">
            <h1 class="text-center mt-3">Modificar pasaje con Id <?php echo $_GET['id'] ?></h1>
            <form class="row g-3 mt-5" action="./index.php?controller=Pasaje&action=modificarPasaje&id=<?php echo $_GET['id'] ?>" method="POST">
                <div class="col-md-5">
                    <label class="form-label">Selecciona Pasajero:</label><br>
                    <select name="pasajero">
                        <?php
                        foreach ($selectPasajero as $pasaje) {
                            ?>
                            <option value="<?php echo $pasaje->getPasajerocod(); ?>"><?php echo $pasaje->getIdpasaje(); ?></option>
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
                            <option value="<?php echo $pasaje->getIdentificador(); ?>"><?php echo $pasaje->getIdentificador(); ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-5">
                    <label class="form-label">Número de Asiento</label>
                    <input type="number" class="form-control" id="numAsiento" name="numAsiento" required>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-5">
                    <label class="form-label">PVP</label>
                    <input type="number" class="form-control" id="pvp" name="pvp" required>
                </div>
                <div class="col-md-12">
                    <label class="form-label">Marca la clase:</label><br>
                    <div class="d-flex justify-content-evenly">
                        <div>
                            <input type="radio" name="clase" value="Turista" checked>
                            <label class="form-check-label">TURISTA</label>
                        </div>
                        <div>
                            <input type="radio" name="clase" value="Primera">
                            <label class="form-check-label">PRIMERA</label>
                        </div>
                        <div>
                            <input type="radio" name="clase" value="Business">
                            <label class="form-check-label">BUSINESS</label>
                        </div>                                        
                    </div>
                </div>
                <div class="modal-footer col-12 d-flex justify-content-center">
                    <a href="./index.php?controller=Pasaje&action=mostrarUnPasaje&id=<?php echo $_GET['id'] ?>" class="btn btn-secondary mt-3 me-3">Volver</a>
                    <button type="submit" class="btn btn-success mt-3">Modificar</button>                    
                </div>
            </form>
        </div>
        <?php
        // Fin del contenedor
    }
}