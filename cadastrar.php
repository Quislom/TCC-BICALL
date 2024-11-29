<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados enviados via POST
    $id_digital = $_POST['id_digital']; // ID da digital
    $id_aluno = $_POST['id_aluno'];     // ID do aluno

    // Conexão com o banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "biometria_db";

    // Conexão com MySQL
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Insere os dados no banco
    $sql = "INSERT INTO usuarios (id_aluno, id_digital) VALUES ('$id_aluno', '$id_digital')";

    if ($conn->query($sql) === TRUE) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    // Fecha a conexão com o banco
    $conn->close();
}
?>
