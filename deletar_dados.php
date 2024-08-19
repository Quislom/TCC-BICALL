<?php
if ($_POST['cpf'] != "") {
    include_once 'conexao_bd.php';
 
    $cpf_excluir = $_POST['cpf'];
 
    $sql_excluir = "DELETE FROM tb_alunos WHERE cpf = '$cpf_excluir'";
    $query_excluir = mysqli_query($conn, $sql_excluir);
 
    if ($query_excluir) {

        echo "<script>alert('Dados excluídos com sucesso!');</script>";

        header("Location: apagaraluno.html");


    } else {
        echo "<script>alert('Erro ao excluir dados.');</script>";
    }
} else {
    echo "cpf não fornecido para exclusão.";

    
}
?>
