<?php
$host = "localhost:3306";
$user = "root";  
$pass = "root";    
$base = "tcc";    
 
 
$con = mysqli_connect($host, $user, $pass, $base);
 
 
if ($con) {
    $message = "Conexão Realizada com sucesso!";
} else {
    $message = "Erro na conexão: " . mysqli_connect_error();
}
 
 
mysqli_close($con);
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testar Conexão</title>
</head>
<body>
 
<script>
    alert("<?php echo $message; ?>");
</script>

