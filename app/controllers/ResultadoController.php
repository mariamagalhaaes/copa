<?php

require_once __DIR__ . '/../models/Resultado.php';

class ResultadoController
{
    // Listar todos os resultados de jogos
    public function listar()
    {
        $resultadoModel = new Resultado();
        $resultados = $resultadoModel->listar();

        require_once __DIR__ . '/../views/resultados/listar.php';
    }

    // Formulário para registrar resultado
    public function form()
    {
        require_once __DIR__ . '/../views/resultados/registrar.php';
    }

    // Registrar resultado no banco
    public function registrar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Cria o Model
            $resultadoModel = new Resultado();

            // Chama o método do Model que já pega $_POST
            $resultadoModel->registrar();

            // Redireciona para a listagem após salvar
            header("Location: index.php?controller=resultado&action=listar");
            exit;
        } else {
            // Se não for POST, mostra o formulário
            $this->form();
        }
    }
}