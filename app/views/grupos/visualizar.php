<h1>Seleções do Grupo</h1>

<?php if (count($selecoes) === 0): ?>
    <p>Nenhuma seleção neste grupo.</p>
<?php else: ?>
    <ul>
        <?php foreach ($selecoes as $s): ?>
            <li><?= $s['nome'] ?> (<?= $s['continente'] ?>)</li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<a href="index.php?controller=grupo&action=listar">Voltar</a>
