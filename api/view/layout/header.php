<?php

include_once "head.php";

?>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <span class="logo-span">COLD</span>MART
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" tabindex="-1" aria-labelledby="Toggle navigation" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link black" href="index.php">Home</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle black" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Cadastrar
                        </a>
                        <ul class="dropdown-menu bg-light">
                            <li>
                                <a class="dropdown-item black" href="../view/cad_cursos.php">
                                    Cursos
                                </a>
                            </li>
                            <?php
                            // if ($_SESSION['nome'] == 'admin') {
                            ?>
                            <li>
                                <a class="dropdown-item black" href="../view/cad_categoria.php">
                                    Categorias
                                </a>
                            </li>
                            <?php
                            // }
                            ?>

                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle black" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Perfil
                        </a>
                        <ul class="dropdown-menu bg-light">
                            <li><a class="dropdown-item black" href="#">Ver Perfil</a></li>
                            <li>
                                <a class="dropdown-item black" href="../controller/access/access_user.php?logout=1">
                                    Sair
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>


            </div>
        </div>
    </nav>
</body>