<?php
include 'conexao_bd.php';
// Verifica a conexão
if ($con->connect_error) {
    die(json_encode(["status" => "error", "message" => "Falha na conexão com o banco de dados."]));
}

// Verifica o método da requisição
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lê os dados enviados no corpo da requisição
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    // Verifica se o ID foi fornecido
    if (!isset($data['id']) || empty($data['id'])) {
        echo json_encode(["status" => "error", "message" => "ID da digital não fornecido."]);
        exit;
    }

    $id = intval($data['id']); // Sanitiza o ID recebido

    // Prepara e executa a exclusão
    $stmt = $conn->prepare("DELETE FROM fingerprints WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            echo json_encode(["status" => "success", "message" => "Digital excluída com sucesso."]);
        } else {
            echo json_encode(["status" => "error", "message" => "Digital não encontrada."]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Erro ao excluir digital."]);
    }
    $stmt->close();
} else {
    // Método HTTP não permitido
    echo json_encode(["status" => "error", "message" => "Método não permitido."]);
}

// Fecha a conexão com o banco de dados
$con->close();
?>
