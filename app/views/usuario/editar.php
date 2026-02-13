<h2>Editar Usuário</h2>
<form method="post">
    Nome: <input type="text" name="nome" value="<?= $usuario['nome'] ?>" required><br>
    Idade: <input type="number" name="idade" value="<?= $usuario['idade'] ?>" required><br>
    Cargo: <input type="text" name="cargo" value="<?= $usuario['cargo'] ?>" required><br>
    Seleção ID: <input type="number" name="selecao_id" value="<?= $usuario['selecao_id'] ?>" required><br>
    <button type="submit">Salvar</button>
</form>
<a href="?controller=usuario&action=listar">Voltar</a>
