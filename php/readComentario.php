<?php
include 'db.php';

$id_jogador = $_GET['id_jogador'];

$sql = "SELECT texto_comentario, data_comentario FROM Comentario WHERE id_jogador = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_jogador);
$stmt->execute();
$result = $stmt->get_result();

$comentarios = [];
while ($row = $result->fetch_assoc()) {
    $comentarios[] = $row;
}

echo json_encode($comentarios);

$stmt->close();
$conn->close();
?>
