<?php
// Conexão com o banco de dados
include 'conexao_bd.php'; // Certifique-se de que o caminho esteja correto

// Verifica a conexão
if (!$con) {
    die("<script>alert('Erro ao conectar ao banco de dados.'); window.location.href='cadastroAluno.html';</script>");
}

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitização dos dados de entrada
    $nome = mysqli_real_escape_string($con, $_POST['txtBoxNomeA']);
    $cursos = mysqli_real_escape_string($con, $_POST['curso']);
    $serie = mysqli_real_escape_string($con, $_POST['serie']);
    $cpf = mysqli_real_escape_string($con, $_POST['cpf']);
    $datanasc = mysqli_real_escape_string($con, $_POST['datanasc']);
    $cep = mysqli_real_escape_string($con, $_POST['cep']);
    $endereco = mysqli_real_escape_string($con, $_POST['endereco']);
    $bairro = mysqli_real_escape_string($con, $_POST['bairro']);
    $complemento = mysqli_real_escape_string($con, $_POST['complemento']);
    $telefone = mysqli_real_escape_string($con, $_POST['telefone']);

    // Verifica duplicidade no banco de dados
    $sql_check = "SELECT * FROM tb_alunos WHERE cpf = '$cpf' OR nome = '$nome'";
    $res_check = mysqli_query($con, $sql_check);

    if (mysqli_num_rows($res_check) > 0) {
        echo "<script>
                alert('CPF ou Nome já cadastrado no sistema. Por favor, verifique os dados.');
                window.location.href='cadastroAluno.html';
              </script>";
        exit;
    }

    // Verifica se todos os campos estão preenchidos
    if (empty($nome) || empty($cursos) || empty($serie) || empty($cpf) || empty($datanasc) || empty($cep) || empty($endereco) || empty($bairro) || empty($telefone)) {
        echo "<script>
                alert('Por favor, preencha todos os campos obrigatórios.');
                window.location.href='cadastroAluno.html';
              </script>";
        exit;
    }

    // Insere os dados no banco de dados
    $sql = "INSERT INTO tb_alunos (nome, cursos, serie, cpf, datanasc, cep, endereco, bairro, complemento, telefone) 
            VALUES ('$nome', '$cursos', '$serie', '$cpf', '$datanasc', '$cep', '$endereco', '$bairro', '$complemento', '$telefone')";

    if (mysqli_query($con, $sql)) {
        echo "<script>
                alert('Cadastro realizado com sucesso!');
                window.location.href='cadastroAluno.html';
              </script>";
    } else {
        echo "<script>
                alert('Erro ao cadastrar os dados: " . mysqli_error($con) . "');
                window.location.href='cadastroAluno.html';
              </script>";
    }
    exit;
}

// Exibir dados após a inserção (opcional, se necessário)
$res = mysqli_query($con, "SELECT * FROM tb_alunos");
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
            font-size: 1.5em;
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

        <!-- Aqui começa a exibição da tabela logo abaixo do banner -->
        <div class="tabela-dados">
            <?php
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
                                <th>CEP</th>
                                <th>Endereço</th>
                                <th>Bairro</th>
                                <th>Complemento</th>
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
                            <td>" . htmlspecialchars($escrever['cep']) . "</td>
                            <td>" . htmlspecialchars($escrever['endereco']) . "</td>
                            <td>" . htmlspecialchars($escrever['bairro']) . "</td>
                            <td>" . htmlspecialchars($escrever['complemento']) . "</td>
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
        </div>
    </div>
</body>
</html>
