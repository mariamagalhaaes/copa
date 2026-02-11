<h2>Lista de Grupos</h2>

<a href="/copa/public/?controller=grupo&action=criar">
    <button>Novo Grupo</button>
</a>

<?php if (count($grupos) > 0): ?>
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


<h2>Lista de Jogos</h2>

<a href="/copa/public/?controller=jogo&action=criar">
    <button>Novo Jogo</button>
</a>

<?php if (count($jogos) > 0): ?>
    <table>
        <tr>
            <th>ID</th>
            <th>Mandante</th>
            <th>Visitante</th>
            <th>Data e Horário</th>
            <th>Estádio</th>
            <th>Fase</th>
            <th>Ações</th>
        </tr>

        <?php foreach ($jogos as $jogo): ?>
            <tr>
                <td><?= $jogo['id'] ?></td>
                <td><?= $jogo['mandante'] ?></td>
                <td><?= $jogo['visitante'] ?></td>
                <td><?= $jogo['data_hora'] ?></td>
                <td><?= $jogo['estadio'] ?></td>
                <td><?= $jogo['fase'] ?></td>
                <td>
                    <a href="/copa/public/?controller=jogo&action=excluir&id=<?= $jogo['id'] ?>">
                        Excluir
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>Nenhum jogo cadastrado.</p>
<?php endif; ?>