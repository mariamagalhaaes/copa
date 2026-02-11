<?php

require_once BASE_PATH . "/app/models/Selecao.php";
require_once BASE_PATH . "/app/models/Grupo.php";

class SelecaoController
{
    // LISTAR TODAS AS SELEÇÕES
    public function listar()
    {
        $selecao = new Selecao();
        $selecoes = $selecao->listar();

        require_once BASE_PATH . "/app/views/header.php";
        require_once BASE_PATH . "/app/views/selecao/listar.php";
        require_once BASE_PATH . "/app/views/footer.php";
    }

    // FORMULÁRIO PARA CRIAR
    public function criar()
    {
        $grupo = new Grupo();
        $grupos = $grupo->listar();

        require_once BASE_PATH . "/app/views/header.php";
        require_once BASE_PATH . "/app/views/selecao/criar.php";
        require_once BASE_PATH . "/app/views/footer.php";
    }

    // SALVAR NO BANCO
    public function salvar()
    {
        $nome = $_POST['nome'];
        $continente = $_POST['continente'];
        $grupo = $_POST['grupo'];

        $selecao = new Selecao();
        $selecao->criar($nome, $continente, $grupo);

        header("Location: /copa/public/?controller=selecao&action=listar");
        exit;
    }

    // EXCLUIR
    public function excluir()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $selecao = new Selecao();
            $selecao->excluir($id);
        }

        header("Location: /copa/public/?controller=selecao&action=listar");
        exit;
    }

    // CLASSIFICAÇÃO POR GRUPO
    public function classificacao()
    {
        if (!isset($_GET['grupo_id'])) {
            echo "Grupo não informado.";
            return;
        }

        $grupo_id = $_GET['grupo_id'];

        $selecao = new Selecao();
        $classificacao = $selecao->classificacao($grupo_id);

        require_once BASE_PATH . "/app/views/header.php";
        require_once BASE_PATH . "/app/views/selecao/classificacao.php";
        require_once BASE_PATH . "/app/views/footer.php";
    }
}
