<h1>Editar Seleção</h1>

<form method="POST" action="index.php?controller=selecao&action=atualizar">
    <input type="hidden" name="id" value="<?= $selecao['id'] ?>">

    <label>Nome:</label>
    <input type="text" name="nome" value="<?= $selecao['nome'] ?>" required>

    <br><br>

    <label>Continente:</label>
    <input type="text" name="continente" value="<?= $selecao['continente'] ?>" required>

    <br><br>

    <label>Grupo:</label>
    <select name="grupo">
        <?php foreach ($grupos as $g): ?>
            <option value="<?= $g['grupo'] ?>" <?= $g['grupo'] == $selecao['grupo'] ? 'selected' : '' ?>>
                Grupo <?= $g['grupo'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <br><br>

    <button type="submit">Atualizar</button>
</form>

<br>
<a href="index.php?controller=selecao&action=listar">Voltar</a>
