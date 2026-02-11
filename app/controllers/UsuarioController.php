<?php

require_once BASE_PATH . "/app/models/Usuario.php";
require_once BASE_PATH . "/app/models/Selecao.php";

class UsuarioController
{
    public function listar()
    {
        $usuarioModel = new Usuario();
        $usuarios = $usuarioModel->listar();

        require_once BASE_PATH . "/app/views/usuario/listar.php";
    }

    public function criar()
    {
        $selecaoModel = new Selecao();
        $selecoes = $selecaoModel->listar();

        require_once BASE_PATH . "/app/views/usuario/criar.php";
    }

    public function salvar()
    {
        if ($_POST) {
            $nome = $_POST['nome'];
            $idade = $_POST['idade'];
            $cargo = $_POST['cargo'];
            $selecao_id = $_POST['selecao'];

            $usuarioModel = new Usuario();
            $usuarioModel->criar($nome, $idade, $cargo, $selecao_id);

            header("Location: /copa/public/?controller=usuario&action=listar");
        }
    }

    public function excluir()
    {
        if (isset($_GET['id'])) {
            $usuarioModel = new Usuario();
            $usuarioModel->excluir($_GET['id']);

            header("Location: /copa/public/?controller=usuario&action=listar");
        }
    }
}
