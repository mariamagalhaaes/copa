<h1>Grupos</h1>

<a href="index.php?controller=grupo&action=criar">Novo Grupo</a>

<ul>
    <?php foreach ($grupos as $g): ?>
        <li>
            Grupo <?= $g['grupo'] ?>
            |
            <a href="index.php?controller=grupo&action=visualizar&grupo=<?= $g['grupo'] ?>">
                Ver seleções
            </a>
        </li>
    <?php endforeach; ?>
</ul>
