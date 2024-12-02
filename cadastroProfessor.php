<?php
include 'conexao_bd.php';

// Verifica se a conexão foi bem-sucedida
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Verifica se o formulário foi enviado via método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coleta os dados do formulário
    $nome = trim($_POST['nome']); // Remove espaços em branco adicionais
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);
    
    // Verifica se os campos do formulário estão preenchidos
    if (empty($nome) || empty($email) || empty($senha)) {
        echo "Por favor, preencha todos os campos."; // Exibe mensagem se algum campo estiver vazio
    } else {
        // Verifica se o email já está registrado
        $checkEmail = $con->prepare("SELECT id FROM tb_professores WHERE email = ?");
        $checkEmail->bind_param("s", $email);
        $checkEmail->execute();
        $checkEmail->store_result();

        if ($checkEmail->num_rows > 0) {
            echo "Este email já está registrado."; // Impede duplicação de emails
        } else {
            // Gera o hash da senha
            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

            // Prepara a consulta SQL para inserção segura
            $stmt = $con->prepare("INSERT INTO tb_professores (nome, email, senha) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $nome, $email, $senhaHash); // Substitui os parâmetros na consulta

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
        $checkEmail->close();
    }
}

// Fecha a conexão com o banco de dados
mysqli_close($con);
?>
