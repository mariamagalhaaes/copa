<h1>Usuários</h1>

<a href="index.php?controller=usuario&action=criar">Novo Usuário</a>

<table border="1">
<tr>
    <th>Nome</th>
    <th>Idade</th>
    <th>Seleção</th>
    <th>Cargo</th>
    <th>Ações</th>
</tr>

<?php foreach ($usuarios as $u): ?>
<tr>
    <td><?= $u['nome'] ?></td>
    <td><?= $u['idade'] ?></td>
    <td><?= $u['selecao'] ?></td>
    <td><?= $u['cargo'] ?></td>
    <td>
        <a href="index.php?controller=usuario&action=editar&id=<?= $u['id'] ?>">Editar</a>
        |
        <a href="index.php?controller=usuario&action=excluir&id=<?= $u['id'] ?>">Excluir</a>
    </td>
</tr>
<?php endforeach; ?>
</table>
