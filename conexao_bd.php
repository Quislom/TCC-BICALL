<?php

$host = "localhost"; // Nome do hostname
$user = "root"; // Nome do usuario 
$pass = ""; // Substitua pela sua senha do MySQL
$base = "tcc"; //Nome da database

// Criar uma conexão com o banco de dados
$conn = new mysqli($host, $user, $pass, $base);

// Verificar a conexão

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Definir o conjunto de caracteres para utf8 (opcional)
$conn->set_charset("utf8");

?>
