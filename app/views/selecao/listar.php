<h2>Seleções</h2>

<a href="/copa/public/?controller=selecao&action=criar">
    <button>Nova Seleção</button>
</a>

<?php if (!empty($selecoes)): ?>
    <table>
        <tr>
            <th>ID</th>
            <th>Seleção</th>
            <th>Continente</th>
            <th>Grupo</th>
            <th>Ações</th>
        </tr>

        <?php foreach ($selecoes as $selecao): ?>
            <tr>
                <td><?= $selecao['id'] ?></td>
                <td><?= $selecao['nome'] ?></td>
                <td><?= $selecao['continente'] ?></td>
                <td><?= $selecao['grupo_nome'] ?? '-' ?></td>
                <td>
                    <a href="/copa/public/?controller=selecao&action=excluir&id=<?= $selecao['id'] ?>">
                        Excluir
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>Nenhuma seleção cadastrada.</p>
<?php endif; ?>
