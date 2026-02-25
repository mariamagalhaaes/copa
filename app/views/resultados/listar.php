<h1>Resultados</h1>

<a href="index.php" class="btn">Voltar</a>

<table border="1">
    <tr>
        <th>Data/Hora</th>
        <th>Placar</th>
    </tr>

    <?php foreach ($resultados as $r): ?>
        <tr>
<td><?= $r['selecao_mandante'] ?></td>
<td><?= $r['gols_mandante'] ?></td>
<td><?= $r['selecao_visitante'] ?></td>
<td><?= $r['gols_visitante'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>