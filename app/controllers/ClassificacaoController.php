<?php

require_once __DIR__ . '/../models/Resultado.php';

class ClassificacaoController
{
    public function listar()
    {
        $resultadoModel = new Resultado();
        $classificacao = $resultadoModel->classificacao();

        require_once __DIR__ . '/../views/classificacao/listar.php';
    }
}
