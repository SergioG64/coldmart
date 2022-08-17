<?php

session_start();

include "layout/header.php";

?>

<head>
    <title>Cursos</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <span id="msg"></span>
                <div class="form-control">
                    <form action="#" method="POST" id="form-crud-curso">
                        <!-- <h5 class="text-center">Cadastrar Cursos</h5> -->
                        <div class="row">
                            <div class="position-relative">
                                <div class="position-absolute top-0 start-50 translate-middle">
                                    <h5 class="mt-5">
                                        Cadastrar Cursos
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 mt-3">
                                <div class="form-floating">
                                    <input type="text" autocomplete="off" class="form-control" id="txtTit" name="txtTit" placeholder="Título">
                                    <label for="txtTit">Título</label>
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-5 col-md-8 col-sm-8 col-xs-8 mt-3">
                                <div class="form-floating">
                                    <input type="text" autocomplete="off" class="form-control" id="txtSubt" name="txtSubt" placeholder="Subtitulo">
                                    <label for="txtSubt">Subtítulo</label>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12 mt-3">
                                <div class="form-floating">
                                    <select name="selCat" id="selCat" class="form-select">
                                        <option selected disabled value="">Escolha uma categoria</option>
                                        <?php
                                        include_once $_SERVER['DOCUMENT_ROOT'] . "/faculdade/Aula-PHP-HTML-CSS-Faculdade/PI/controller/category/cad_cat.php";
                                        while ($li = $result->fetch()) {
                                            echo "<option value='" . $li['id_categoria'] . "'>";
                                            echo    $li['nome_categoria'];
                                            echo "</option>";
                                        }
                                        ?>
                                    </select>
                                    <label for="selCat">Categoria</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3 mb-2">
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea autocomplete="off" class="form-control" id="areaDesc" name="areaDesc" placeholder="descrição" style="height: 100px"></textarea>
                                    <label for="areaDesc">Descrição</label>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-end">
                            <div class="col-md-2 col-sm-3 col-xs-6 col-6">
                                <button type="reset" class="btn btn-secondary w-100">Limpar</button>
                            </div>
                            <div class="col-md-2 col-sm-3 col-xs-6 col-6">
                                <button class="btn btn-success w-100">Cadastrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/crud_curso.js"></script>
</body>