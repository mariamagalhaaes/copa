<h1>Classificação</h1>

<a href="index.php" class="btn">Voltar</a>

<table border="1">
    <tr>
        <th>Seleção</th>
        <th>Pontos</th>
        <th>Gols Marcados</th>
        <th>Gols Sofridos</th>
    </tr>

    <?php foreach ($classificacao as $c): ?>
        <tr>
            <td><?= $c['selecao'] ?></td>
            <td><?= $c['pontos'] ?></td>
            <td><?= $c['gols_marcados'] ?></td>
            <td><?= $c['gols_sofridos'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
