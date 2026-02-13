<?php
require_once BASE_PATH . '/app/models/Database.php';

class Usuario {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::conectar();
    }

    public function listar() {
        $stmt = $this->pdo->query(
            "SELECT u.id, u.nome, u.idade, u.cargo, s.nome AS selecao
             FROM usuario u
             LEFT JOIN selecoes s ON u.selecao_id = s.id
             ORDER BY u.nome"
        );
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function criar($nome, $idade, $cargo, $selecao_id) {
        $stmt = $this->pdo->prepare(
            "INSERT INTO usuario (nome, idade, cargo, selecao_id) VALUES (?, ?, ?, ?)"
        );
        return $stmt->execute([$nome, $idade, $cargo, $selecao_id]);
    }

    public function editar($id, $nome, $idade, $cargo, $selecao_id) {
        $stmt = $this->pdo->prepare(
            "UPDATE usuario SET nome = ?, idade = ?, cargo = ?, selecao_id = ? WHERE id = ?"
        );
        return $stmt->execute([$nome, $idade, $cargo, $selecao_id, $id]);
    }

    public function excluir($id) {
        $stmt = $this->pdo->prepare("DELETE FROM usuario WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function buscar($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM usuario WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
