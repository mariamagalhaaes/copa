<?php

require_once __DIR__ . '/../models/Selecao.php';
require_once __DIR__ . '/../models/Grupo.php';

class SelecaoController
{
    public function listar()
    {
        $model = new Selecao();
        $selecoes = $model->listar();

        require_once __DIR__ . '/../views/selecao/listar.php';
    }

    public function criar()
    {
        $grupoModel = new Grupo();
        $grupos = $grupoModel->listar();

        require_once __DIR__ . '/../views/selecao/criar.php';
    }

    public function salvar()
    {
        $model = new Selecao();
        $model->criar(
            $_POST['nome'],
            $_POST['continente'],
            $_POST['grupo']
        );

        header("Location: index.php?controller=selecao&action=listar");
        exit;
    }

    public function editar()
    {
        $model = new Selecao();
        $selecao = $model->buscarPorId($_GET['id']);

        $grupoModel = new Grupo();
        $grupos = $grupoModel->listar();

        require_once __DIR__ . '/../views/selecao/editar.php';
    }

    public function atualizar()
    {
        $model = new Selecao();
        $model->atualizar(
            $_POST['id'],
            $_POST['nome'],
            $_POST['continente'],
            $_POST['grupo']
        );

        header("Location: index.php?controller=selecao&action=listar");
        exit;
    }

    public function excluir()
    {
        $model = new Selecao();
        $model->excluir($_GET['id']);

        header("Location: index.php?controller=selecao&action=listar");
        exit;
    }
}
?>