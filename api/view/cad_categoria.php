<?php

session_start();

include "layout/header.php";

$error = isset($_GET['error']) ? $_GET['error'] : null;
$success = isset($_GET['success']) ? $_GET['success'] : null;
$null = isset($_GET['null']) ? $_GET['null'] : null;
$nome_cat = isset($_POST['nome_categoria']) ? $_POST['nome_categoria'] : null;
$id_cat = isset($_POST['id_categoria']) ? $_POST['id_categoria'] : null;
$sucesso = false;
$erro = false;


if (!empty($error) && $error <= '2') {
    $class = 'alert-danger';
    $erro = true;
} elseif (!empty($success) && $success <= '3') {
    $class = 'alert-success';
    $sucesso = true;
}

if (empty($nome_cat)) {
    $titulo = "Cadastrar Categorias";
    $botao = "Cadastrar";
    $value = "cad";
} else {
    $titulo = "Editar Categoria";
    $botao = "Editar";
    $value = "edit";
}

?>

<head>
    <title>Categorias</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <?php
            if ($erro || $sucesso) {
                if (!isset($null)) {
            ?>
                    <div class="col-12">
                        <div class="alert <?= $class ?> alert-dismissible fade show" role="alert">
                            <?php
                            switch ($error) {
                                case '1':
                                    echo "Preencha todos os campos para continuar.";
                                    break;

                                case '2':
                                    echo "Erro no banco de dados. Contate um administrador ou tente novamente mais tarde";
                                    break;
                            }

                            switch ($success) {
                                case '1':
                                    echo "Cadastro realizado com sucesso!";
                                    break;

                                case '2':
                                    echo "Categoria excluída com sucesso!";
                                    break;

                                case '3':
                                    echo "Categoria editada com sucesso!";
                                    break;
                            }
                            ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
        <div class="row d-flex justify-content-center mb-3">
            <div class="col-12">
                <div class="form-control" id="formCrud">
                    <form action="../controller/category/cad_cat.php" method="POST" class="needs-validation" novalidate>
                        <div class="row">
                            <div class="position-relative">
                                <div class="position-absolute top-0 start-50 translate-middle">
                                    <h5 class="mt-5">
                                        <?= $titulo ?>
                                    </h5>
                                </div>
                                <!-- <div class="position-absolute top-0 end-0">
                                    <span class="btn-close p-3" id="closeCrud"></span>
                                </div> -->
                            </div>
                        </div>

                        <div class="row mt-5">
                            <input type="hidden" value="<?= $value ?>" name="type">
                            <input type="hidden" value="<?= $id_cat ?>" name="id_categoria">
                            <!-- <div class="input-group has-validation"> -->
                            <div class="col-12">
                                <label for="txtCat">
                                    Nome:<span style="color:red">*</span>
                                </label>
                                <input type="text" placeholder="Nome da categoria" autocomplete="off" class="form-control" id="txtCat" name="txtCat" value="<?= $nome_cat ?>" required>
                                <div class="invalid-feedback">
                                    Campo obrigatório
                                </div>
                                <!-- </div> -->
                            </div>
                        </div>
                        <div class="row d-flex justify-content-end">
                            <div class="col-3 d-flex justify-content-end mt-2">
                                <button type="submit" class="btn btn-success">
                                    <?= $botao ?>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- <div class="row d-flex justify-content-end mb-3">
            <div class="col-md-3 col-sm-4 col-5 d-flex justify-content-end">
                <button class="btn btn-success w-100 mb-2" id="btnCadastro">
                    <i class="bi bi-plus-circle"></i> Mostrar Formulário
                </button>
            </div>
        </div> -->
        <div class="row d-flex justify-content-center">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" id="table_category">
                        <thead>
                            <tr class="bg-primary white">
                                <th>Nome da Categoria</th>
                                <th>Data/Hora da Inclusão</th>
                                <th>Nome do Usuário</th>
                                <th colspan="2" class="text-center">
                                    Ações
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include_once $_SERVER['DOCUMENT_ROOT'] . "/faculdade/Aula-PHP-HTML-CSS-Faculdade/PI/controller/category/cad_cat.php";
                            while ($li = $result->fetch()) {
                                echo "<tr>";
                                // echo "  <input type='hidden' value='" . $li['nome_categoria'] . "' name='id_categoria'>";
                                echo "  <td>" . $li['nome_categoria'] . "</td>";
                                echo "  <td>" . $li['data_hora_categoria'] . "</td>";
                                echo "  <td>" . $li['nome_usuario'] . "</td>";
                                echo "  <form action='../controller/category/cad_cat.php' method='POST'>";
                                echo "      <td class='text-center'>
                                            <input type='hidden' value='" . $li['id_categoria'] . "' name='id_categoria'>
                                            <input type='hidden' value='del' name='type'>
                                            <button class='btn btn-danger'>
                                                <i class='bi bi-trash-fill'></i>
                                            </button>
                                        </td>";
                                echo "  </form>";
                                echo "  <form action='#' method='POST'>";
                                echo "      <td class='text-center'>
                                            <input type='hidden' value='" . $li['id_categoria'] . "' name='id_categoria'>
                                            <input type='hidden' value='" . $li['nome_categoria'] . "' name='nome_categoria'>
                                            <button class='btn btn-primary' id='btnEdit'>
                                                <i class='bi bi-pencil-fill'></i>
                                            </button>
                                        </td>";
                                echo "  </form>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        (() => {
            'use strict'

            const forms = document.querySelectorAll('.needs-validation')

            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
</body>