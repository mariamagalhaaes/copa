<?php

class GrupoController
{
    public function listar()
    {
        $grupo = new Grupo();
        $grupos = $grupo->listar();

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

        $grupo = new Grupo();
        $grupo->setNome($nome);
        $grupo->salvar();

        header("Location: /copa/public/?controller=grupo&action=listar");
    }

    public function excluir()
    {
        $id = $_GET['id'];

        $grupo = new Grupo();
        $grupo->excluir($id);

        header("Location: /copa/public/?controller=grupo&action=listar");
    }
}
