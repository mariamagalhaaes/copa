<?php

require_once __DIR__ . '/../config/Conexao.php';

class Grupo
{
    private $conn;

    public function __construct()
    {
        $this->conn = Conexao::conectar();
    }

    public function listar()
    {
        $sql = "SELECT * FROM grupos ORDER BY grupo";
        return $this->conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }


    public function criar($grupo)
    {
        $sql = "INSERT INTO grupos (grupo) VALUES (?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$grupo]);
    }

    
    public function excluir($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

    public function buscarPorGrupo($grupo)
    {
        $sql = "SELECT * FROM selecoes WHERE grupo = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$grupo]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
        public function atualizar($id, $nome) {
        $query = "UPDATE " . $this->table . " SET nome = :nome WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}

?>