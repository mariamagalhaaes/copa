<h1>Editar Usuário</h1>

<form method="POST" action="index.php?controller=usuario&action=atualizar">

    <input type="hidden" name="id" value="<?= $usuario['id'] ?>">

    <label>Nome:</label>
    <input type="text" name="nome" value="<?= $usuario['nome'] ?>" required>

    <br><br>

    <label>Idade:</label>
    <input type="number" name="idade" value="<?= $usuario['idade'] ?>" required>

    <br><br>

    <label>Seleção:</label>
    <select name="selecao">
        <?php foreach ($selecoes as $s): ?>
            <option value="<?= $s['nome'] ?>"
                <?= $s['nome'] == $usuario['selecao'] ? 'selected' : '' ?>>
                <?= $s['nome'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <br><br>

    <label>Cargo:</label>
    <input type="text" name="cargo" value="<?= $usuario['cargo'] ?>" required>

    <br><br>

    <button type="submit">Atualizar</button>
</form>
