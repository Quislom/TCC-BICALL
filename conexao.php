<?php
$host = 'localhost';
$db = 'seu_banco';
$user = 'root';  // Usuário padrão do MySQL no XAMPP
$pass = '';      // Senha padrão do MySQL no XAMPP

// Conexão com o banco de dados
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Erro na conexão: ' . $e->getMessage();
    exit;
}
?>
