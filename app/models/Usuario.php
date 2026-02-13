<?php

require_once BASE_PATH . "/app/models/Database.php";


class Usuario
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::conectar();
    }

    public function listar()
    {
        $sql = "SELECT u.*, s.nome AS selecao_nome
                FROM usuarios u
                LEFT JOIN selecoes s ON u.selecao = s.id
                ORDER BY u.nome";

         return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    

    }

    public function buscarPorId($id)
    {
        $sql = "SELECT * FROM usuarios WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function criar($nome, $idade, $selecaoId, $cargo)
    {
        $sql = "INSERT INTO usuarios (nome, idade, selecao_id, cargo)
                VALUES (?, ?, ?, ?)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome, $idade, $selecaoId, $cargo]);
    }

    public function atualizar($id, $nome, $idade, $selecaoId, $cargo)
    {
        $sql = "UPDATE usuarios
                SET nome = ?, idade = ?, selecao_id = ?, cargo = ?
                WHERE id = ?";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome, $idade, $selecaoId, $cargo, $id]);
    }

    public function excluir($id)
    {
        $sql = "DELETE FROM usuarios WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
    }
}

?>
