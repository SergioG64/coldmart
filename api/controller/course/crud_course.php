<?php

include_once "../../db/connect.php";

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (empty($dados['txtTit'])) {
    $retorna = [
        'status' => false,
        'msg' => '<div class="alert alert-danger" role="alert">Erro: Necessário preencher o campo <strong>Título</strong></div>'
    ];
} elseif (empty($dados['txtSubt'])) {
    $retorna = [
        'status' => false,
        'msg' => '<div class="alert alert-danger" role="alert">Erro: Necessário preencher o campo <strong>Subtítulo!</strong></div>'
    ];
} elseif (empty($dados['selCat'])) {
    $retorna = [
        'status' => false,
        'msg' => '<div class="alert alert-danger" role="alert">Erro: Necessário preencher o campo <strong>Categoria!</strong></div>'
    ];
} elseif (empty($dados['areaDesc'])) {
    $retorna = [
        'status' => false,
        'msg' => '<div class="alert alert-danger" role="alert">Erro: Necessário preencher o campo <strong>Descrição!</strong></div>'
    ];
} else {

    include_once $_SERVER['DOCUMENT_ROOT'] . "/faculdade/Aula-PHP-HTML-CSS-Faculdade/PI/class/Course.php";

    $curso = new Course();
    $retorna = $curso->cadCourse($dados['txtTit'], $dados['txtSubt'], $dados['selCat'], $dados['areaDesc']);
}

echo json_encode($retorna);
