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
}