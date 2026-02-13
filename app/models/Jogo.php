<?php

class JogoController
{
    public function listar()
    {
        $jogo = new Jogo();
        $jogos = $jogo->listar();

        require_once BASE_PATH . "/app/views/header.php";
        require_once BASE_PATH . "/app/views/listar.php";
        require_once BASE_PATH . "/app/views/footer.php";
    }

    public function criar()
    {
        require_once BASE_PATH . "/app/views/header.php";
        require_once BASE_PATH . "/app/views/criar.php";
        require_once BASE_PATH . "/app/views/footer.php";
    }

    public function salvar()
    {
        $mandante   = $_POST['mandante'];
        $visitante  = $_POST['visitante'];
        $dataHora   = $_POST['data_hora'];
        $estadio    = $_POST['estadio'];
        $fase       = $_POST['fase'];

        $jogo = new Jogo();
        $jogo->setMandante($mandante);
        $jogo->setVisitante($visitante);
        $jogo->setDataHora($dataHora);
        $jogo->setEstadio($estadio);
        $jogo->setFase($fase);

        $jogo->salvar();

        header("Location: /copa/public/?controller=jogo&action=listar");
    }

    public function excluir()
    {
        $id = $_GET['id'];

        $jogo = new Jogo();
        $jogo->excluir($id);

        header("Location: /copa/public/?controller=jogo&action=listar");
    }
}

?>