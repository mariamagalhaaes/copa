<?php

require_once(__DIR__ . '/../config/Conexao.php');

class Resultado {

    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // 🔹 REGISTRAR RESULTADO DO JOGO
    public function registrarResultado($jogo_id, $gol_mandante, $gol_visitante) {

        // Insere resultado na tabela 'resultados'
        $sql = "INSERT INTO resultado (jogo_id, gol_mandante, gol_visitante)
            VALUES (?, ?, ?)";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$jogo_id, $gol_mandante, $gol_visitante]);

        // Buscar seleções do jogo com JOIN para pegar os IDs
        $sqlJogo = "SELECT s_mandante.id AS id_mandante, s_visitante.id AS id_visitante
                    FROM jogos j
                    JOIN selecoes s_mandante ON j.selecao_mandante = s_mandante.nome
                    JOIN selecoes s_visitante ON j.selecao_visitante = s_visitante.nome
                    WHERE j.id = ?";
        
        $stmtJogo = $this->conn->prepare($sqlJogo);
        $stmtJogo->execute([$jogo_id]);
        $resultadoJogo = $stmtJogo->fetch(PDO::FETCH_ASSOC);

        $mandante_id = $resultadoJogo['id_mandante'];
        $visitante_id = $resultadoJogo['id_visitante'];

        // Atualizar classificação com os IDs das seleções
        $this->atualizarClassificacao($mandante_id, $gol_mandante, $gol_visitante);
        $this->atualizarClassificacao($visitante_id, $gol_visitante, $gol_mandante);
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

        // INSERT ... ON DUPLICATE KEY UPDATE para inserir ou atualizar
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
        $stmt->execute([$selecao_id, $pontos, $vitorias, $empates, $derrotas, $gols_pro, $gols_contra, $saldo]);
    }
    public function listar() {
        $sql = "SELECT j.id,
                        j.data,
                        j.horario,
                        s_mandante.nome AS mandante,
                        s_visitante.nome AS visitante,
                        r.gol_mandante,
                        r.gol_visitante
                FROM resultado r
                JOIN jogos j ON r.jogo_id = j.id
                JOIN selecoes s_mandante ON j.selecao_mandante = s_mandante.nome
                JOIN selecoes s_visitante ON j.selecao_visitante = s_visitante.nome
                ORDER BY j.data DESC";

        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function classificacao() {

        $sql = "SELECT DISTINCT s.nome, c.*
                FROM classificacao c
                JOIN selecoes s ON c.selecao = s.id
                GROUP BY c.selecao
                ORDER BY c.pontos DESC, c.saldo_gols DESC";

        $stmt = $this->conn->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}