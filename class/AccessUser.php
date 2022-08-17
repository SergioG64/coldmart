<?php

class AccessUser
{
    public function verifLog($email, $senha)
    {
        try {
            require $_SERVER['DOCUMENT_ROOT'] . "/faculdade/Aula-PHP-HTML-CSS-Faculdade/PI/db/connect.php";
            $sql = "SELECT * FROM tb_usuario WHERE email_usuario = :email AND senha_usuario = :senha";
            $result = $pdo->prepare($sql);
            $result->bindParam(":email", $email, PDO::PARAM_STR);
            $result->bindParam(":senha", $senha, PDO::PARAM_STR);
            $result->execute();
            if ($result->rowCount() != 0) {
                session_start();
                while ($li = $result->fetch()) {
                    $_SESSION['nome'] = $li['nome_usuario'];
                    $_SESSION['email'] = $li['email_usuario'];
                    $_SESSION['id_usuario'] = $li['id_usuario'];
                    $_SESSION['logado'] = true;
                }
                header("location:../../view/index.php");
            } else {
                header("location:../../view/login.php?error=3");
            }
        } catch (\Throwable $th) {
            header("location:../../view/login.php?error=2");
            die();
        }
    }

    public function setLogout()
    {
        session_start();
        $_SESSION['nome'] = null;
        $_SESSION['email'] = null;
        $_SESSION['logado'] = false;
        session_destroy();

        header("location:../../view/login.php?success=1");
    }
}
