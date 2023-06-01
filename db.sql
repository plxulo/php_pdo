CREATE DATABASE teste_pdo;
USE teste_pdo;

CREATE TABLE usuario 
(
    id_usuario INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(90),
    email VARCHAR(90),
    senha VARCHAR(90)
)