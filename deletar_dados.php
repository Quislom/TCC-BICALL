<?php
    // Inclui o arquivo de conexão com o banco de dados
    include_once 'conexao_bd.php';

    // Verifica se a conexão foi bem-sucedida
    if (!$con) {
        die("Conexão falhou: " . mysqli_connect_error());
    }

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");

    // Verifica se o campo de CPF foi preenchido no formulário
    if ($_POST['cpf'] != "") {
        // Armazena o CPF enviado pelo formulário em uma variável
        $cpf_excluir = $_POST['cpf'];

        // Cria a instrução SQL para excluir o registro com o CPF especificado
        $sql_excluir = "DELETE FROM tb_alunos WHERE cpf = '$cpf_excluir'";

        // Executa a instrução SQL no banco de dados
        $query_excluir = mysqli_query($con, $sql_excluir);

        // Verifica se a exclusão foi bem-sucedida
        if ($query_excluir) {
            // Exibe uma mensagem de sucesso e redireciona para a página de exclusão
            echo "<script>alert('Dados excluídos com sucesso!');</script>";
            header("Location: apagaraluno.html");
        } else {
            // Exibe uma mensagem de erro se a exclusão falhar
            echo "<script>alert('Erro ao excluir dados.');</script>";
        }
    } else {
        // Exibe uma mensagem se o CPF não foi fornecido no formulário
        echo "CPF não fornecido para exclusão.";
    }
?>
