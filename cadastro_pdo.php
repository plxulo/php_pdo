<?php
  session_start();
  include("conecta_pdo.php");

  // Armazenar as entradas do usuário:
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];

  // Variável $sql prepara uma inserção dentro do banco de dados:
  $sql = $pdo->prepare("INSERT INTO usuario (nome, email, senha) VALUES (?,?,?)");

  // bindParam(ordem na consulta, variável) para proteger o banco de dados de SQL injection:
  $sql->bindParam(1, $nome);
  $sql->bindParam(2, $email);
  $sql->bindParam(3, $senha);

  // Selecionar o id_usuario da última inserção:
  $query = $pdo->prepare("SELECT id_usuario FROM usuario ORDER BY id_usuario DESC LIMIT 1");
  $executar_insert = $sql->execute();
  $executar_query = $query->execute();

  // Após a consulta, armazenar o valor do id_adm na sessão:
  $query_id = $query->fetch(PDO::FETCH_ASSOC);
  $id_usuario = $query_id['id_usuario'];

  if($executar_insert === TRUE)
  {
    // Inserção bem sucedida:
    $_SESSION['id_usuario'] = $id_usuario;
    $_SESSION['usuario'] = $nome;
    $_SESSION['senha'] = $senha;
    header('Location: index.php');
  }
  else
  {
    // Inserção falhou:
    unset($_SESSION['usuario']);
    unset($_SESSION['id_usuario']);

    echo ("<script type = text/javascript>");
      echo ("alert('Erro ao cadastrar o usuário, por favor, tente novamente.');");
      echo ("window.location = 'cadastro.php'");
    echo ("</script>");    
  }

?>