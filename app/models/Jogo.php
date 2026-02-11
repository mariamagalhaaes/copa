<?php

require_once BASE_PATH . "/app/models/Database.php";

class Jogo
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::conectar();
    }

    public function listar()
    {
        $sql = "SELECT j.*, 
                       s1.nome AS mandante_nome,
                       s2.nome AS visitante_nome
                FROM jogos j
                JOIN selecoes s1 ON j.mandante = s1.id
                JOIN selecoes s2 ON j.visitante = s2.id
                ORDER BY j.id";

        
    }

    public function registrarResultado($id, $golsMandante, $golsVisitante)
    {
        $sql = "UPDATE jogos 
                SET gols_mandante = :gm,
                    gols_visitante = :gv
                WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ":gm" => $golsMandante,
            ":gv" => $golsVisitante,
            ":id" => $id
        ]);

        $this->atualizarClassificacao($id, $golsMandante, $golsVisitante);
    }

    private function atualizarClassificacao($jogoId, $gm, $gv)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM jogos WHERE id = :id");
        $stmt->execute([":id" => $jogoId]);
        $jogo = $stmt->fetch(PDO::FETCH_ASSOC);

        $mandante = $jogo['mandante'];
        $visitante = $jogo['visitante'];

        $this->atualizarEstatisticas($mandante, $gm, $gv);
        $this->atualizarEstatisticas($visitante, $gv, $gm);

        if ($gm > $gv) {
            $this->addPontos($mandante, 3);
            $this->addVitoria($mandante);
            $this->addDerrota($visitante);
        } elseif ($gm < $gv) {
            $this->addPontos($visitante, 3);
            $this->addVitoria($visitante);
            $this->addDerrota($mandante);
        } else {
            $this->addPontos($mandante, 1);
            $this->addPontos($visitante, 1);
            $this->addEmpate($mandante);
            $this->addEmpate($visitante);
        }
    }

    private function atualizarEstatisticas($id, $golsPro, $golsContra)
    {
        $saldo = $golsPro - $golsContra;

        $sql = "UPDATE selecoes 
                SET gols_pro = gols_pro + :gp,
                    gols_contra = gols_contra + :gc,
                    saldo_gols = saldo_gols + :saldo
                WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ":gp" => $golsPro,
            ":gc" => $golsContra,
            ":saldo" => $saldo,
            ":id" => $id
        ]);
    }

    private function addPontos($id, $pontos)
    {
        $this->pdo
            ->prepare("UPDATE selecoes SET pontos = pontos + :p WHERE id = :id")
            ->execute([":p" => $pontos, ":id" => $id]);
    }

    private function addVitoria($id)
    {
        $this->pdo
            ->prepare("UPDATE selecoes SET vitorias = vitorias + 1 WHERE id = :id")
            ->execute([":id" => $id]);
    }

    private function addEmpate($id)
    {
        $this->pdo
            ->prepare("UPDATE selecoes SET empates = empates + 1 WHERE id = :id")
            ->execute([":id" => $id]);
    }

    private function addDerrota($id)
    {
        $this->pdo
            ->prepare("UPDATE selecoes SET derrotas = derrotas + 1 WHERE id = :id")
            ->execute([":id" => $id]);
    }
}
?>