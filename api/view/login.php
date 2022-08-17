<?php

include_once "layout/head.php";

$error = isset($_GET['error']) ? $_GET['error'] : null;
$success = isset($_GET['success']) ? $_GET['success'] : null;
$sucesso = false;
$erro = false;

if (!empty($error) && $error <= '4') {
    $class = 'alert-danger';
    $erro = true;
} elseif (!empty($success) && $success <= '1') {
    $class = 'alert-success';
    $sucesso = true;
}



?>

<head>
    <title>Login Coldmart</title>
</head>


<body class="overflow">
    <div class="row">
        <div class="col-xl-3 col-lg-4 col-md-5 col-sm-6 col-xs-7">
            <div class="d-flex align-items-center background-color-white-login">
                <div class="container">
                    <div class="row">
                        <span class="logo-login text-center">
                            <span style="color:blue">COLD</span>MART
                        </span>
                    </div>
                    <div class="row form-login">
                        <?php if ($erro || $sucesso) { ?>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="alert <?= $class ?> alert-dismissible fade show" role="alert">
                                    <?php
                                    switch ($error) {
                                        case '1':
                                            echo "Preencha todos os campos para continuar.";
                                            break;

                                        case '2':
                                            echo "Erro no banco de dados. Contate um administrador ou tente novamente mais tarde.";
                                            break;

                                        case '3':
                                            echo "Usuário e/ou senha incorretos.";
                                            break;

                                        case '4':
                                            echo "Favor realizar o login antes de acessar o site.";
                                            break;
                                    }

                                    switch ($success) {
                                        case '1':
                                            echo "Logoff realizado com sucesso!";
                                            break;
                                    }
                                    ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        <?php } ?>
                        <form action="../controller/access/access_user.php" method="POST" class="needs-validation" novalidate>
                            <input type="hidden" value="1" name="login">
                            <div class="input-group has-validation mb-3">
                                <span class="input-group-text">
                                    <i class="bi bi-envelope"></i>
                                </span>
                                <input type="email" class="form-control" id="txtEmail" name="txtEmail" autocomplete="off" placeholder="E-mail" required>
                                <div class="invalid-feedback">
                                    Campo obrigatório
                                </div>
                            </div>
                            <div class="input-group has-validation mb-3">
                                <span class="input-group-text">
                                    <i class="bi bi-key"></i>
                                </span>
                                <input type="password" class="form-control" id="txtSenha" name="txtSenha" autocomplete="off" placeholder="Senha" required>
                                <div class="invalid-feedback">
                                    Campo obrigatório
                                </div>
                            </div>
                            <button class="btn btn-primary w-100" type="submit">Entrar</button>

                        </form>
                        <hr class="separate">
                        <span style="text-align:center">
                            Não possui conta? <a href="cadastro.php">Cadastre-se</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-8 col-md-7 col-sm-6 col-xs-5 background-color-blue-login"></div>
    </div>
    <script>
        (() => {
            "use strict";

            const forms = document.querySelectorAll(".needs-validation");

            Array.from(forms).forEach((form) => {
                form.addEventListener(
                    "submit",
                    (event) => {
                        if (!form.checkValidity()) {
                            event.preventDefault();
                            event.stopPropagation();
                        }

                        form.classList.add("was-validated");
                    },
                    false
                );
            });
        })();
    </script>
</body>