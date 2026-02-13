<?php

require_once __DIR__ . '/../models/Usuario.php';
require_once __DIR__ . '/../models/Selecao.php';

class UsuarioController
{
    public function listar()
    {
        $model = new Usuario();
        $usuarios = $model->listar();

        require_once __DIR__ . '/../views/usuario/listar.php';
    }

    public function criar()
    {
        $selecaoModel = new Selecao();
        $selecoes = $selecaoModel->listar();

        require_once __DIR__ . '/../views/usuario/criar.php';
    }

    public function salvar()
    {
        $nome    = $_POST['nome']    ?? null;
        $idade   = $_POST['idade']   ?? null;
        $selecao = $_POST['selecao'] ?? null;
        $cargo   = $_POST['cargo']   ?? null;

        if (!$nome || !$idade || !$selecao || !$cargo) {
            die("Todos os campos são obrigatórios.");
        }

        $model = new Usuario();
        $model->criar($nome, $idade, $selecao, $cargo);

        header("Location: index.php?controller=usuario&action=listar");
        exit;
    }

    public function editar()
    {
        $model = new Usuario();
        $usuario = $model->buscarPorId($_GET['id']);

        $selecaoModel = new Selecao();
        $selecoes = $selecaoModel->listar();

        require_once __DIR__ . '/../views/usuario/editar.php';
    }

    public function atualizar()
    {
        $model = new Usuario();
        $model->atualizar(
            $_POST['id'],
            $_POST['nome'],
            $_POST['idade'],
            $_POST['selecao'],
            $_POST['cargo']
        );

        header("Location: index.php?controller=usuario&action=listar");
        exit;
    }

    public function excluir()
    {
        $model = new Usuario();
        $model->excluir($_GET['id']);

        header("Location: index.php?controller=usuario&action=listar");
        exit;
    }
}
