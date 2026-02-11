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

       
    }

    public function criar($nome, $idade, $cargo, $selecao)
    {
        $sql = "INSERT INTO usuarios (nome, idade, cargo, selecao)
                VALUES (?, ?, ?, ?)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome, $idade, $cargo, $selecao]);
    }

    public function excluir($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM usuarios WHERE id = ?");
        $stmt->execute([$id]);
    }
}
