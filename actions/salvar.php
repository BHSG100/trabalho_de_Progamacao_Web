<?php
include_once("../config/database/database.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $foto = $_POST['imagem'];
    $nome_da_noticia = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $data_de_postagem = date('Y-m-d');

    $sql = "INSERT INTO noticias (foto, nome_da_noticia, descricao, data_de_postagem) VALUES ('$foto', '$nome_da_noticia', '$descricao', '$data_de_postagem')";

    $con->query($sql);
    header('Location: ../index.php');
    exit;
} else {
    header('Location: ../index.php');
    exit;
}
?>