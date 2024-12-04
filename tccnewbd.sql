-- Criação do banco de dados
CREATE DATABASE tcc;
USE tcc;

-- Tabela para armazenar os dados dos alunos
CREATE TABLE tb_alunos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50),
    cursos VARCHAR(50),
    serie VARCHAR(10),
    cpf CHAR(11),
    datanasc DATE,
    cep CHAR(8),
    endereco VARCHAR(150),
    bairro VARCHAR(150),
    complemento VARCHAR(5),
    telefone VARCHAR(20)
);

-- Tabela para armazenar os professores
CREATE TABLE tb_professores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);

-- Tabela para armazenar os alunos arquivados
CREATE TABLE alunosArquivados (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50),
    cursos VARCHAR(50),
    serie VARCHAR(10),
    cpf CHAR(11),
    datanasc DATE,
    cep CHAR(8),
    endereco VARCHAR(150),
    bairro VARCHAR(150),
    complemento VARCHAR(5),
    telefone VARCHAR(20)
);

-- Criação de uma trigger para arquivar alunos ao serem deletados da tabela de alunos
DELIMITER //
CREATE TRIGGER before_aluno_delete
BEFORE DELETE ON tb_alunos
FOR EACH ROW
BEGIN
    INSERT INTO alunosArquivados (id, nome, datanasc, cursos, cpf, serie, endereco, telefone, complemento, bairro, cep)
    VALUES (OLD.id, OLD.nome, OLD.datanasc, OLD.cursos, OLD.cpf, OLD.serie, OLD.endereco, OLD.telefone, OLD.complemento, OLD.bairro, OLD.cep);
END //
DELIMITER ;

-- Tabela para armazenar os registros de chamadas
CREATE TABLE tb_chamadas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    aluno_id INT NOT NULL,                   -- Relacionamento com a tabela de alunos
    data_chamada TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Data e hora da chamada
    FOREIGN KEY (aluno_id) REFERENCES tb_alunos(id)  -- Chave estrangeira
);

-- Tabela para armazenar os dados das impressões digitais
CREATE TABLE fingerprints (
    id INT AUTO_INCREMENT PRIMARY KEY,          -- Identificador único para cada digital
    fingerprint_data TEXT NOT NULL,             -- Dados da digital (salvos como string ou hash)
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- Data e hora do cadastro
);

-- Visualizar as tabelas
SELECT * FROM tb_alunos;
SELECT * FROM tb_professores;
SELECT * FROM tb_chamadas;
SELECT * FROM alunosArquivados;
SELECT * FROM fingerprints;