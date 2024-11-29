<?php
include 'conexao.php';

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
