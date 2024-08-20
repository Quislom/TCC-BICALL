<?php
$host = "localhost";
$user = "root";  
$pass = "";    
$base = "tcc";    
 
$con = mysqli_connect($host, $user, $pass, $base);
 
if (!$con) {
    die("Erro na conexão: " . mysqli_connect_error());
} else {
    echo "Conexão realizada com sucesso!";
}
 
mysqli_close($con);
?>
