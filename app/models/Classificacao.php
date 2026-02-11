<?php

require_once BASE_PATH . "/app/models/Database.php";

class Classificacao
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::conectar();
    }

    public function listarPorGrupo($grupoId)
    {
        $sql = "SELECT * FROM selecoes
                WHERE grupo_id = :grupo
                ORDER BY pontos DESC, saldo_gols DESC, gols_marcados DESC";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([":grupo" => $grupoId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>