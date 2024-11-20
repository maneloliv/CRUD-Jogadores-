<?php
include 'db.php';

$nome = $_POST['nome_jogador'];
$descricao = $_POST['descricao'];
$foto = $_POST['foto'];
$id_time = $_POST['id_time'];

$query = "INSERT INTO Jogador (nome_jogador, descricao, foto, id_time) VALUES ('$nome', '$descricao', '$foto', $id_time)";
if ($conn->query($query)) {
    header("Location: ../index.php");
} else {
    echo "Erro: " . $conn->error;
}
?>
