<link rel="stylesheet" href="css/style.css">
<?php


define('BASE_PATH', dirname(__DIR__));

require_once BASE_PATH . '/app/models/Database.php';
require_once BASE_PATH . '/app/models/Usuario.php';

class UsuarioController {
    private $usuario;

    public function __construct() {
        $pdo = Database::getConnection(); // pega PDO dentro do próprio controller
        $this->usuario = new Usuario($pdo);
    }

    public function listar() {
        $usuarios = $this->usuario->listar();
        include BASE_PATH . '/app/views/usuario/listar.php';
    }

    public function cadastrar() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->usuario->cadastrar($_POST['nome'], $_POST['idade'], $_POST['cargo'], $_POST['selecao_id']);
            header("Location: ?controller=usuario&action=listar");
            exit;
        }
        include BASE_PATH . '/app/views/usuario/cadastrar.php';
    }

    public function editar($id) {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
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