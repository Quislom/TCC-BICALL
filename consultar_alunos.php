<?php
include 'conexao.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Authorization");


$sql = "SELECT * FROM alunos";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<h1>Alunos Cadastrados</h1>";
echo "<table border='1'><tr><th>ID</th><th>Nome</th><th>Data de Cadastro</th><th>Digital</th></tr>";

foreach ($alunos as $aluno) {
    echo "<tr><td>" . $aluno['id'] . "</td><td>" . $aluno['nome'] . "</td><td>" . $aluno['data_cadastro'] . "</td><td>" . $aluno['digital'] . "</td></tr>";
}

echo "</table>";
?>
