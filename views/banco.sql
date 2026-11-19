CREATE DATABASE empresa_db
USE empresa_db

CREATE TABLE funcionarios(
    id INT, PRIMARY KEY, AUTO_INCREMENT,
    nome VARCHAR(100), NOT NULL,
    email VARCHAR(150),  NOT NULL,
    salario DECIMAL (10, 2), NOT NULL,
    tipo VARCHAR(30),  NOT NULL
);

INSERT INTO funcionarios ('id', 'nome', 'email', 'salario', 'tipo_func');

DELETE funcionarios ('id');
