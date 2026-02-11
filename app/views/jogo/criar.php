<h2>Cadastrar Seleção</h2>

<form method="post" action="/copa/public/?controller=selecao&action=salvar">

    <label>Nome da Seleção</label>
    <input type="text" name="nome" required>

    <label>Continente</label>
    <input type="text" name="continente" required>

    <label>Grupo</label>
    <select name="grupo" required>
        <option value="">Selecione</option>

        <?php foreach ($grupos as $grupo): ?>
            <option value="<?= $grupo['id'] ?>">
                <?= isset($grupo['nome']) ? $grupo['nome'] : $grupo['grupo'] ?>
            </option>
        <?php endforeach; ?>

    </select>

    <br><br>
    <button type="submit">Salvar</button>
</form>
