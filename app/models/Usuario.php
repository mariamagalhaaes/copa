<?php

require_once __DIR__ . '/../config/Conexao.php';

class Usuario
{
    private $conn;

    public function __construct()
    {
        $this->conn = Conexao::conectar();
    }

    public function listar()
    {
        $sql = "SELECT * FROM usuarios ORDER BY id";
        return $this->conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function criar($nome, $idade, $selecao, $cargo)
    {
        $sql = "INSERT INTO usuarios (nome, idade, selecao, cargo)
                VALUES (?, ?, ?, ?)";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$nome, $idade, $selecao, $cargo]);
    }

    public function buscarPorId($id)
    {
        $sql = "SELECT * FROM usuarios WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizar($id, $nome, $idade, $selecao, $cargo)
    {
        $sql = "UPDATE usuarios 
                SET nome = ?, idade = ?, selecao = ?, cargo = ?
                WHERE id = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$nome, $idade, $selecao, $cargo, $id]);
    }

    public function excluir($id)
    {
        $sql = "DELETE FROM usuarios WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
    }
}
?>