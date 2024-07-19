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
    $host = "localhost";
    $user = "root";
    $pass = "";
    $base = "tcc";
    $con = mysqli_connect($host, $user, $pass, $base);

    // Verifica a conexão
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Verifica se o formulário foi submetido
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Sanitização dos dados de entrada
        $nome = mysqli_real_escape_string($con, $_POST['txtBoxNomeA']);
        $cursos = mysqli_real_escape_string($con, $_POST['curso']);
        $serie = mysqli_real_escape_string($con, $_POST['serie']);
        $cpf = mysqli_real_escape_string($con, $_POST['cpf']);
        $datanasc = mysqli_real_escape_string($con, $_POST['datanasc']);
        $endereco = mysqli_real_escape_string($con, $_POST['endereco']);
        $telefone = mysqli_real_escape_string($con, $_POST['telefone']);

        // Verifica se todos os campos estão preenchidos
        if (empty($nome) || empty($cursos) || empty($serie) || empty($cpf) || empty($datanasc) || empty($endereco) || empty($telefone)) {
            echo "Por favor, preencha todos os campos.";
        } else {
            // Insere os dados no banco de dados
            $sql = "INSERT INTO tb_alunos (nome, cursos, serie, cpf, datanasc, endereco, telefone) 
                    VALUES ('$nome', '$cursos', '$serie', '$cpf', '$datanasc', '$endereco', '$telefone')";
            
            if (!mysqli_query($con, $sql)) {
                echo "Erro ao cadastrar os dados: " . mysqli_error($con);
            }
        }
    }

    // Exibir dados após a inserção
    $res = mysqli_query($con, "SELECT * FROM tb_alunos");
    if (mysqli_num_rows($res) > 0) {
        echo "<table class='styled-table'>
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Curso</th>
                        <th>Série</th>
                        <th>CPF</th>
                        <th>Data de Nascimento</th>
                        <th>Endereço</th>
                        <th>Telefone</th>
                    </tr>
                </thead>
                <tbody>";
        
        while ($escrever = mysqli_fetch_array($res)) {
            echo "<tr>
                    <td>" . htmlspecialchars($escrever['id']) . "</td>
                    <td>" . htmlspecialchars($escrever['nome']) . "</td>
                    <td>" . htmlspecialchars($escrever['cursos']) . "</td>
                    <td>" . htmlspecialchars($escrever['serie']) . "</td>
                    <td>" . htmlspecialchars($escrever['cpf']) . "</td>
                    <td>" . htmlspecialchars($escrever['datanasc']) . "</td>
                    <td>" . htmlspecialchars($escrever['endereco']) . "</td>
                    <td>" . htmlspecialchars($escrever['telefone']) . "</td>
                  </tr>";
        }
        
        echo "</tbody></table>";
    } else {
        echo "<p>Nenhum dado encontrado.</p>";
    }

    // Fechar a conexão
    mysqli_close($con);
    ?>
</body>
</html>
