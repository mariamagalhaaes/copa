<?php


ini_set('display_errors', 1);
error_reporting(E_ALL);

define('BASE_PATH', dirname(__DIR__));

spl_autoload_register(function ($class) {
    if (file_exists(BASE_PATH . "/app/controllers/$class.php")) {
        require_once BASE_PATH . "/app/controllers/$class.php";
    }

    if (file_exists(BASE_PATH . "/app/models/$class.php")) {
        require_once BASE_PATH . "/app/models/$class.php";
    }
});

$controller = isset($_GET['controller'])
    ? ucfirst($_GET['controller']) . "Controller"
    : null;

$action = isset($_GET['action'])
    ? $_GET['action']
    : null;

if (!$controller) {
    require_once BASE_PATH . "/app/views/home.php";
    exit;
}

if (class_exists($controller)) {
    $obj = new $controller();

    if ($action && method_exists($obj, $action)) {
        $obj->$action();
    } else {
        echo "Ação não encontrada";
    }
} else {
    echo "Controller não encontrado";
}


 ?>