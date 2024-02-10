<?php

class PasajeView {

    public function mostrarPasajes($pasajesAll) {
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
                    foreach ($pasajesAll as $pasaje) {
                        ?>
                        <tr>
                            <td><?php echo $pasaje->getIdpasaje(); ?></td>
                            <td><?php echo $pasaje->getPasajerocod(); ?></td>
                            <td><?php echo $pasaje->getIdentificador(); ?></td>
                            <td><?php echo $pasaje->getNumasiento(); ?></td>
                            <td><?php echo $pasaje->getClase(); ?></td>
                            <td><?php echo $pasaje->getPvp(); ?>€</td>
                            <td>
                                <a href="./index.php?controller=Pasaje&action=mostrarUnPasaje&id=<?php echo $pasaje->getIdpasaje(); ?>"><i class="fa-solid fa-eye bg-primary p-2 text-white rounded"></i></a>
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
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $pasajeOne->getIdpasaje(); ?></td>
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
                <a href="./index.php?controller=Pasaje&action=borrarPasaje&id=<?php echo $pasajeOne->getIdpasaje(); ?>"><i class="fa-solid fa-trash bg-danger p-2 text-white rounded me-2"></i></a>
                <a href="./index.php?controller=Pasaje&action=modificarPasaje&id=<?php echo $pasajeOne->getIdpasaje(); ?>"><i class="fa-solid fa-pencil bg-success p-2 text-white rounded"></i></a>
            </div>            
        </div>
        <?php
        // Fin del contenedor
    }
}
