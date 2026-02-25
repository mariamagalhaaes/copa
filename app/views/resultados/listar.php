<h1>Resultados</h1>

<a href="index.php" class="btn">Voltar</a>

<table border="1">
    <tr>
        <th>Data/Hora</th>
        <th>Placar</th>
    </tr>

    <?php foreach ($resultados as $r): ?>
        <tr>
            <td><?= $r['data'] ?></td>
            <td><?= $r['mandante'] ?> <?= $r['gol_mandante'] ?> x <?= $r['gol_visitante'] ?> <?= $r['visitante'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>