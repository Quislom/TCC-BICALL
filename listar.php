<?php
include 'conexao_bd.php';


// Verifica a conexão
if ($con->connect_error) {
    die(json_encode(["status" => "error", "message" => "Falha na conexão com o banco de dados."]));
}

// Consulta para buscar todas as digitais
$sql = "SELECT id, fingerprint_data, created_at FROM fingerprints";
$result = $conn->query($sql);

// Verifica se há resultados
if ($result->num_rows > 0) {
    $digitais = [];
    
    // Loop pelos resultados
    while ($row = $result->fetch_assoc()) {
        $digitais[] = [
            "id" => $row["id"],
            "fingerprint_data" => $row["fingerprint_data"],
            "created_at" => $row["created_at"]
        ];
    }

    // Retorna as digitais como JSON
    echo json_encode(["status" => "success", "digitais" => $digitais]);
} else {
    echo json_encode(["status" => "success", "digitais" => []]); // Sem resultados
}

// Fecha a conexão com o banco de dados
$con->close();
?>
