<?php
include 'db.php';

$id_jogador = $_GET['id_jogador'];

$query = "SELECT texto_comentario FROM comentario WHERE id_jogador = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id_jogador);
$stmt->execute();
$result = $stmt->get_result();

$comentarios = [];
while ($row = $result->fetch_assoc()) {
    $comentarios[] = $row;
}


header('Content-Type: application/json');
echo json_encode($comentarios);
?>
