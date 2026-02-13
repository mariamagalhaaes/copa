<?php
require_once BASE_PATH . '/app/models/Usuario.php';

class UsuarioController {
    private $usuario;

    public function __construct() {
        $this->usuario = new Usuario(); // ok aqui, fora do model
    }

    public function listar() {
        $usuarios = $this->usuario->listar();
        include BASE_PATH . '/app/views/usuario/listar.php';
    }

    public function criar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->usuario->criar($_POST['nome'], $_POST['idade'], $_POST['cargo'], $_POST['selecao_id']);
            header("Location: ?controller=usuario&action=listar");
            exit;
        }
        include BASE_PATH . '/app/views/usuario/criar.php';
    }

    public function editar($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->usuario->editar($id, $_POST['nome'], $_POST['idade'], $_POST['cargo'], $_POST['selecao_id']);
            header("Location: ?controller=usuario&action=listar");
            exit;
        }
        $usuario = $this->usuario->buscar($id);
        include BASE_PATH . '/app/views/usuario/editar.php';
    }

    public function excluir($id) {
        $this->usuario->excluir($id);
        header("Location: ?controller=usuario&action=listar");
        exit;
    }
}
?>

?>