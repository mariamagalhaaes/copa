<h1>Novo Jogo</h1>

<form method="POST" action="index.php?controller=jogo&action=salvar">

    <label>Seleção Mandante:</label>
    <select name="selecao_mandante" required>
        <?php foreach ($selecoes as $s): ?>
            <option value="<?= $s['nome'] ?>">
                <?= $s['nome'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <br><br>

    <label>Seleção Visitante:</label>
    <select name="selecao_visitante" required>
        <?php foreach ($selecoes as $s): ?>
            <option value="<?= $s['nome'] ?>">
                <?= $s['nome'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <br><br>

    <label>Data:</label>
    <input type="date" name="data" required>

    <br><br>

    <label>Horário:</label>
    <input type="time" name="horario" required>

    <br><br>

    <label>Estádio:</label>
    <input type="text" name="estadio" required>

    <br><br>

    <label>Grupo:</label>
    <input type="text" name="grupo" required>

    <br><br>

    <button type="submit">Salvar</button>
</form>
