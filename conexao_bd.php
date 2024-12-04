<?php
$host = " sql111.infinityfree.com"; // Nome do hostname sql111.infinityfree.com
$user = "if0_37821527"; // Nome do usuário if0_37821527
$pass = "MySQL CgMEhx64Ma7"; // Substitua pela sua senha do MySQL CgMEhx64Ma7
$base = "if0_37821527_tcc"; // Nome da database if0_37821527_tcc

// Criar uma conexão com o banco de dados
$con = new mysqli($host, $user, $pass, $base);

// Verificar a conexão
if ($con->connect_error) {
    die("Conexão falhou: " . $con->connect_error);
}

// Definir o conjunto de caracteres para utf8 (opcional)
$con->set_charset("utf8");
?>
