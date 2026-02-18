<?php

require_once "models/Resultado.php";

class ResultadoController {

    public function registrar() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $jogo_id = $_POST['jogo_id'];
            $gols_mandante = $_POST['gols_mandante'];
            $gols_visitante = $_POST['gols_visitante'];

            $resultado = new Resultado();
            $resultado->registrarResultado($jogo_id, $gols_mandante, $gols_visitante);

            header("Location: index.php?controller=jogo&action=listar");
        }
    }
}
