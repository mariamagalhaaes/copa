<h1>Cadastrar Seleção</h1>

<form method="POST" action="index.php?controller=selecao&action=salvar">
    <label>Nome:</label>
    <input type="text" name="nome" required>

    <br><br>

    <label>Continente:</label>
    <input type="text" name="continente" required>

    <br><br>

    <label>Grupo:</label>
    <select name="grupo" required>
        <?php foreach ($grupos as $g): ?>
            <option value="<?= $g['grupo'] ?>">
                Grupo <?= $g['grupo'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <br><br>

    <button type="submit">Salvar</button>
</form>

<br>
<a href="index.php?controller=selecao&action=listar">Voltar</a>
