<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
</head>

<body>
    <form action="cadastro_pdo.php" method="post">

        <label for="nome">Nome de usuário:</label>
        <br>
        <input type="text" id="nome" required="" name="nome">
        <br>
        <label for="senha">Sua senha:</label>
        <br>
        <input type="password" id="senha" required="" name="senha">
        <br>
        <button type="submit">Entrar</button>
        <br>
        <a href="cadastro.php">Não possuo uma conta</a>

    </form>    
</body>

</html>