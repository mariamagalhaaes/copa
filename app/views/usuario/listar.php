<h2>Usuários</h2>

<a href="/copa/public/?controller=usuario&action=criar">
    <button>Novo Usuário</button>
</a>

<?php if (!empty($usuarios)): ?>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Idade</th>
            <th>Cargo</th>
            <th>Seleção</th>
            <th>Ações</th>
        </tr>

        <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?= $usuario['id'] ?></td>
                <td><?= $usuario['nome'] ?></td>
                <td><?= $usuario['idade'] ?></td>
                <td><?= $usuario['cargo'] ?></td>
                <td><?= $usuario['selecao_nome'] ?? '-' ?></td>
                <td>
                    <a href="/copa/public/?controller=usuario&action=excluir&id=<?= $usuario['id'] ?>">
                        Excluir
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>Nenhum usuário cadastrado.</p>
<?php endif; ?>
