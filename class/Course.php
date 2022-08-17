<?php

class Course
{
    public function cadCourse($title, $subtitle, $category, $descryption)
    {
        try {
            session_start();
            require $_SERVER['DOCUMENT_ROOT'] . "/faculdade/Aula-PHP-HTML-CSS-Faculdade/PI/db/connect.php";

            $sql =
                "INSERT INTO tb_curso(nome_curso, descricao_curso, subtitulo_curso, id_categoria, id_usuario)
                VALUES(:title, :descryption, :subtitle, :id_category, :id_user)";

            $result = $pdo->prepare($sql);
            $result->bindParam(":title", $title, PDO::PARAM_STR);
            $result->bindParam(":descryption", $descryption, PDO::PARAM_STR);
            $result->bindParam(":subtitle", $subtitle, PDO::PARAM_STR);
            $result->bindParam(":id_category", $category, PDO::PARAM_INT);
            $result->bindParam(":id_user", $_SESSION['id_usuario'], PDO::PARAM_INT);
            $result->execute();
            $retorna = [
                'status' => true,
                'msg' => '<div class="alert alert-success" role="alert">Cadastrado com sucesso!</div>'
            ];
            return $retorna;
        } catch (\PDOException $th) {
            $retorna = [
                'status' => false,
                'msg' => '<div class="alert alert-danger" role="alert">Erro: ' . $th->getMessage() . '</div>'
            ];
            return $retorna;
        }
    }

    public function listCourse()
    {
        try {
            if (!isset($_SESSION)) {
                session_start();
            }
            require $_SERVER['DOCUMENT_ROOT'] . "/faculdade/Aula-PHP-HTML-CSS-Faculdade/PI/db/connect.php";

            $sql =
                "SELECT `nome_curso`, `descricao_curso`, `subtitulo_curso`, tbcc.nome_categoria, tbu.nome_usuario FROM tb_curso tbc  
                INNER JOIN tb_cat_curso tbcc
                ON tbcc.id_categoria = tbc.id_categoria
                INNER JOIN tb_usuario tbu
                ON tbc.id_usuario = tbu.id_usuario";

            $result = $pdo->prepare($sql);
            $result->execute();
            return $result;
        } catch (\PDOException $th) {
            // $retorna = [
            //     'status' => false,
            //     'msg' => '<div class="alert alert-danger" role="alert">Erro: ' . $th->getMessage() . '</div>'
            // ];
            // return $retorna;
        }
    }
}
