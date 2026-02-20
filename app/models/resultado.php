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
                    SET gols_mandante = :gols_mandante, gols_visitante = :gols_visitante
                    WHERE id = :id";
            
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':gols_mandante', $gols_mandante);
            $stmt->bindParam(':gols_visitante', $gols_visitante);
            $stmt->bindParam(':id', $jogo_id);
            $stmt->execute();

            // Buscar seleções do jogo
            $sqlJogo = "SELECT selecao_mandante, selecao_visitante 
                        FROM jogos WHERE id = :id";
            
            $stmtJogo = $this->conn->prepare($sqlJogo);
            $stmtJogo->bindParam(':id', $jogo_id);
            $stmtJogo->execute();
            $resultadoJogo = $stmtJogo->fetch(PDO::FETCH_ASSOC);

            if (!$resultadoJogo) {
                echo "Erro: Jogo não encontrado. Verifique o ID enviado.";
                return;
            }

            $mandante = $resultadoJogo['selecao_mandante'];
            $visitante = $resultadoJogo['selecao_visitante'];

            // Atualizar classificação
            $this->atualizarClassificacao($mandante, $gols_mandante, $gols_visitante);
            $this->atualizarClassificacao($visitante, $gols_visitante, $gols_mandante);

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

        // Ajuste da coluna da tabela classificacao: selecao
        $sql = "UPDATE classificacao SET 
                pontos = pontos + :pontos, 
                vitorias = vitorias + :vitorias, 
                empates = empates + :empates, 
                derrotas = derrotas + :derrotas, 
                gols_pro = gols_pro + :gols_pro, 
                gols_contra = gols_contra + :gols_contra, 
                saldo_gols = saldo_gols + :saldo
                WHERE selecao = :selecao_id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':pontos', $pontos);
        $stmt->bindParam(':vitorias', $vitorias);
        $stmt->bindParam(':empates', $empates);
        $stmt->bindParam(':derrotas', $derrotas);
        $stmt->bindParam(':gols_pro', $gols_pro);
        $stmt->bindParam(':gols_contra', $gols_contra);
        $stmt->bindParam(':saldo', $saldo);
        $stmt->bindParam(':selecao_id', $selecao_id);

        $stmt->execute();
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