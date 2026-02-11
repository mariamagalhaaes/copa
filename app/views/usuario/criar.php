<h2>Cadastrar Usuário</h2>

<form method="post" action="/copa/public/?controller=usuario&action=salvar">

    <label>Nome</label><br>
    <input type="text" name="nome" required><br><br>

    <label>Idade</label><br>
    <input type="number" name="idade" required><br><br>

    <label>Cargo</label><br>
    <select name="cargo" required>
        <option value="">Selecione</option>
        <option value="Jogador">Jogador</option>
        <option value="Técnico">Técnico</option>
        <option value="Árbitro">Árbitro</option>
        <option value="Outro">Outro</option>
    </select><br><br>

    <label>Seleção</label><br>
    <select name="selecao" required>
        <option value="">Selecione</option>

        <?php foreach ($selecoes as $selecao): ?>
            <option value="<?= $selecao['id'] ?>">
                <?= $selecao['nome'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <br><br>

    <button type="submit">Salvar</button>
    <a href="/copa/public/?controller=usuario&action=listar">
        <button type="button">Cancelar</button>
    </a>

</form>
