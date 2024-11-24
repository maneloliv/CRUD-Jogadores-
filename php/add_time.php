<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_time = $_POST['nome_time'];
    $cidade = $_POST['cidade'];
    $fundacao = $_POST['fundacao'];

    $sql = "INSERT INTO Time (nome_time, cidade, fundacao) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $nome_time, $cidade, $fundacao);

    if ($stmt->execute()) {
        header("Location: ../index.php");
    } else {
        echo "Erro ao adicionar comentario: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
