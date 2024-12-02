<?php
include 'conexao_bd.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
    $fingerprint = $data['fingerprint'];

    $stmt = $con->prepare("INSERT INTO fingerprints (data) VALUES (?)");
    $stmt->bind_param("s", $fingerprint);
    if ($stmt->execute()) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error"]);
    }
}
?>
