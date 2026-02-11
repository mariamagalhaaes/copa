<h2>Grupos</h2>

<a href="/copa/public/?controller=grupo&action=criar">
    <button>Novo Grupo</button>
</a>

<?php if (!empty($grupos)): ?>
    <table>
        <tr>
            <th>ID</th>
            <th>Grupo</th>
            <th>Ações</th>
        </tr>

        <?php foreach ($grupos as $grupo): ?>
            <tr>
                <td><?= $grupo['id'] ?></td>
                <td><?= isset($grupo['nome']) ? $grupo['nome'] : $grupo['grupo'] ?></td>
                <td>
                    <a href="/copa/public/?controller=grupo&action=excluir&id=<?= $grupo['id'] ?>">
                        Excluir
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>Nenhum grupo cadastrado.</p>
<?php endif; ?>
