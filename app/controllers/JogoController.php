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
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $model = new Jogo();
            $model->criar(
                $_POST['mandante_id'],
                $_POST['visitante_id'],
                $_POST['data_jogo'],
                $_POST['estadio'],
                $_POST['grupo']
            );

            header("Location: index.php?controller=jogo&action=listar");
            exit;
        }
    }

    public function registrarResultado()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $model = new Jogo();
            $model->registrarResultado(
                $_POST['jogo_id'],
                $_POST['gols_mandante'],
                $_POST['gols_visitante']
            );

            header("Location: index.php?controller=jogo&action=listar");
            exit;
        }
    }
}
?>