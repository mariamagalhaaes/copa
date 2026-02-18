<div class="container">
    <div class="card">
        <h2>Editar Grupo</h2>

        <form method="POST" action="index.php?page=atualizarGrupo">
            <input type="hidden" name="id" value="<?= $dados['id']; ?>">

            <input type="text" name="nome" 
                   value="<?= $dados['nome']; ?>" required>

            <button type="submit" class="btn">Atualizar</button>
            <a href="index.php?page=grupos" class="btn">Voltar</a>
        </form>
    </div>
</div>
