<?php
require_once BASE_PATH . '/app/models/Database.php';

class Usuario {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getConnection();
    }

    public function listar() {
        $sql = "SELECT u.id, u.nome, u.idade, u.cargo, s.nome AS selecao
                FROM usuario u
                LEFT JOIN selecoes s ON u.selecao = s.id
                ORDER BY u.nome";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function criar($nome, $idade, $cargo, $selecao) {
        $sql = "INSERT INTO usuario (nome, idade, cargo, selecao) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome, $idade, $cargo, $selecao]);
    }

    public function buscar($id) {
        $sql = "SELECT * FROM usuario WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function editar($id, $nome, $idade, $cargo, $selecao) {
        $sql = "UPDATE usuario SET nome=?, idade=?, cargo=?, selecao=? WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome, $idade, $cargo, $selecao, $id]);
    }

    public function excluir($id) {
        $sql = "DELETE FROM usuario WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
