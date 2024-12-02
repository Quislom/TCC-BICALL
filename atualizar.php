
<?php
include 'conexao_bd.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
// Receber dados do formulário
$cpf = $_POST['cpf'];
$nome = $_POST['cxnomealuno'];
$cursos = $_POST['curso'];
$serie = $_POST['serie'];

// Buscar o ID do aluno pelo CPF
$id_query = "SELECT id FROM tb_alunos WHERE cpf = '$cpf'";
$id_result = mysqli_query($con, $id_query);
if ($id_result && mysqli_num_rows($id_result) > 0) {
    $id_row = mysqli_fetch_assoc($id_result);
    $id = $id_row['id'];

    // Atualizar os dados do aluno
    $sql = "UPDATE tb_alunos SET nome = '$nome', cursos = '$cursos', serie = '$serie' WHERE id = $id";
    if (mysqli_query($con, $sql)) {
        echo "<script>
                alert('Operação realizada com sucesso');
                window.location.href = 'tabela-alunos.php'; // Atualiza a página para mostrar as mudanças
              </script>";
    } else {
        echo "<script>alert('Erro ao atualizar dados: " . mysqli_error($con) . "');</script>";
    }
} else {
    echo "<script>alert('Aluno não encontrado');</script>";
}

// Fechar a conexão
mysqli_close($con);
?>
