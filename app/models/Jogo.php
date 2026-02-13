<?php

require_once __DIR__ . '/../config/Conexao.php';

class Jogo
{
    private $conn;

    public function __construct()
    {
        $this->conn = Conexao::conectar();
    }

    public function listar()
    {
        $sql = "SELECT * FROM jogos ORDER BY id";
        return $this->conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function criar($mandante, $visitante, $data, $horario, $estadio, $grupo)
    {
        $sql = "INSERT INTO jogos 
            (selecao_mandante, selecao_visitante, data, horario, estadio, grupo)
            VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$mandante, $visitante, $data, $horario, $estadio, $grupo]);
    }
}

?>