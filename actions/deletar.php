<?php
    include_once("../config/database/database.php");

    $id = $_GET['id'];
    $sql = "DELETE FROM noticias WHERE id = $id";
    $con->query($sql);

    header("Location: ../index.php");
    exit();