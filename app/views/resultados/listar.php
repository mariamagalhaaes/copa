<h1>Resultados</h1>

<a href="index.php" class="btn">Voltar</a>

<table border="1">
    <tr>
        <th>Seleção</th>
        <th>Pontos</th>
        <th>Gols Marcados</th>
        <th>Gols Sofridos</th>
    </tr>

    <?php foreach ($resultados as $r): ?>
        <tr>
            <td><?= $r['selecao'] ?></td>
            <td><?= $r['pontos'] ?></td>
            <td><?= $r['gols_marcados'] ?></td>
            <td><?= $r['gols_sofridos'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>