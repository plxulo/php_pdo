<?php
    include("conecta_pdo.php");
    session_start();
    // Armazenar valores das entradas do usuário:
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    // Validar se as entradas do usuário retornam algo do banco de dados:
    $sql = $pdo->prepare("SELECT id_usuario, nome, senha FROM usuario WHERE nome = :nome AND senha = :senha");
    $sql->bindParam(':nome', $nome); 
    $sql->bindParam(':senha', $senha); 

    $executar_validacao = $sql->execute();

    // Após a consulta, armazenar o valor do id_adm na sessão:
    $sql_id = $sql->fetch(PDO::FETCH_ASSOC);
    $id_usuario = $sql_id['id_usuario'];

    // Verficiar se a validação deu certo ou não:
    if($executar_validacao === TRUE)
    {
        // Validação deu certo:
        if ($sql->rowCount() > 0) {
            // Houve um retorno similar à entrada do usuário:
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            $_SESSION['id_usuario'] = $row['id_usuario'];
            $_SESSION['usuario'] = $row['nome'];
            $_SESSION['senha'] = $row['senha'];

            header('Location: index.php');
            exit();
        }
        else
        {
            // Não houve retorno no rowCount:
            unset($_SESSION['usuario']);
            unset($_SESSION['id_usuario']);

            echo ("<script type = text/javascript>");
            echo ("alert('Nome de usuário ou senha incorretos, tente novamente.');");
            echo ("window.location = 'login.php'");
            echo ("</script>");    
            exit();
        }
    }
    // Validação deu errado:
    else
    {
        unset($_SESSION['usuario']);
        unset($_SESSION['id_usuario']);

        echo ("<script type = text/javascript>");
        echo ("alert('A validação falhou, tente novamente.');");
        echo ("window.location = 'login.php'");
        echo ("</script>");    
        exit();
    }
?>