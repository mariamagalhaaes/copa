<h2>Cadastrar Seleção</h2>

<form method="post" action="/copa/public/?controller=selecao&action=salvar">

    <label>Nome da Seleção</label><br>
    <input type="text" name="nome" required><br><br>

    <label>Continente</label><br>
    <input type="text" name="continente" required><br><br>

    <label>Grupo</label><br>
    <select name="grupo" required>
        <option value="">Selecione o grupo</option>

        <?php foreach ($grupos as $grupo): ?>
            <option value="<?= $grupo['id'] ?>">
                <?= isset($grupo['nome']) ? $grupo['nome'] : $grupo['grupo'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <br><br>

    <button type="submit">Salvar</button>
    <a href="/copa/public/?controller=selecao&action=listar">
        <button type="button">Cancelar</button>
    </a>

</form>
