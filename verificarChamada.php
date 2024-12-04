<?php
// Inicia a execução do PHP para processar os dados antes de gerar qualquer saída HTML
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
include 'conexao_bd.php';  // Certifique-se de que o caminho esteja correto

// Verifica se a conexão foi bem-sucedida
if (!$con) {
    die("Falha na conexão: " . mysqli_connect_error());
}

// Verifica se o formulário foi enviado (via método POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os valores de curso e série enviados pelo formulário e evita SQL Injection
    $curso = mysqli_real_escape_string($con, $_POST['curso']);
    $serie = mysqli_real_escape_string($con, $_POST['serie']);

    // Consulta o banco de dados para buscar os dados do aluno pelo curso e série
    $sql = "SELECT nome, Cursos, serie FROM tb_alunos WHERE Cursos = '$curso' AND serie = '$serie'";
    $result = mysqli_query($con, $sql);

    // Verifica se a consulta retornou algum resultado
    if ($result && mysqli_num_rows($result) > 0) {
        // Exibe os dados dos alunos em uma tabela HTML
        $tabela = "<table class='styled-table'>
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Curso</th>
                            <th>Série</th>
                        </tr>
                    </thead>
                    <tbody>";

        // Exibe os resultados encontrados
        while ($aluno = mysqli_fetch_assoc($result)) {
            $tabela .= "<tr>
                        <td>" . htmlspecialchars($aluno['nome']) . "</td> 
                        <td>" . htmlspecialchars($aluno['Cursos']) . "</td> 
                        <td>" . htmlspecialchars($aluno['serie']) . "</td> 
                    </tr>";
        }

        $tabela .= "</tbody></table>";
    } else {
        $tabela = "<p>Nenhum aluno encontrado para o curso e série informados.</p>";
    }
} else {
    $tabela = "<p>Por favor, envie o formulário.</p>";
}

// Fecha a conexão com o banco de dados após a execução
mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="./styles/padrao.css"/> <!-- Link para o estilo padrão -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados do Aluno</title>
    <style>
        /* estilo da exibição dos dados */
        .styled-table {
            width: 100%;
            table-layout: fixed;  /* Tenta forçar uma largura fixa */
            margin: 25px 0;
            font-size: 2em;
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
            background-color: #009879;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }
    </style>
</head>

<body>
    <div class="fundo">
        <div class="banner">
            <div class="blocoAmareloLinks">
                <div class="blocoAzulCima"></div>
                <div class="div1">
                    <div class="div2">
                        <p class="divTitulo">
                            <img src="img/logo.png" alt="Biometric Call Logo" class="logo">
                        </p>
                        <p class="titulo1">BIOMETRIC</p>
                        <p class="titulo2">CALL</p>
                    </div>
                    <p class="txtBanner"><a class="txtBanner" href="inicio.html">TELA PRINCIPAL</a></p>
                    <p class="txtBanner"><a class="txtBanner" href="atualizaraluno.html">ATUALIZAR DADOS</a></p>
                    <p class="txtBanner"><a class="txtBanner" href="cadastroAluno.html">CADASTRAR ALUNO</a></p>
                    <p class="txtBanner"><a class="txtBanner" href="apagaraluno.html">DESVINCULAR ALUNO</a></p>


                 
                </div>
                <div class="blocoAzulMeio"></div>
            </div>
        </div>

        <div class="">
            <!-- Exibe a tabela abaixo do banner -->
            <?php echo $tabela; ?>
        </div>
    </div>
</body>
</html>
