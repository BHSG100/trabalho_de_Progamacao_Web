<?php
include_once("../config/database/database.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $titulo = $_POST['titulo'];
    $imagem = $_POST['imagem'];
    $descricao = $_POST['descricao'];

    $sql = "UPDATE noticias SET nome_da_noticia='$titulo', foto='$imagem', descricao='$descricao' WHERE id = " . $_GET['id'];
    $con->query($sql);
    header("Location: ../index.php");
    exit();
}

$sql = "SELECT * FROM noticias WHERE id = " . $_GET['id'];
$rows = $con->query($sql);
if ($rows->num_rows > 0) {
    $row = $rows->fetch_assoc();
    $titulo = $row['nome_da_noticia'];
    $imagem = $row['foto'];
    $descricao = $row['descricao'];
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<div class="container" style="max-width: 500px; margin-top: 40px;">
    <form method="POST">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Editar Notícia</h1>
            </div>
            <div class="modal-body">
                <div class="mb-3 form-floating">
                    <input name="titulo" type="text" value="<?= htmlspecialchars($titulo) ?>" class="form-control" id="tituloInput" placeholder="Título" required>
                    <label for="tituloInput">Título</label>
                </div>
                <div class="mb-3 form-floating">
                    <input name="imagem" type="text" value="<?= htmlspecialchars($imagem) ?>" class="form-control" id="imagemInput" placeholder="URL da Imagem">
                    <label for="imagemInput">URL da Imagem</label>
                </div>
                <div class="mb-3 form-floating">
                    <input name="descricao" type="text" value="<?= htmlspecialchars($descricao) ?>" class="form-control" id="descricaoInput" placeholder="Descrição" required>
                    <label for="descricaoInput">Descrição</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">
                    Salvar Notícia
                </button>
            </div>
        </div>
    </form>
</div>