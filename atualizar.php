<?php
include 'conexao_bd.php'; // Conexão com o banco de dados

// Verifica a conexão
if (!$con) {
    die("<script>alert('Erro ao conectar ao banco de dados.'); window.location.href='cadastroAluno.html';</script>");
}

// Verifica se o formulário foi enviado
// Receber dados do formulário
$cpf = $_POST['cpf'];
$nome = $_POST['cxnomealuno'];
$cursos = $_POST['curso'];
$serie = $_POST['serie'];


// Atualizar dados no banco de dados
$sql = "UPDATE tb_alunos SET nome = '$nome', cursos = '$cursos', serie = '$serie' WHERE cpf = '$cpf'";
$result = mysqli_query($con, $sql);

if (!$result) {
    die("<script>alert('Erro ao atualizar os dados: " . mysqli_error($con) . "'); window.location.href='atualizaraluno.html';</script>");
}

// Buscar todos os alunos para exibição
$sql = "SELECT * FROM tb_alunos";
$result = mysqli_query($con, $sql);

if (!$result) {
    die("<script>alert('Erro ao buscar os dados: " . mysqli_error($con) . "');</script>");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<link rel="stylesheet" href="./styles/padrao.css">
<style>
    /* estilo da exibição dos dados */
    .styled-table {
        width: 100%;
        table-layout: fixed;
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

    <!-- Cabeçalho igual ao anterior -->
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
                    <p class="txtBanner"><a class="txtBanner" href="verificarchamada.html">VERIFICAR CHAMADA</a></p>
                </div>
                <div class="blocoAzulMeio"></div>
            </div>
        </div>

        <!-- Aqui começa a exibição da tabela logo abaixo do banner -->
        <div class="tabela-dados">
    <!-- Conteúdo da página -->
    <div class="tabela-dados">
        <?php
        if (mysqli_num_rows($result) > 0) {
            echo "<table class='styled-table'>
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Curso</th>
                            <th>Série</th>
                            <th>CPF</th>
                            <th>Data de Nascimento</th>
                        </tr>
                    </thead>
                    <tbody>";

            while ($row = mysqli_fetch_assoc($result)) {
                $datanasc_formatada = date('d-m-Y', strtotime($row['datanasc']));
                echo "<tr>
                        <td>" . htmlspecialchars($row['nome']) . "</td>
                        <td>" . htmlspecialchars($row['cursos']) . "</td>
                        <td>" . htmlspecialchars($row['serie']) . "</td>
                        <td>" . htmlspecialchars($row['cpf']) . "</td>
                        <td>" . $datanasc_formatada . "</td>
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
</body>
</html>
