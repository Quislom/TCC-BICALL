<?php
$host = "localhost:3306";
$user = "root";
$pass = "root";
$base = "tcc";
$con = mysqli_connect($host, $user, $pass, $base);

// Código para inserir novos dados


$nome = $_POST['cxnomealuno'];
$cursos = $_POST['curso'];
$serie = $_POST['serie'];



$sql = "UPDATE tb_alunos SET nome = '$nome', Cursos = '$cursos', serie = '$serie' WHERE id = 1";
$query = mysqli_query($con, $sql);

    echo "<script>
            alert ('Dados atualizados com sucesso');
          </script>";

    // Exibir dados após a inserção
    $res = mysqli_query($con, "select * from tb_alunos");
    echo "<table border=3px><tr><td> Código do Aluno</td><td> Nome do Aluno</td> <td>Curso do Aluno</td> <td> Serie do Aluno</td> </tr>";
    while ($escrever = mysqli_fetch_array($res)) {
        echo "</td><td> " . $escrever['id'] . "</td><td> " . $escrever['nome'] . "</td><td>" . $escrever['Cursos'] . "</td><td>" . $escrever['serie'] . "</td>   </tr>";
    }
    echo "</table>";
    echo "</br></br>";

?>