<?php
// Configuração do banco de dados
$servername = "localhost"; // ou o IP do servidor MySQL
$username = "root"; // seu usuário do MySQL
$password = ""; // sua senha do MySQL
$dbname = "tcc"; // banco de dados alterado para "tcc"

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verifica se o ID foi enviado via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $id_aluno = intval($_POST['id']); // Converte o ID enviado para inteiro

    // Verifica se o aluno existe no banco de dados
    $sql = "SELECT * FROM tb_alunos WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_aluno);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Insere a chamada no banco de dados
        $sql_chamada = "INSERT INTO tb_chamadas (aluno_id) VALUES (?)"; // Corrigido para usar aluno_id
        $stmt_chamada = $conn->prepare($sql_chamada);
        $stmt_chamada->bind_param("i", $id_aluno);

        if ($stmt_chamada->execute()) {
            echo "Chamada registrada com sucesso!";
        } else {
            echo "Erro ao registrar a chamada!";
        }
    } else {
        echo "Aluno não encontrado!";
    }
} else {
    echo "Requisição inválida ou dados ausentes!";
}

$conn->close();
?>
