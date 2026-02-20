<?php require_once BASE_PATH . "/app/views/header.php"; ?>

<h2>Bem-vindo ao Sistema da Copa do Mundo</h2>
<p>Gerencie seleções, usuários, grupos, jogos e acompanhe a classificação.</p>

<br><br>

<div>
    <a href="index.php?controller=resultado&action=index">
        <button>Registrar Resultado</button>
    </a>

    <a href="index.php?controller=classificacao&action=index">
        <button>Ver Classificação</button>
    </a>
</div>

<?php require_once BASE_PATH . "/app/views/footer.php"; ?>