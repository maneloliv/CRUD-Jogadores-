<?php include './php/db.php'; ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Jogadores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
    <script src="js/script.js" defer></script>
</head>
<body class="container py-5">
    <h1 class="text-center mb-4">CRUD de Jogadores</h1>

    <!-- Formulário para adicionar jogadores -->
    <div class="card mb-5 p-4">
        <form id="addPlayerForm" action="php/create.php" method="POST">
            <h3>Adicionar Jogador</h3>
            <div class="row g-3">
                <div class="col-md-4">
                    <input type="text" name="nome_jogador" class="form-control" placeholder="Nome do Jogador" required>
                </div>
                <div class="col-md-4">
                    <input type="text" name="descricao" class="form-control" placeholder="Descrição" required>
                </div>
                <div class="col-md-4">
                    <input type="text" name="foto" class="form-control" placeholder="URL da Foto" required>
                </div>
                <div class="col-md-6">
                    <select name="id_time" class="form-select" required>
                        <option value="" disabled selected>Selecione o Time</option>
                        <?php
                        $result = $conn->query("SELECT * FROM Time");
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='{$row['id_time']}'>{$row['nome_time']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary w-100">Adicionar</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Lista de jogadores -->
    <h2 class="mb-4">Jogadores Cadastrados</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Time</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT j.*, t.nome_time FROM Jogador j LEFT JOIN Time t ON j.id_time = t.id_time";
            $result = $conn->query($query);

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td><img src='{$row['foto']}' alt='{$row['nome_jogador']}' width='50'></td>
                        <td>{$row['nome_jogador']}</td>
                        <td>{$row['descricao']}</td>
                        <td>{$row['nome_time']}</td>
                        <td>
                            <a href='php/update.php?id={$row['id_jogador']}' class='btn btn-sm btn-warning'>Editar</a>
                            <a href='php/delete.php?id={$row['id_jogador']}' class='btn btn-sm btn-danger'>Excluir</a>
                            <button class='btn btn-sm btn-secondary' onclick='verComentarios({$row['id_jogador']})'>Ver Comentários</button>
                            <button class='btn btn-sm btn-success' onclick='abrirModalComentario({$row['id_jogador']})' data-bs-toggle='modal' data-bs-target='#comentarioModal'>Adicionar Comentário</button>
                            
                            <!-- Div onde os comentários serão exibidos -->
                            <div id='comentarios-{$row['id_jogador']}' class='mt-3' style='display:none;'></div>
                        </td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Modal para Adicionar Comentários -->
    <div class="modal fade" id="comentarioModal" tabindex="-1" aria-labelledby="comentarioModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="comentarioForm" action="php/addComentario.php" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="comentarioModalLabel">Adicionar Comentário</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="id_jogador" name="id_jogador" />
                        <div class="mb-3">
                            <label for="texto_comentario" class="form-label">Comentário</label>
                            <textarea class="form-control" id="texto_comentario" name="texto_comentario" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Salvar Comentário</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
