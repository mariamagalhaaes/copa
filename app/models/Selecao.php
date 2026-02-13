<?php

require_once __DIR__ . '/../config/Conexao.php';

class Selecao
{
    private $conn;

    public function __construct()
    {
        $this->conn = Conexao::conectar();
    }

    public function listar()
    {
        $sql = "SELECT * FROM selecoes ORDER BY nome";
        return $this->conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function criar($nome, $continente, $grupo)
    {
        $sql = "INSERT INTO selecoes (nome, continente, grupo) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$nome, $continente, $grupo]);
    }

    public function buscarPorId($id)
    {
        $sql = "SELECT * FROM selecoes WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizar($id, $nome, $continente, $grupo)
    {
        $sql = "UPDATE selecoes SET nome = ?, continente = ?, grupo = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$nome, $continente, $grupo, $id]);
    }

    public function excluir($id)
    {
        $sql = "DELETE FROM selecoes WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
    }
}
?>