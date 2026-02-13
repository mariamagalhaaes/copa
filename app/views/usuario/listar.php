<h2>Usuários</h2>
<a href="index.php?pagina=usuario_cadastrar">Cadastrar Usuário</a>
<table border="1">
    <tr>
        <th>Nome</th>
        <th>Idade</th>
        <th>Cargo</th>
        <th>Seleção</th>
        <th>Ações</th>
    </tr>
    <?php foreach($usuarios as $u): ?>
    <tr>
        <td><?= $u['nome'] ?></td>
        <td><?= $u['idade'] ?></td>
        <td><?= $u['cargo'] ?></td>
        <td><?= $u['selecao'] ?></td>
        <td>
            <a href="index.php?pagina=usuario_editar&id=<?= $u['id'] ?>">Editar</a> | 
            <a href="index.php?pagina=usuario_excluir&id=<?= $u['id'] ?>" onclick="return confirm('Tem certeza?')">Excluir</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
