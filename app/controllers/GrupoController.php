<?php

require_once __DIR__ . '/../models/Grupo.php';

class GrupoController
{
    public function listar()
    {
        $grupoModel = new Grupo();
        $grupos = $grupoModel->listar();

        require_once __DIR__ . '/../views/grupos/listar.php';
    }

    public function criar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $grupo = $_POST['grupo'];

            $grupoModel = new Grupo();
            $grupoModel->criar($grupo);

            header("Location: index.php?controller=grupo&action=listar");
            exit;
        }

        require_once __DIR__ . '/../views/grupos/criar.php';
    }

    public function excluir()
    {
        if (!isset($_GET['id'])) {
            header("Location: index.php?controller=grupo&action=listar");
            exit;
        }

        $grupoModel = new Grupo();
        $grupoModel->excluir($_GET['id']);

        header("Location: index.php?controller=grupo&action=listar");
        exit;
    }

    public function editar()
    {
        if (!isset($_GET['id'])) {
            header("Location: index.php?controller=grupo&action=listar");
            exit;
        }

        $grupoModel = new Grupo();
        $dados = $grupoModel->buscarPorId($_GET['id']);

        require_once __DIR__ . '/../views/grupos/editar.php';
    }

    public function atualizar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $grupoModel = new Grupo();
            $grupoModel->atualizar($_POST['id'], $_POST['grupo']);

            header("Location: index.php?controller=grupo&action=listar");
            exit;
        }
    }
}

?>