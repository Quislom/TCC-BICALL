<?php
if ($_POST['cx_apag_cod'] != "") {
    include_once 'conexao_bd.php';
 
    $id_excluir = $_POST['cx_apag_cod'];
 
    $sql_excluir = "DELETE FROM tb_alunos WHERE id = '$id_excluir'";
    $query_excluir = mysqli_query($conn, $sql_excluir);
 
    if ($query_excluir) {
        echo "<script>alert('Dados excluídos com sucesso!');</script>";
    } else {
        echo "<script>alert('Erro ao excluir dados.');</script>";
    }
} else {
    echo "ID não fornecido para exclusão.";

    
}
?>
