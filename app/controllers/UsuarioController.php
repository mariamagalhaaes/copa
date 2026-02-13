<?php


require_once __DIR__ . '/../models/Usuario.php';
require_once __DIR__ . '/../models/Selecao.php';

class UsuarioController
{
    public function listar()
    {
        $usuarioModel = new Usuario();
        $usuarios = $usuarioModel->listar();

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
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (
                empty($_POST['nome']) ||
                empty($_POST['idade']) ||
                empty($_POST['selecao_id']) ||
                empty($_POST['cargo'])
            ) {
                echo "Preencha todos os campos!";
                return;
            }

            $usuarioModel = new Usuario();
            $usuarioModel->criar(
                $_POST['nome'],
                $_POST['idade'],
                $_POST['selecao_id'],
                $_POST['cargo']
            );

            header("Location: index.php?controller=usuario&action=listar");
            exit;
        }
    }

    public function editar()
    {
        if (!isset($_GET['id'])) {
            echo "ID não informado.";
            return;
        }

        $usuarioModel = new Usuario();
        $usuario = $usuarioModel->buscarPorId($_GET['id']);

        $selecaoModel = new Selecao();
        $selecoes = $selecaoModel->listar();

        require_once __DIR__ . '/../views/usuario/editar.php';
    }

    public function atualizar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $usuarioModel = new Usuario();
            $usuarioModel->atualizar(
                $_POST['id'],
                $_POST['nome'],
                $_POST['idade'],
                $_POST['selecao_id'],
                $_POST['cargo']
            );

            header("Location: index.php?controller=usuario&action=listar");
            exit;
        }
    }

    public function excluir()
    {
        if (!isset($_GET['id'])) {
            echo "ID não informado.";
            return;
        }

        $usuarioModel = new Usuario();
        $usuarioModel->excluir($_GET['id']);

        header("Location: index.php?controller=usuario&action=listar");
        exit;
    }
}


?>