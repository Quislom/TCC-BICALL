create database tcc;
use tcc;

CREATE TABLE  tb_alunos (
id int auto_increment primary key ,
  nome varchar(50) ,
  cursos varchar(50), 
  serie varchar(10),
  cpf char(11),
  datanasc date,
  endereco varchar(150),
  telefone char(11)
) ;

select * from tb_alunos