<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_jogador = $_POST['id_jogador'];
    $texto_comentario = $_POST['texto_comentario'];

    $sql = "INSERT INTO Comentario (id_jogador, texto_comentario) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $id_jogador, $texto_comentario);

    if ($stmt->execute()) {
        echo "Comentário adicionado com sucesso!";
    } else {
        echo "Erro ao adicionar comentário: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
