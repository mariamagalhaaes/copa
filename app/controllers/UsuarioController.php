<?php
require_once BASE_PATH . '/app/models/Usuario.php';

class UsuarioController {
    private $usuario;

    public function __construct() {
        $this->usuario = new Usuario();
    }

public function listar() {
    $sql = "
        SELECT u.id, u.nome, u.idade, u.cargo, s.nome AS selecao
        FROM usuarios u
        LEFT JOIN selecoes s ON u.selecao_id = s.id
        ORDER BY u.nome
    ";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

    public function criar() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->usuario->criar($_POST['nome'], $_POST['idade'], $_POST['cargo'], $_POST['selecao_id']);
            header("Location: ?controller=usuario&action=listar");
            exit;
        }
        include BASE_PATH . '/app/views/usuario/criar.php';
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