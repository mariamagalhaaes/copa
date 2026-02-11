CREATE DATABASE copa;
USE copa;

CREATE TABLE grupos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(1)
);

CREATE TABLE selecoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    continente VARCHAR(50),
    grupo_id INT,
    pontos INT DEFAULT 0,
    vitorias INT DEFAULT 0,
    empates INT DEFAULT 0,
    derrotas INT DEFAULT 0,
    gols_marcados INT DEFAULT 0,
    gols_sofridos INT DEFAULT 0,
    FOREIGN KEY (grupo_id) REFERENCES grupos(id)
);

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    idade INT,
    cargo VARCHAR(50),
    selecao_id INT,
    FOREIGN KEY (selecao_id) REFERENCES selecoes(id)
);

CREATE TABLE jogos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    mandante_id INT,
    visitante_id INT,
    data_hora DATETIME,
    estadio VARCHAR(100),
    fase VARCHAR(50),
    gols_mandante INT,
    gols_visitante INT,
    FOREIGN KEY (mandante_id) REFERENCES selecoes(id),
    FOREIGN KEY (visitante_id) REFERENCES selecoes(id)
);
