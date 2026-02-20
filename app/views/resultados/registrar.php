
<h2>Registrar Resultado do Jogo</h2>


<br>
<form method="post" action="index.php?controller=resultado&action=registrar">

    <label>ID do Jogo:</label>
    <input type="number" name="jogo_id" required>


    <label>Gols Mandante:</label>
    <input type="number" name="gols_mandante" min="0" required>


    <label>Gols Visitante:</label>
    <input type="number" name="gols_visitante" min="0" required>


    <button type="submit">Salvar Resultado</button>

</form>

<br>

<a href="index.php">Voltar</a>
