<?php

require_once "config/Database.php";

class Resultado {

    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function registrarResultado($jogo_id, $gols_mandante, $gols_visitante) {

        // Atualiza placar no jogo
        $sql = "UPDATE jogos 
                SET gols_mandante = ?, gols_visitante = ?
                WHERE id = ?";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iii", $gols_mandante, $gols_visitante, $jogo_id);
        $stmt->execute();

        // Buscar seleções do jogo
        $sqlJogo = "SELECT selecao_mandante_id, selecao_visitante_id 
                    FROM jogos WHERE id = ?";
        
        $stmtJogo = $this->conn->prepare($sqlJogo);
        $stmtJogo->bind_param("i", $jogo_id);
        $stmtJogo->execute();
        $resultadoJogo = $stmtJogo->get_result()->fetch_assoc();

        $mandante = $resultadoJogo['selecao_mandante_id'];
        $visitante = $resultadoJogo['selecao_visitante_id'];

        // Atualizar classificação
        $this->atualizarClassificacao($mandante, $gols_mandante, $gols_visitante);
        $this->atualizarClassificacao($visitante, $gols_visitante, $gols_mandante);
    }

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

        $sql = "UPDATE classificacao SET 
                pontos = pontos + ?, 
                vitorias = vitorias + ?, 
                empates = empates + ?, 
                derrotas = derrotas + ?, 
                gols_pro = gols_pro + ?, 
                gols_contra = gols_contra + ?, 
                saldo_gols = saldo_gols + ?
                WHERE selecao_id = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param(
            "iiiiiiii",
            $pontos,
            $vitorias,
            $empates,
            $derrotas,
            $gols_pro,
            $gols_contra,
            $saldo,
            $selecao_id
        );

        $stmt->execute();
    }
}