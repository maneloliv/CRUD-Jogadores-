<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_jogador = $_POST['id_jogador'];
    $texto_comentario = $_POST['texto_comentario'];

    $sql = "INSERT INTO Comentario (id_jogador, texto_comentario) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $id_jogador, $texto_comentario);

    if ($stmt->execute()) {
        header("Location: ../index.php");
    } else {
        echo "Erro ao adicionar comentario: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
