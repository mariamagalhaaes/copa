CREATE DATABASE copa;
USE copa;

-- Tabela de grupos
CREATE TABLE grupos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL
);

-- Tabela de seleções
CREATE TABLE selecoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    continente VARCHAR(50) NOT NULL,
    grupo_id INT,
    FOREIGN KEY (grupo_id) REFERENCES grupos(id)
);

-- Tabela de jogos
CREATE TABLE jogos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    selecao1_id INT,
    selecao2_id INT,
    gols1 INT DEFAULT 0,
    gols2 INT DEFAULT 0,
    data_jogo DATE,
    FOREIGN KEY (selecao1_id) REFERENCES selecoes(id),
    FOREIGN KEY (selecao2_id) REFERENCES selecoes(id)
);

-- tabela de usuario 

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    idade INT NOT NULL,
    cargo VARCHAR(50) NOT NULL,
    selecao INT
);


-- Inserindo grupos
INSERT INTO grupos (nome) VALUES ('A'), ('B'), ('C'), ('D');

-- Inserindo seleções
INSERT INTO selecoes (nome, continente, grupo_id) VALUES
('Brasil', 'América do Sul', 1),
('Argentina', 'América do Sul', 1),
('França', 'Europa', 2),
('Alemanha', 'Europa', 2);

-- Inserindo jogo exemplo
INSERT INTO jogos (selecao1_id, selecao2_id, gols1, gols2, data_jogo)
VALUES (1, 2, 2, 1, '2026-06-10');


