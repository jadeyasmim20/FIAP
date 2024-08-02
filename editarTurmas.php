<!DOCTYPE html>
<html>
<head>
    <title>Editar Turma</title>
</head>
<body>
    <h1>Editar Turma</h1>
    <form method="POST" action="editarTurma_action.php">
        <input type="hidden" name="id" value="<?=$turma->getId();?>" />

        <label>
            Nome:<br/>
            <input type="text" name="nome" value="<?=$turma->getNome();?>" required />
        </label><br/><br/>

        <label>
            Descrição:<br/>
            <textarea name="descricao" required><?=$turma->getDescricao();?></textarea>
        </label><br/><br/>

        <label>
            Tipo:<br/>
            <input type="text" name="tipo" value="<?=$turma->getTipo();?>" required />
        </label><br/><br/>

        <input type="submit" value="Salvar" />
    </form>
</body>
</html>
