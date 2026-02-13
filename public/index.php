<link rel="stylesheet" href="css/style.css">
<?php


define('BASE_PATH', dirname(__DIR__));

require_once BASE_PATH . '/app/models/Database.php';

$controller = $_GET['controller'] ?? 'home';
$action = $_GET['action'] ?? 'index';

$controllerName = ucfirst($controller) . "Controller";
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