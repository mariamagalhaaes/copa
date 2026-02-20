<?php

require_once __DIR__ . '/../models/Resultado.php';

class ResultadoController
{
    public function listar()
    {
        $resultadoModel = new Resultado();
        $resultados = $resultadoModel->listar();

        require_once __DIR__ . '/../views/resultados/listar.php';
    }

    public function registrar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $jogo_id = $_POST['jogo_id'];
            $gols_mandante = $_POST['gols_mandante'];
            $gols_visitante = $_POST['gols_visitante'];

            $resultadoModel = new Resultado();
            $resultadoModel->registrarResultado(
                $jogo_id,
                $gols_mandante,
                $gols_visitante
            );

            // Redireciona para listagem depois de salvar
            header("Location: index.php?controller=resultado&action=listar");
            exit;
        }
    }
    public function form()
    {
        require_once __DIR__ . '/../views/resultados/registrar.php';
    }
}