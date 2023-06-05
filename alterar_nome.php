<?php
    include("conecta_pdo.php");
    session_start();

    $id_usuario = $_SESSION['id_usuario'];
    $nome_atual = $_SESSION['usuario'];

    // Entradas do usuário:
    $novo_nome = $_POST['novo_nome'];

    $sql = $pdo->prepare("UPDATE usuario SET nome = :nome WHERE id_usuario = $id_usuario");
    $sql->bindParam(':nome', $novo_nome);

    $executar_alterar = $sql->execute();

    if($executar_alterar === TRUE)
    {
        // Update deu certo:
        $_SESSION['usuario'] = $novo_nome;

        echo("<script type = text/javascript>");
            echo ("alert('Nome alterado!');");
        echo("</script>");
        header('Location: index.php');
    }
    else
    {
        // Update deu errado:
        echo("<script type = text/javascript>");
            echo ("alert('Falha ao alterar o nome!');");
        echo("</script>");
        header('Location: index.php');   
    }

?>