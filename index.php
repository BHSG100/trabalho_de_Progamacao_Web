<?php
require_once './config/database/database.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Cadastro de Notícias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
</head>
<body>
    <header class="p-3 bg-primary text-white mb-4 text-center">
        <h1>Jornal Ontem</h1>
    </header>
    <main class="container">
        <div class="row">
            <div class="col-md-6">
                <h4>Cadastro de Notícias</h4>
                <form action="actions/salvar.php" class="border border-black p-3 rounded" method="POST">
                    <div class="mb-3">
                        <label for="nome" class="form-label">
                            Qual a imagem você quer que apareça (não é necessário)
                        </label>
                        <input
                            type="text"
                            name="imagem"
                            class="form-control"
                            placeholder="Digite o url da imagem"
                        >
                    </div>
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Qual o título da sua notícia?</label>
                        <input
                            type="text"
                            name="titulo"
                            class="form-control"
                            placeholder="Digite o seu título"
                            required
                        >
                    </div>
                    <div class="mb-3">
                        <label for="descricao" class="form-label">Descrição da notícia</label>
                        <input
                            type="text"
                            name="descricao"
                            class="form-control"
                            placeholder="Digite a sua descrição"
                            required
                        >
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
            <div class="col-md-6">
                <h4>Notícias</h4>
                <div class="border border-black p-3 rounded" id="lista-noticias">
                    <?php
                    $sql = "SELECT * FROM noticias ORDER BY data_de_postagem DESC, id DESC";
                    $result = $con->query($sql);

                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="mb-3">';
                            if (!empty($row['foto'])) {
                                echo '<img src="' . $row['foto'] . '" alt="Imagem da notícia" style="align:center" class="start-50 img-fluid mb-2"><br>';
                            }
                            echo '<strong>' . $row['nome_da_noticia'] . '</strong><br>';
                            echo '<span>' . $row['descricao'] . '</span><br>';
                            echo '<small class="text-muted">Postado em: ' . $row['data_de_postagem'] . '</small><br>';
                            echo '<a href="actions/deletar.php?id=' . $row['id'] . '" class="btn btn-danger btn-sm mt-2">Excluir</a>';
                            echo '<a href="actions/editar.php?id=' . $row['id'] . '" class="btn btn-warning btn-sm mt-2 ms-2">Editar</a>';
                            echo '</div><hr>';
                        }
                    } else {
                        echo '<p>Nenhuma notícia cadastrada ainda.</p>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </main>
</body>
</html>