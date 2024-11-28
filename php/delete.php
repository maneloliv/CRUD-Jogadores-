<?php
include 'db.php';

$id = (int) $_GET['id'];

$deleteCommentsQuery = "DELETE FROM comentario WHERE id_jogador = $id";
if (!$conn->query($deleteCommentsQuery)) {
    echo "Erro ao excluir comentários: " . $conn->error;
    exit(); // Encerra se houver erro
}

$deletePlayerQuery = "DELETE FROM jogador WHERE id_jogador = $id";
if ($conn->query($deletePlayerQuery)) {
    header("Location: ../index.php");
} else {
    echo "Erro ao excluir jogador: " . $conn->error;
}
?>
