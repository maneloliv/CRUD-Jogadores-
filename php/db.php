<?php
$host = 'localhost';
$user = 'root';
$password = 'admin'; 
$database = 'futeboldb';

// Conexao com o banco de dados
$conn = new mysqli($host, $user, $password, $database);


if ($conn->connect_error) {
    die("Falha na conexao: " . $conn->connect_error);
}
?>
