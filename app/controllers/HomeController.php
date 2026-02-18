<?php

class HomeController
{
    public function index()
    {
        require_once BASE_PATH . "/app/views/header.php";
        require_once BASE_PATH . "/app/views/home.php";
        require_once BASE_PATH . "/app/views/footer.php";
    }
}
?>