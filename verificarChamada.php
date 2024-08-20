<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados do Aluno</title>
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
    $host = "localhost";
    $user = "root";
    $pass = "";
    $base = "tcc";
    $con = mysqli_connect($host, $user, $pass, $base);

    // Verificar a conexão
    if (!$con) {
        die("Falha na conexão: " . mysqli_connect_error());
    }

    // Receber dados do formulário
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $cpf = mysqli_real_escape_string($con, $_POST['cpf']);

        // Buscar o aluno pelo CPF
        $sql = "SELECT nome, Cursos, serie FROM tb_alunos WHERE cpf = '$cpf'";
        $result = mysqli_query($con, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $aluno = mysqli_fetch_assoc($result);

            // Exibir os dados do aluno em uma tabela
            echo "<table class='styled-table'>
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Curso</th>
                            <th>Série</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>" . htmlspecialchars($aluno['nome']) . "</td>
                            <td>" . htmlspecialchars($aluno['Cursos']) . "</td>
                            <td>" . htmlspecialchars($aluno['serie']) . "</td>
                        </tr>
                    </tbody>
                </table>";
        } else {
            echo "<p>Aluno não encontrado.</p>";
        }
    } else {
        echo "<p>Por favor, envie o formulário.</p>";
    }

    // Fechar a conexão
    mysqli_close($con);
    ?>
</body>
</html>
