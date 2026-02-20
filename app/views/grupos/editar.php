<h1>Editar Grupo</h1>

<form method="POST" action="index.php?controller=grupo&action=atualizar">
    <input type="hidden" name="id" value="<?= $dados['id']; ?>">

    <input type="text" name="grupo" 
           value="<?= $dados['grupo']; ?>" required>

    <button type="submit" class="btn">Atualizar</button>
    <a href="index.php?controller=grupo&action=listar" class="btn">Voltar</a>
</form>