<?php

require_once(__DIR__ . '/../config/Conexao.php');

class Resultado {

    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function registrar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $jogo_id = $_POST['jogo_id'];
            $gols_mandante = $_POST['gols_mandante'];
            $gols_visitante = $_POST['gols_visitante'];

            // Atualiza placar no jogo
            $sql = "UPDATE jogos 
                    SET gols_mandante = :gols_mandante, 
                        gols_visitante = :gols_visitante
                    WHERE id = :id";
            
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':gols_mandante', $gols_mandante);
            $stmt->bindParam(':gols_visitante', $gols_visitante);
            $stmt->bindParam(':id', $jogo_id);
            $stmt->execute();

            // Buscar seleções do jogo
            $sqlJogo = "SELECT s_mandante.id AS id_mandante, 
                               s_visitante.id AS id_visitante
                        FROM jogos j
                        JOIN selecoes s_mandante 
                            ON j.selecao_mandante = s_mandante.nome
                        JOIN selecoes s_visitante 
                            ON j.selecao_visitante = s_visitante.nome
                        WHERE j.id = ?";

            $stmtJogo = $this->conn->prepare($sqlJogo);
            $stmtJogo->execute([$jogo_id]);
            $resultadoJogo = $stmtJogo->fetch(PDO::FETCH_ASSOC);

            if (!$resultadoJogo) {
                die("Jogo não encontrado.");
            }

            $mandante_id = $resultadoJogo['id_mandante'];
            $visitante_id = $resultadoJogo['id_visitante'];

            // Atualizar classificação
            $this->atualizarClassificacao($mandante_id, $gols_mandante, $gols_visitante);
            $this->atualizarClassificacao($visitante_id, $gols_visitante, $gols_mandante);

            // Redireciona após registrar
            header("Location: index.php?controller=resultado&action=listar");
            exit;
        }
    }

    // 🔹 ATUALIZA CLASSIFICAÇÃO
    private function atualizarClassificacao($selecao_id, $gols_pro, $gols_contra) {

        $pontos = 0;
        $vitorias = 0;
        $empates = 0;
        $derrotas = 0;

        if ($gols_pro > $gols_contra) {
            $pontos = 3;
            $vitorias = 1;
        } elseif ($gols_pro == $gols_contra) {
            $pontos = 1;
            $empates = 1;
        } else {
            $derrotas = 1;
        }

        $saldo = $gols_pro - $gols_contra;

        $sql = "INSERT INTO classificacao 
                (selecao, pontos, vitorias, empates, derrotas, jogos, gols_pro, gols_contra, saldo_gols) 
                VALUES (?, ?, ?, ?, ?, 1, ?, ?, ?)
                ON DUPLICATE KEY UPDATE 
                    pontos = pontos + VALUES(pontos),
                    vitorias = vitorias + VALUES(vitorias),
                    empates = empates + VALUES(empates),
                    derrotas = derrotas + VALUES(derrotas),
                    jogos = jogos + 1,
                    gols_pro = gols_pro + VALUES(gols_pro),
                    gols_contra = gols_contra + VALUES(gols_contra),
                    saldo_gols = saldo_gols + VALUES(saldo_gols),
                    updated_at = CURRENT_TIMESTAMP";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([
            $selecao_id,
            $pontos,
            $vitorias,
            $empates,
            $derrotas,
            $gols_pro,
            $gols_contra,
            $saldo
        ]);
    }

    public function classificacao() {
        $sql = "SELECT *
                FROM classificacao
                ORDER BY pontos DESC, saldo_gols DESC";

        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Listar resultados de jogos
    public function listar() {
        $sql = "SELECT * FROM jogos ORDER BY data, horario";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}