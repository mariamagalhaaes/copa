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
    public function excluir() {
        $id = $_GET['id'];
        $this->grupo->excluir($id);
        header("Location: index.php?page=grupos");
    }
    public function visualizar()
    {
        if (!isset($_GET['grupo'])) {
            header("Location: index.php?controller=grupo&action=listar");
            exit;
        }

        $grupoModel = new Grupo();
        $selecoes = $grupoModel->buscarPorGrupo($_GET['grupo']);

        require_once __DIR__ . '/../views/grupos/visualizar.php';
    }

        public function atualizar() {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $this->grupo->atualizar($id, $nome);
        header("Location: index.php?page=grupos");
    }

}

?>