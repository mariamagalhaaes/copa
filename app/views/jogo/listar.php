<h2>Jogos</h2>

<a href="/copa/public/?controller=jogo&action=criar">
    <button>Novo Jogo</button>
</a>

<?php if (!empty($jogos)): ?>
    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Mandante</th>
            <th>Visitante</th>
            <th>Placar</th>
            <th>Ações</th>
        </tr>

        <?php foreach ($jogos as $jogo): ?>
            <tr>
                <td><?= $jogo['id'] ?></td>
                <td><?= $jogo['mandante_nome'] ?></td>
                <td><?= $jogo['visitante_nome'] ?></td>
                <td>
                    <?= $jogo['gols_mandante'] ?? 0 ?>
                    x
                    <?= $jogo['gols_visitante'] ?? 0 ?>
                </td>
                <td>
                    <form method="post" action="/copa/public/?controller=jogo&action=resultado" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $jogo['id'] ?>">
                        <input type="number" name="gols_mandante" placeholder="GM" required style="width:60px;">
                        <input type="number" name="gols_visitante" placeholder="GV" required style="width:60px;">
                        <button type="submit">Salvar Resultado</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>Nenhum jogo cadastrado.</p>
<?php endif; ?>
