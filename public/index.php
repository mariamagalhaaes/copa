<?php
define('BASE_PATH', dirname(__DIR__));

$controller = $_GET['controller'] ?? 'usuario';
$action = $_GET['action'] ?? 'listar';

$controllerName = ucfirst($controller) . 'Controller';
$controllerFile = BASE_PATH . "/app/controllers/$controllerName.php";

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $obj = new $controllerName();
    if (method_exists($obj, $action)) {
        $obj->$action();
    } else {
        echo "Ação não encontrada.";
    }
} else {
    echo "Controller não encontrado.";
}
?>
<link rel="stylesheet" href="css/style.css">
