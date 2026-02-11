<?php

require_once BASE_PATH . "/app/models/Database.php";

class Grupo
{
    private $id;
    private $nome;
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::conectar();
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function listar()
{
    $sql = "SELECT * FROM grupos ORDER BY id";
    return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

public function salvar()
{
    $sql = "INSERT INTO grupos (grupo) VALUES (:grupo)";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(":nome", $this->nome);
    $stmt->execute();
}



    public function excluir($id) {
    {
        $sql = "DELETE FROM grupos WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
    }
}
}

?>
