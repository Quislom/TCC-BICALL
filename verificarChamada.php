<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Define o conjunto de caracteres para a página -->
    <meta charset="UTF-8">
    <!-- Configura a visualização para dispositivos móveis (responsividade) -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados do Aluno</title>

    <style>
        /* Estilo para a tabela */
        .styled-table {
            width: 100%; /* A tabela ocupa 100% da largura da página */
            border-collapse: collapse; /* Remove espaçamento entre as células */
            margin: 25px 0; /* Margem superior e inferior da tabela */
            font-size: 1em; /* Tamanho da fonte */
            font-family: Arial, sans-serif; /* Fonte da tabela */
            border-radius: 5px; /* Bordas arredondadas */
            overflow: hidden; /* Esconde qualquer conteúdo fora da borda da tabela */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15); /* Sombra para efeito de profundidade */
        }

        /* Estilo para as células da tabela */
        .styled-table th,
        .styled-table td {
            padding: 12px 15px; /* Preenchimento dentro das células */
            text-align: center; /* Alinhamento centralizado do texto */
            border-bottom: 1px solid #ddd; /* Linha de separação entre as células */
        }

        /* Estilo para os cabeçalhos da tabela */
        .styled-table th {
            background-color: #009879; /* Cor de fundo verde para os cabeçalhos */
            color: #fff; /* Cor do texto branco */
        }

        /* Estilo para as linhas pares da tabela (linhas alternadas) */
        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3; /* Cor de fundo para linhas pares */
        }

        /* Estilo para a última linha da tabela */
        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879; /* Linha mais forte na parte inferior */
        }
    </style>
</head>
<body>

    <?php
    // Dados de conexão com o banco de dados
    $host = "localhost"; // Host do banco de dados
    $user = "root"; // Usuário do banco de dados
    $pass = ""; // Senha do banco de dados
    $base = "tcc"; // Nome do banco de dados

    // Conecta ao banco de dados
    $con = mysqli_connect($host, $user, $pass, $base);

    // Verifica se a conexão foi bem-sucedida
    if (!$con) {
        // Se falhar, exibe uma mensagem de erro e para a execução do código
        die("Falha na conexão: " . mysqli_connect_error());
    }

    // Verifica se o formulário foi enviado (via método POST)
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recebe o CPF enviado pelo formulário e evita SQL Injection
        $cpf = mysqli_real_escape_string($con, $_POST['cpf']);

        // Consulta o banco de dados para buscar os dados do aluno pelo CPF
        $sql = "SELECT nome, Cursos, serie FROM tb_alunos WHERE cpf = '$cpf'";
        $result = mysqli_query($con, $sql);

        // Verifica se a consulta retornou algum resultado
        if ($result && mysqli_num_rows($result) > 0) {
            // Extrai os dados do aluno encontrados
            $aluno = mysqli_fetch_assoc($result);

            // Exibe os dados do aluno em uma tabela HTML
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
                            <td>" . htmlspecialchars($aluno['nome']) . "</td> <!-- Exibe o nome do aluno -->
                            <td>" . htmlspecialchars($aluno['Cursos']) . "</td> <!-- Exibe o curso do aluno -->
                            <td>" . htmlspecialchars($aluno['serie']) . "</td> <!-- Exibe a série do aluno -->
                        </tr>
                    </tbody>
                </table>";
        } else {
            // Caso não encontre o aluno, exibe uma mensagem
            echo "<p>Aluno não encontrado.</p>";
        }
    } else {
        // Caso o formulário não tenha sido enviado, exibe uma mensagem
        echo "<p>Por favor, envie o formulário.</p>";
    }

    // Fecha a conexão com o banco de dados após a execução
    mysqli_close($con);
    ?>

</body>
</html>
