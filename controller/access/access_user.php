<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/faculdade/Aula-PHP-HTML-CSS-Faculdade/PI/class/AccessUser.php";

$login = isset($_POST['login']) ? $_POST['login'] : 0;
$logout = isset($_GET['logout']) ? $_GET['logout'] : 0;
$access = new AccessUser();

if ($login == 1) {
    $email = $_POST['txtEmail'];
    $password = $_POST['txtSenha'];

    if (empty($email) || empty($password)) {
        header("location:../../view/login.php?error=1");
        die();
    }

    $access->verifLog($email, $password);
}
if ($logout == 1) {
    $access->setLogout();
}
