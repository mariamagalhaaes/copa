<h1>Novo Usuário</h1>

<form method="POST" action="index.php?controller=usuario&action=salvar">

    <label>Nome:</label>
    <input type="text" name="nome" required>

    <br><br>

    <label>Idade:</label>
    <input type="number" name="idade" required>

    <br><br>

    <label>Seleção:</label>
    <select name="selecao" required>
        <?php foreach ($selecoes as $s): ?>
            <option value="<?= $s['nome'] ?>">
                <?= $s['nome'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <br><br>

    <label>Cargo:</label>
    <input type="text" name="cargo" placeholder="Jogador, Técnico, Árbitro" required>

    <br><br>

    <button type="submit">Salvar</button>
</form>
