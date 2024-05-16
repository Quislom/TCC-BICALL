<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sua Página</title>
    <style>

        
        .styled-table {
            width: 100%;
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 1em;
            font-family: Arial, sans-serif;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
            
            
        }

        .styled-table th {
            background-color: #009879;
            color: #fff;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }
    </style>
</head>
<body>
    <?php
    $host = "localhost:3306";
    $user = "root";
    $pass = "";
    $base = "tcc";
    $con = mysqli_connect($host, $user, $pass, $base);

    // Código para inserir novos dados

    $nome = $_POST['txtBoxNomeA'];
    $cursos = $_POST['curso'];
    $serie = $_POST['serie'];

    $sql = "insert into tb_alunos ( nome, Cursos, serie) value ('$nome', '$cursos', '$serie')";
    $query = mysqli_query($con, $sql);

    echo "<script>
            alert ('Dados cadastrados com sucesso');
          </script>";

    // Exibir dados após a inserção
    $res = mysqli_query($con, "select * from tb_alunos");
    echo "<table class='styled-table'><tr><td> Código do Aluno</td><td> Nome do Aluno</td> <td>Curso do Aluno</td> <td> Serie do Aluno</td> </tr>";
    while ($escrever = mysqli_fetch_array($res)) {
        echo "</td><td> " . $escrever['id'] . "</td><td> " . $escrever['nome'] . "</td><td>" . $escrever['Cursos'] . "</td><td>" . $escrever['serie'] . "</td>   </tr>";
    }
    echo "</table>";
    echo "</br></br>";
    ?>
</body>
</html>
