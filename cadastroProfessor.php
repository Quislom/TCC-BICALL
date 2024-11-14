<?php
// Definindo as credenciais de conexão ao banco de dados
$host = "localhost";
$user = "root";
$pass = "23082006";
$base = "tcc";

// Conecta ao banco de dados
$con = mysqli_connect($host, $user, $pass, $base);

// Verifica se a conexão foi bem-sucedida
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Verifica se o formulário foi enviado via método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coleta os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    // Verifica se os campos do formulário estão preenchidos
    if (empty($nome) || empty($email) || empty($senha)) {
        echo "Por favor, preencha todos os campos."; // Exibe mensagem se algum campo estiver vazio
    } else {
        // Prepara a consulta SQL para evitar SQL Injection
        $stmt = $con->prepare("INSERT INTO tb_professores (nome, email, senha) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nome, $email, $senha); // Substitui os parâmetros na consulta

        // Executa a consulta
        if ($stmt->execute()) {
            header("Location: conectarprofessor.html"); // Redireciona para a página de login
            exit(); // Encerra o script após o redirecionamento
        } else {
            echo "Erro ao cadastrar professor: " . $stmt->error; // Exibe erro se o cadastro falhar
        }
        
        // Fecha a declaração preparada
        $stmt->close();
    }
}

// Fecha a conexão com o banco de dados
mysqli_close($con);
?>
