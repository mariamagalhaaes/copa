<h1>Grupos</h1>

<a href="index.php?controller=grupo&action=criar">Novo Grupo</a>
<a href="index.php" class="btn">Voltar para Home</a>

<ul>
    <?php foreach ($grupos as $g): ?>
        <li>
            Grupo <?= $g['grupo'] ?>
            |
            <<a href="index.php?page=editarGrupo&id=<?= $grupo['id']; ?>" class="btn btn-edit">Editar</a>

<a href="index.php?page=excluirGrupo&id=<?= $grupo['id']; ?>" 
   class="btn btn-delete"
   onclick="return confirm('Tem certeza que deseja excluir?')">
   Excluir
            </a>
        </li>
    <?php endforeach; ?>
</ul>
