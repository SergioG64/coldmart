<?php


$type = isset($_POST['type']) ? $_POST['type'] : null;
$id_categoria = isset($_POST['id_categoria']) ? $_POST['id_categoria'] : null;
$name = isset($_POST['txtCat']) ? $_POST['txtCat'] : null;

include_once $_SERVER['DOCUMENT_ROOT'] . "/faculdade/Aula-PHP-HTML-CSS-Faculdade/PI/class/Category.php";
$category = new Category();
$result = $category->listAllCategory('DESC');

if (isset($type) && isset($id_categoria)) {
    if ($type == 'cad') {
        if (empty($name)) {
            header("location:../../view/cad_categoria.php?error=1");
            die();
        }
        $categoryCad = new Category();
        $categoryCad->cadCategory($name);
        die();
    } elseif ($type == 'edit') {
        if (empty($name)) {
            header("location:../../view/cad_categoria.php?error=1");
            die();
        }
        $categoryEdit = new Category();
        $categoryEdit->editCategory($id_categoria, $name);
        die();
    } elseif ($type == 'del') {
        $category = new Category();
        $category->deleteCategoryByID($id_categoria);
        die();
    }
}
