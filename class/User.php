<?php


class User
{
    public function cadUser($name, $email, $password)
    {
        $user = new User();
        $verif = $user->findByEmail($email);
        if ($verif) {
            try {
                require $_SERVER['DOCUMENT_ROOT'] . "/faculdade/Aula-PHP-HTML-CSS-Faculdade/PI/db/connect.php";
                $sql =
                    "INSERT INTO tb_usuario(nome_usuario, email_usuario, senha_usuario) 
                        VALUES(:nome, :email, :pass)";
                $result = $pdo->prepare($sql);
                $result->bindParam(":nome", $name, PDO::PARAM_STR);
                $result->bindParam(":email", $email, PDO::PARAM_STR);
                $result->bindParam(":pass", $password, PDO::PARAM_STR);
                $result->execute();
                header("location:../../view/cadastro.php?success=1");
            } catch (\PDOException $th) {
                header("location:../../view/cadastro.php?error=2");
                die();
            }
        } else {
            header("location:../../view/cadastro.php?error=3");
            die();
        }
    }

    public function findByEmail($email)
    {
        try {
            require $_SERVER['DOCUMENT_ROOT'] . "/faculdade/Aula-PHP-HTML-CSS-Faculdade/PI/db/connect.php";
            $sql = "SELECT * FROM tb_usuario WHERE email_usuario = :email";
            $result = $pdo->prepare($sql);
            $result->bindParam(":email", $email, PDO::PARAM_STR);
            $result->execute();
            if ($result->rowCount() == 0) {
                return true;
            } else {
                return false;
            }
        } catch (\PDOException $th) {
            header("location:../../view/cadastro.php?error=2");
            die();
        }
    }
}
