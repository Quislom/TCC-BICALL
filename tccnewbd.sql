create database tcc;
use tcc;

CREATE TABLE  tb_alunos (
id int auto_increment primary key ,
  nome varchar(50) ,
  Cursos varchar(50), 
  serie varchar(10)
) ;

select * from tb_alunos