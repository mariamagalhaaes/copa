<?php

require_once BASE_PATH . "/app/models/Jogo.php";
require_once BASE_PATH . "/app/models/Selecao.php";

class JogoController
{
    public function listar()
    {
        $jogo = new Jogo();
        $jogos = $jogo->listar();

        require_once BASE_PATH . "/app/views/header.php";
        require_once BASE_PATH . "/app/views/jogo/listar.php";
        require_once BASE_PATH . "/app/views/footer.php";
    }

    public function criar()
    {
        $selecao = new Selecao();
        $selecoes = $selecao->listar();

        require_once BASE_PATH . "/app/views/header.php";
        require_once BASE_PATH . "/app/views/jogo/criar.php";
        require_once BASE_PATH . "/app/views/footer.php";
    }

    public function salvar()
    {
        $jogo = new Jogo();
        $jogo->criar(
            $_POST['mandante'],
            $_POST['visitante'],
            $_POST['data_hora'],
            $_POST['estadio'],
            $_POST['fase']
        );

        header("Location: /copa/public/?controller=jogo&action=listar");
        exit;
    }

    public function resultado()
    {
        $jogo = new Jogo();
        $jogo->registrarResultado(
            $_POST['id'],
            $_POST['gols_mandante'],
            $_POST['gols_visitante']
        );

        header("Location: /copa/public/?controller=jogo&action=listar");
        exit;
    }
}
