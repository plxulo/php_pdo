<?php
    session_start();
    if((!isset ($_SESSION['usuario']) == true) and (!isset ($_SESSION['senha']) == true))
    {
      header('location: cadastro.php');
    }
  
    $logado = $_SESSION['usuario'];
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
    <header>
        <h1>Bem vindo, <?php echo $logado ?>!</h1>
        <a href="logout.php">Sair da conta</a>
    </header>
</body>

</html>