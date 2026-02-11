<?php

require_once BASE_PATH . "/app/models/Grupo.php";

class GrupoController
{
    public function listar()
    {
        $grupo = new Grupo();
        $grupos = $grupo->listar();

        require_once BASE_PATH . "/app/views/header.php";
        require_once BASE_PATH . "/app/views/grupos/listar.php";
        require_once BASE_PATH . "/app/views/footer.php";
    }

    public function criar()
    {
        require_once BASE_PATH . "/app/views/header.php";
        require_once BASE_PATH . "/app/views/grupos/criar.php";
        require_once BASE_PATH . "/app/views/footer.php";
    }

    public function salvar()
    {
        $grupo = new Grupo();
        $grupo->salvar($_POST['nome']);

        header("Location: /copa/public/?controller=grupo&action=listar");
        exit;
    }

    public function excluir()
    {
        $grupo = new Grupo();
        $grupo->excluir($_GET['id']);

        header("Location: /copa/public/?controller=grupo&action=listar");
        exit;
    }
}
?>