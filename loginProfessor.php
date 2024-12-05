<?php
include 'conexao_bd.php'; // Certifique-se de que o caminho esteja correto

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $senha = $_POST['senha'];

    if (empty($email) || empty($senha)) {
        echo "<script>
                alert('Por favor, preencha todos os campos.');
                window.location.href = 'conectarprofessor.html';
              </script>";
        exit();
    }

    // Busca o usuário pelo email
    $sql = "SELECT * FROM tb_professores WHERE email = '$email'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // Verifica a senha
        if (password_verify($senha, $row['senha'])) {
            header("Location: inicio.html"); // Redirecionar para a página inicial
            exit();
        } else {
            echo "<script>
                    alert('Senha inválida.');
                    window.location.href = 'conectarprofessor.html';
                  </script>";
        }
    } else {
        echo "<script>
                alert('Usuário não encontrado.');
                window.location.href = 'conectarprofessor.html';
              </script>";
    }
}

mysqli_close($con);
?>
