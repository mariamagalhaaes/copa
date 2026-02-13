<?php

require_once __DIR__ . '/../models/Jogo.php';
require_once __DIR__ . '/../models/Selecao.php';

class JogoController
{
    public function listar()
    {
        $model = new Jogo();
        $jogos = $model->listar();

        require_once __DIR__ . '/../views/jogo/listar.php';
    }

    public function criar()
    {
        $selecaoModel = new Selecao();
        $selecoes = $selecaoModel->listar();

        require_once __DIR__ . '/../views/jogo/criar.php';
    }

 public function salvar()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $selecao_mandante  = $_POST['selecao_mandante']  ?? null;
        $selecao_visitante = $_POST['selecao_visitante'] ?? null;
        $data              = $_POST['data']              ?? null;
        $horario           = $_POST['horario']           ?? null;
        $estadio           = $_POST['estadio']           ?? null;
        $grupo             = $_POST['grupo']             ?? null;

        if (
            !$selecao_mandante ||
            !$selecao_visitante ||
            !$data ||
            !$horario ||
            !$estadio ||
            !$grupo
        ) {
            die("Erro: Todos os campos são obrigatórios.");
        }

        $model = new Jogo();
        $model->criar(
            $selecao_mandante,
            $selecao_visitante,
            $data,
            $horario,
            $estadio,
            $grupo
        );

        header("Location: index.php?controller=jogo&action=listar");
        exit;
    }

    die("Requisição inválida.");
}
}
  

?>