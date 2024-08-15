

<?php
$host = "localhost";
$user = "root";
$pass = "";
$base = "tcc";

// Conecta ao banco de dados
$con = mysqli_connect($host, $user, $pass, $base);

// Verifica a conexão
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitização dos dados de entrada
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $senha = mysqli_real_escape_string($con, $_POST['senha']);
    
    // Verifica se os campos estão preenchidos
    if (empty($email) || empty($senha)) {
        echo "Por favor, preencha todos os campos.";
    } else {
        // Consulta para verificar as credenciais
        $sql = "SELECT * FROM tb_professores WHERE email='$email' AND senha='$senha'";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) == 1) {
            // Login bem-sucedido
            header("Location: index.html");
                        // Redirecionar para uma página protegida ou inicial
            // header("Location: pagina_protegida.php");
            exit();
        } else {
            // Credenciais inválidas
            echo "Email ou senha inválidos.";
        }
    }
}

// Fecha a conexão
mysqli_close($con);
?>
