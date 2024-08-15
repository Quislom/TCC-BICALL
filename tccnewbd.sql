create database tcc;
use tcc;

CREATE TABLE  tb_alunos (
id int auto_increment primary key ,
  nome varchar(50) ,
  cursos varchar(50), 
  serie varchar(10),
  cpf char(11),
  datanasc date,
  cep char (8),
  endereco varchar(150),
  bairro varchar(150),
  complemento varchar(5),
  telefone varchar(20)
) ;

CREATE TABLE tb_professores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);


select * from tb_alunos