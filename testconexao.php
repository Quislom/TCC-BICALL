<?php
$host = "localhost"; // Nome do hostname
$user = "root";  // Nome do usuário
$pass = "";  // Nome da senha
$base = "tcc"; // Nome da database   
 
//Variável de conexão
$con = mysqli_connect($host, $user, $pass, $base);
 
if (!$con) { //Apare mensagem de erro se a conexão falhar
    die("Erro na conexão: " . mysqli_connect_error());
} else {
    //Caso a conexão seja realizada com sucesso
    echo "Conexão realizada com sucesso!";
}
 //Fecha a conexão
mysqli_close($con);
?>
