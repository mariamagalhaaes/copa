<h1>Classificação</h1>

<a href="index.php" class="btn">Voltar</a>

<table border="1">
    <tr>
        <th>Seleção</th>
        <th>Pontos</th>
        <th>Gols Marcados</th>
        <th>Gols Sofridos</th>
        <th>Saldo de Gols</th>
        <th>Vitórias</th>
        <th>Empates</th>
        <th>Derrotas</th>
    </tr>

    <?php foreach ($classificacao as $c): ?>
        <tr>
            <td><?= $c['selecao'] ?></td>
            <td><?= $c['pontos'] ?></td>
            <td><?= $c['gols_pro'] ?></td>
            <td><?= $c['gols_contra'] ?></td>
            <td><?= $c['saldo_gols'] ?></td>
            <td><?= $c['vitorias'] ?></td>
            <td><?= $c['empates'] ?></td>
            <td><?= $c['derrotas'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
