<?php

require_once __DIR__ . '/../models/Selecao.php';
require_once __DIR__ . '/../models/Grupo.php';

class ClassificacaoController
{
    public function index()
    {
        $grupoModel = new Grupo();
        $grupos = $grupoModel->listar();

        require_once __DIR__ . '/../views/classificacao/index.php';
    }

    public function grupo()
    {
        if (!isset($_GET['grupo_id'])) {
            echo "Grupo não informado.";
            return;
        }

        $grupoId = $_GET['grupo_id'];

        $selecaoModel = new Selecao();
        $classificacao = $selecaoModel->classificacaoPorGrupo($grupoId);

        require_once __DIR__ . '/../views/classificacao/grupo.php';
    }
}
