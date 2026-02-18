
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
        ob_start(); // captura a saída da view
        $obj->$action();
        $content = ob_get_clean();
    } else {
        $content = "Ação não encontrada.";
    }
} else {
    $content = "Controller não encontrado.";
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Copa</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?= $content ?>
</body>
</html>

