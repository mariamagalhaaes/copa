<?php

<<<<<<< HEAD
require_once BASE_PATH . "/app/models/Jogo.php";
require_once BASE_PATH . "/app/models/Selecao.php";

=======
>>>>>>> c25055491f53ce4caba3557de3cfbbc85736d5c4
class JogoController
{
    public function listar()
    {
        $jogo = new Jogo();
<<<<<<< HEAD
        $jogos = $jogo->listar();

        require_once BASE_PATH . "/app/views/header.php";
        require_once BASE_PATH . "/app/views/jogo/listar.php";
=======
        $jogo = $jogo->listar();

        require_once BASE_PATH . "/app/views/header.php";
        require_once BASE_PATH . "/app/views/listar.php";
>>>>>>> c25055491f53ce4caba3557de3cfbbc85736d5c4
        require_once BASE_PATH . "/app/views/footer.php";
    }

    public function criar()
    {
<<<<<<< HEAD
        $selecao = new Selecao();
        $selecoes = $selecao->listar();

        require_once BASE_PATH . "/app/views/header.php";
        require_once BASE_PATH . "/app/views/jogo/criar.php";
=======
        require_once BASE_PATH . "/app/views/header.php";
        require_once BASE_PATH . "/app/views/criar.php";
>>>>>>> c25055491f53ce4caba3557de3cfbbc85736d5c4
        require_once BASE_PATH . "/app/views/footer.php";
    }

    public function salvar()
    {
<<<<<<< HEAD
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
=======
        $nome = $_POST['nome'];

        $jogo = new Jogo();
        $jogo->setNome($nome);
        $jogo->salvar();

        header("Location: /copa/public/?controller=jogo&action=listar");
    }

    public function excluir()
    {
        $id = $_GET['id'];

        $jogo = new Jogo();
        $jogo->excluir($id);

        header("Location: /copa/public/?controller=jogo&action=listar");
>>>>>>> c25055491f53ce4caba3557de3cfbbc85736d5c4
    }
}
