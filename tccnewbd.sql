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
 
create table alunosArquivados (
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
 
);
 
select * from tb_alunos
 
DELIMITER //
 
CREATE TRIGGER before_aluno_delete
BEFORE DELETE ON  tb_alunos
FOR EACH ROW
BEGIN
    INSERT INTO alunosArquivados (id, nome, datanasc,cursos,cpf,serie,endereco,telefone,complemento,bairro,cep)
    VALUES (OLD.id, OLD.nome, OLD.datanasc,OLD.cursos,OLD.cpf,OLD.serie,OLD.endereco,OLD.telefone,OLD.complemento,OLD.bairro,OLD.cep);
END //
 
DELIMITER ;
 
select * from alunosArquivados

-- Tabela para armazenar as digitais
CREATE TABLE  fingerprints (
    id INT AUTO_INCREMENT PRIMARY KEY,       -- Identificador único para cada digital
    fingerprint_data TEXT NOT NULL,          -- Dados da digital (salvos como string ou hash)
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- Data e hora do cadastro
);
 
