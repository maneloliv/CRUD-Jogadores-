<?php
include 'db.php';

$id = $_GET['id'];
$query = "DELETE FROM Jogador WHERE id_jogador=$id";
if ($conn->query($query)) {
    header("Location: ../index.php");
} else {
    echo "Erro: " . $conn->error;
}
?>
