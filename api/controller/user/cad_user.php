<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/faculdade/Aula-PHP-HTML-CSS-Faculdade/PI/class/User.php";

$name = $_POST['txtNome'];
$email = $_POST['txtEmail'];
$password = $_POST['txtSenha'];

if (empty($name) || empty($email) || empty($password)) {
    header("location:../../view/cadastro.php?error=1");
    die();
}

$user = new User();
$user->cadUser($name, $email, $password);
