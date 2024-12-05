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
        echo "<script>
                alert('Por favor, preencha todos os campos.');
                window.location.href = 'cadastrarprofessor.html';
              </script>";
        exit();
    }

    // Verifica se o email é válido
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>
                alert('Por favor, insira um email válido.');
                window.location.href = 'cadastrarprofessor.html';
              </script>";
        exit();
    }

    // Verifica se a senha tem pelo menos 6 caracteres
    if (strlen($senha) < 6) {
        echo "<script>
                alert('A senha deve ter pelo menos 6 caracteres.');
                window.location.href = 'cadastrarprofessor.html';
              </script>";
        exit();
    }

    // Verifica se o email já está registrado
    $checkEmail = $con->prepare("SELECT id FROM tb_professores WHERE email = ?");
    $checkEmail->bind_param("s", $email);
    $checkEmail->execute();
    $checkEmail->store_result();

    if ($checkEmail->num_rows > 0) {
        echo "<script>
                alert('Este email já está registrado.');
                window.location.href = 'cadastrarprofessor.html';
              </script>";
        exit();
    }

    // Gera o hash da senha
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    // Prepara a consulta SQL para inserção segura
    $stmt = $con->prepare("INSERT INTO tb_professores (nome, email, senha) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nome, $email, $senhaHash);

    // Executa a consulta
    if ($stmt->execute()) {
        echo "<script>
                alert('Cadastro realizado com sucesso!');
                window.location.href = 'conectarprofessor.html';
              </script>";
        exit();
    } else {
        echo "<script>
                alert('Erro ao cadastrar professor: " . $stmt->error . "');
                window.location.href = 'cadastrarprofessor.html';
              </script>";
        exit();
    }

    // Fecha a declaração preparada
    $stmt->close();
    $checkEmail->close();
}

// Fecha a conexão com o banco de dados
mysqli_close($con);
?>
