<h1>Jogos Cadastrados</h1>

<a href="index.php?controller=jogo&action=criar">Novo Jogo</a>

<table border="1">
<tr>
    <th>Mandante</th>
    <th>Visitante</th>
    <th>Data</th>
    <th>Horário</th>
    <th>Estádio</th>
    <th>Grupo</th>
</tr>

<?php foreach ($jogos as $j): ?>
<tr>
    <td><?= $j['selecao_mandante'] ?></td>
    <td><?= $j['selecao_visitante'] ?></td>
    <td><?= $j['data'] ?></td>
    <td><?= $j['horario'] ?></td>
    <td><?= $j['estadio'] ?></td>
    <td><?= $j['grupo'] ?></td>
</tr>
<?php endforeach; ?>
</table>
