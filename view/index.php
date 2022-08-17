<?php

if (!isset($_SESSION)) {
    session_start();
}

include_once "layout/header.php";

if (!$_SESSION['logado']) {
    header("location:../view/login.php?error=4");
    die();
}

?>

<head>
    <title>Bem-vindo a Coldmart</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="row row-cols-1 row-cols-xs-1 row-cols-sm-2 row-cols-md-4 row-cols-lg-5 row-cols-xl-5 row-cols-xxl-6 g-4">
                <!-- <h4>Melhores cursos</h4> -->
                <?php

                include_once "../class/Course.php";

                $course = new Course();
                $result = $course->listCourse();

                while ($li = $result->fetch()) {
                ?>
                    <div class="col">
                        <div class="card">
                            <img src="../img/Image_not_available.png" class="card-img-top" alt="...">

                            <div class="card-body">
                                <h3 class="card-title text-truncate"><?= $li['nome_curso'] ?></h3>
                                <span class="card-title text-truncate" style="font-size:13px">
                                    <b><?= $li['nome_categoria'] ?></b>
                                </span>
                                <p class="card-text text-truncate" style="font-size:12px">
                                    <?= $li['descricao_curso'] ?>
                                </p>
                            </div>
                            <div class="card-footer d-flex justify-content-end bg-transparent" style="border-top:none">
                                <small class="text-muted" style="font-size:10px">
                                    <?= $li['nome_usuario'] ?>
                                </small>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>

            </div>
        </div>
    </div>
</body>