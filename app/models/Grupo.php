<?php

require_once __DIR__ . '/../config/Conexao.php';

class Grupo
{
    private $conn;
    private $table = "grupos";

    public function __construct()
    {
        $this->conn = Conexao::conectar();
    }

    public function listar()
    {
        $sql = "SELECT * FROM {$this->table} ORDER BY grupo";
        return $this->conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function criar($grupo)
    {
        $sql = "INSERT INTO {$this->table} (grupo) VALUES (:grupo)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":grupo", $grupo);
        return $stmt->execute();
    }

    public function excluir($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

    public function buscarPorId($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizar($id, $grupo)
    {
        $sql = "UPDATE {$this->table} SET grupo = :grupo WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":grupo", $grupo);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

    public function buscarPorGrupo($grupo)
    {
        $sql = "SELECT * FROM selecoes WHERE grupo = :grupo";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":grupo", $grupo);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>