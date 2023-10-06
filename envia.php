<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./assets/css/envia.css">
    <title>recebe</title>
</head>
<body>  
<a href="index.html">
    <input type="button" value="VOLTAR PARA PÁGINA INICIAL">
</a>
<?php
$conexao = mysqli_connect("localhost", "root", "", "form");
if (!$conexao) {
}

if(isset($_POST["email"])) {
    // Verifica se o email existe na db
    $email = $_POST["email"];
    $email = mysqli_real_escape_string($conexao, $email);

    $sql = "SELECT email FROM form.dados WHERE email='$email'";
    $retorno = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($retorno) > 0) {
        // Email já existe, mostra a mensagem de erro e sai do script
        echo "<div class='errorEmail'>
            <img src='assets/imgs/erroremail.png' alt='Email já cadastrado'>
            <h1>Email já cadastrado</h1>
            <p>Este email já está cadastrado no nosso sistema,<br>tente um email diferente.</p>
        </div>";
        exit();
    } else {
        // Email não existe, insere-o no banco de dados
        $email = $_POST["email"];
        $stmt = mysqli_prepare($conexao, "INSERT INTO form.dados (email) VALUES (?)");
        mysqli_stmt_bind_param($stmt, "s", $email);

        if (mysqli_stmt_execute($stmt)) {
            // Inserção bem-sucedida
            echo "<div class='imagesend'><img src='assets/imgs/ilustration.png' alt='Email enviado'></div>
                <h1 class='titlesend'>Email enviado!</h1>
                <p class='sbtittle'>Por motivos de segurança, enviamos-lhe um email<br>que contém um link para atualizar as suas<br>preferências.</p>";
        } else {
            // Erro na inserção
            echo "Erro ao inserir o email no banco de dados: " . mysqli_error($conexao);
        }
        

        mysqli_stmt_close($stmt);
    }
}
?>
</div>
<script src="./assets/js/script.js"></script>
</body>
</html>