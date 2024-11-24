<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome_jogador'];
    $descricao = $_POST['descricao'];
    $foto = $_POST['foto'];
    $id_time = $_POST['id_time'];

    $query = "UPDATE Jogador SET nome_jogador='$nome', descricao='$descricao', foto='$foto', id_time=$id_time WHERE id_jogador=$id";
    if ($conn->query($query)) {
        header("Location: ../index.php");
    } else {
        echo "Erro: " . $conn->error;
    }
} else {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM Jogador WHERE id_jogador=$id");
    $row = $result->fetch_assoc();
}
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Jogadores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
</head>
<body class="container-fluid py-5">
<h1 class="text-center mb-4">Atualizar de Jogadores</h1>
    <div class="card mb-5 p-4">
        <form action="update.php" method="POST">
            <div class="row g-4">
                <div>
                <input type="hidden" name="id" value="<?php echo $row['id_jogador']; ?>">
                </div>
                <div class="d-flex justify-content-between ">
                    <input class="w-25" type="text" name="nome_jogador" value="<?php echo $row['nome_jogador']; ?>" required>
                    <input class="w-50 ms-2" type="text" name="descricao" value="<?php echo $row['descricao']; ?>" required>
                    <input class="w-100 ms-2" type="text" name="foto" value="<?php echo $row['foto']; ?>" required>
                </div>
                <div class="col-6">
                <select name="id_time" class="form-select" required>
                    <option value="" disabled>Selecione o Time</option>
                    <?php
                    $teams = $conn->query("SELECT * FROM Time");
                    while ($team = $teams->fetch_assoc()) {
                        $selected = $row['id_time'] == $team['id_time'] ? 'selected' : '';
                        echo "<option value='{$team['id_time']}' $selected>{$team['nome_time']}</option>";
                    }
                    ?>
                </select>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary w-100">Atualizar</button>
                </div>
            </div
        </form>
    </div>
<body>
