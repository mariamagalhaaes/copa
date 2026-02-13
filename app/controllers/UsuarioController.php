<?php
require_once __DIR__ . '/../models/Usuario.php';


class UsuarioController {
    private $usuario;

    public function __construct($pdo) {
    $this->usuario = new Usuario($pdo);
}


    public function listar() {
        $usuarios = $this->usuario->listar();
        include "views/usuario/listar.php";
    }

    public function cadastrar() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->usuario->cadastrar($_POST['nome'], $_POST['idade'], $_POST['cargo'], $_POST['selecao_id']);
            header("Location: index.php?pagina=usuario_listar");
            exit;
        }
        include "views/usuario/cadastrar.php";
    }

    public function editar($id) {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->usuario->editar($id, $_POST['nome'], $_POST['idade'], $_POST['cargo'], $_POST['selecao_id']);
            header("Location: index.php?pagina=usuario_listar");
            exit;
        }
        $usuario = $this->usuario->buscar($id);
        include "views/usuario/editar.php";
    }

    public function excluir($id) {
        $this->usuario->excluir($id);
        header("Location: index.php?pagina=usuario_listar");
        exit;
    }
}
?>