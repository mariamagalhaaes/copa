<?php

require_once BASE_PATH . "/app/models/Database.php";

class Selecao
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::conectar();
    }

    public function listar()
    {
        $sql = "SELECT s.*, 
                       g.grupo AS grupo_nome
                FROM selecoes s
                LEFT JOIN grupos g ON s.grupo = g.id
                ORDER BY s.nome";

        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function criar($nome, $continente, $grupo)
    {
        $sql = "INSERT INTO selecoes (nome, continente, grupo) VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome, $continente, $grupo]);
    }

    public function excluir($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM selecoes WHERE id = ?");
        $stmt->execute([$id]);
    }

    public function classificacao($grupo)
    {
        $stmt = $this->pdo->prepare("
            SELECT * FROM selecoes
            WHERE grupo = ?
            ORDER BY pontos DESC, saldo_gols DESC, gols_pro DESC
        ");
        $stmt->execute([$grupo]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function atualizarEstatisticas($id, $gols_pro, $gols_contra, $resultado)
    {
        $pontos = 0;
        $v = 0; 
        $e = 0; 
        $d = 0;

        if ($resultado == 'V') { $pontos = 3; $v = 1; }
        if ($resultado == 'E') { $pontos = 1; $e = 1; }
        if ($resultado == 'D') { $d = 1; }

        $stmt = $this->pdo->prepare("
            UPDATE selecoes
            SET
                gols_pro = gols_pro + ?,
                gols_contra = gols_contra + ?,
                saldo_gols = saldo_gols + (? - ?),
                pontos = pontos + ?,
                vitorias = vitorias + ?,
                empates = empates + ?,
                derrotas = derrotas + ?
            WHERE id = ?
        ");

        $stmt->execute([
            $gols_pro,
            $gols_contra,
            $gols_pro,
            $gols_contra,
            $pontos,
            $v,
            $e,
            $d,
            $id
        ]);
    }
}
