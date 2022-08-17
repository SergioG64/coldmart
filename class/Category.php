<?php

class Category
{
    public function cadCategory($nome)
    {
        try {
            session_start();
            require $_SERVER['DOCUMENT_ROOT'] . "/faculdade/Aula-PHP-HTML-CSS-Faculdade/PI/db/connect.php";
            $sql = "
            INSERT INTO tb_cat_curso(nome_categoria, id_usuario) 
                VALUES(:nome_categoria, :id_usuario)";
            $result = $pdo->prepare($sql);
            $result->bindParam(":nome_categoria", $nome, PDO::PARAM_STR);
            $result->bindParam(":id_usuario", $_SESSION['id_usuario'], PDO::PARAM_STR);
            $result->execute();
            header("location:../../view/cad_categoria.php?success=1");
        } catch (\PDOException $th) {
            header("location:../../view/cad_categoria.php?error=2");
            die();
        }
    }

    public function listAllCategory($order)
    {
        try {
            require $_SERVER['DOCUMENT_ROOT'] . "/faculdade/Aula-PHP-HTML-CSS-Faculdade/PI/db/connect.php";
            $sql =
                "SELECT tb_c.id_categoria, tb_c.nome_categoria, tb_c.data_hora_categoria, tb_u.nome_usuario 
                FROM tb_cat_curso AS tb_c
                INNER JOIN tb_usuario AS tb_u
                ON tb_u.id_usuario = tb_c.id_usuario
                ORDER BY tb_c.id_categoria " . $order;
            $result = $pdo->prepare($sql);
            $result->execute();
            return $result;
        } catch (\PDOException $th) {
            header("location:../../view/cad_categoria.php?error=2");
            die();
        }
    }

    public function deleteCategoryByID($id)
    {
        try {
            require $_SERVER['DOCUMENT_ROOT'] . "/faculdade/Aula-PHP-HTML-CSS-Faculdade/PI/db/connect.php";
            $sql = "DELETE FROM tb_cat_curso WHERE id_categoria = :id";
            $result = $pdo->prepare($sql);
            $result->bindParam(":id", $id, PDO::PARAM_INT);
            $result->execute();
            header("location:../../view/cad_categoria.php?success=2");
        } catch (\PDOException $th) {
            header("location:../../view/cad_categoria.php?error=2");
            die();
        }
    }

    public function editCategory($id, $nome)
    {
        try {
            session_start();
            require $_SERVER['DOCUMENT_ROOT'] . "/faculdade/Aula-PHP-HTML-CSS-Faculdade/PI/db/connect.php";
            $now = date("Y-m-d H:i:s");
            $sql =
                "UPDATE tb_cat_curso 
                    SET nome_categoria = :nome, id_usuario = :id_user, data_hora_categoria = :dt
                    WHERE id_categoria = :id";
            $result = $pdo->prepare($sql);
            $result->bindParam(":nome", $nome, PDO::PARAM_STR);
            $result->bindParam(":id_user", $_SESSION['id_usuario'], PDO::PARAM_INT);
            $result->bindParam(":dt", $now, PDO::PARAM_STR);
            $result->bindParam(":id", $id, PDO::PARAM_INT);
            $result->execute();
            header("location:../../view/cad_categoria.php?success=3");
        } catch (\PDOException $th) {
            header("location:../../view/cad_categoria.php?error=2");
            die();
        }
    }

    public function findCategoryByID($id)
    {
        try {
            require $_SERVER['DOCUMENT_ROOT'] . "/faculdade/Aula-PHP-HTML-CSS-Faculdade/PI/db/connect.php";
            $sql = "SELECT * FROM tb_cat_curso WHERE id_categoria = :id";
            $result = $pdo->prepare($sql);
            $result->bindParam(":id", $id, PDO::PARAM_INT);
            $result->execute();
            return $result;
        } catch (\PDOException $th) {
            header("location:../../view/cad_categoria.php?error=2");
            die();
        }
    }

    public function findNameByID($id)
    {
        try {
            require $_SERVER['DOCUMENT_ROOT'] . "/faculdade/Aula-PHP-HTML-CSS-Faculdade/PI/db/connect.php";
            $sql = "SELECT nome_categoria FROM tb_cat_curso WHERE id_categoria = :id";
            $result = $pdo->prepare($sql);
            $result->bindParam(":id", $id, PDO::PARAM_INT);
            $result->execute();
            return $result;
        } catch (\PDOException $th) {
            header("location:../../view/cad_categoria.php?error=2");
            die();
        }
    }
}
