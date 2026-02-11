<?php

class JogoController
{
    public function listar()
    {
        $jogo = new Jogo();
        $jogo = $jogo->listar();

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
    }
}
