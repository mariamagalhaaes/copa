<h1>Seleções</h1>

<a href="index.php?controller=selecao&action=criar">Nova Seleção</a>
<a href="index.php" class="btn">Voltar para Home</a>

<hr>

<?php if (count($selecoes) == 0): ?>
    <p>Nenhuma seleção cadastrada.</p>
<?php else: ?>
    <ul>
        <?php foreach ($selecoes as $s): ?>
            <li>
                <?= $s['nome'] ?> |
                <?= $s['continente'] ?> |
                Grupo <?= $s['grupo'] ?>
                |
                <a href="index.php?controller=selecao&action=editar&id=<?= $s['id'] ?>">Editar</a>
                |
                <a href="index.php?controller=selecao&action=excluir&id=<?= $s['id'] ?>">Excluir</a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
