<?php
$host = 'localhost';
$user = 'root';  // Substitua pelo seu usuário do MySQL
$password = 'admin';  // Substitua pela senha do seu MySQL
$database = 'futeboldb';

// Conexão com o banco de dados
$conn = new mysqli($host, $user, $password, $database);

// Verifica se há erros na conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
