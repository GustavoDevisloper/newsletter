<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>recebe</title>
</head>
<body>  
<?php

$conexao = mysqli_connect("localhost", "root", "", "form");
if(!$conexao){
    echo"Não conectado";
}
echo "Conectado ao banco";

////Verifica se o email existe na db
$email = $_POST['email'];
$email = mysqli_real_escape_string($conexao, $email);

$sql = "SELECT email FROM form.dados WHERE email='$email'";
$retorno = mysqli_query($conexao, $sql);

if(mysqli_num_rows($retorno)>0){
    echo"Email ja cadastrado!<br>";
    echo"<a href='index.html'>VOLTAR</a>";
}else{

$email = $_POST['email'];


$sql = "INSERT INTO form.dados(email) values('$email')";
$resultado = mysqli_query($conexao, $sql);
echo">>EMAIL CADASTRADO COM SUCESSO!<BR>";
echo"<a href='index.html'>VOLTAR</a>";
}

?>
</body>
</html>