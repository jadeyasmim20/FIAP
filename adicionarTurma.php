<h1>Adicionar Turma</h1>
<form method="POST" action="adicionarTurma_action.php">
        <label>
            Nome:<br/>
            <input type="text" name="nome" required />
        </label><br/><br/>

        <label>
            Descrição:<br/>
            <textarea name="descricao" required></textarea>
        </label><br/><br/>

        <label>
            Tipo:<br/>
            <input type="text" name="tipo" required />
        </label><br/><br/>

        <input type="submit" value="Adicionar" />
</form>