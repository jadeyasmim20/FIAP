<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Matrícula</title>
</head>
<body>
    <h1>Adicionar Matrícula</h1>
    <form method="POST" action="adicionarMatricula_action.php">
        <label>
            Aluno:<br/>
            <select name="aluno_id" required>
                <?php foreach ($alunos as $aluno): ?>
                    <option value="<?=$aluno->getId();?>"><?=$aluno->getNome();?></option>
                <?php endforeach; ?>
            </select>
        </label><br/><br/>

        <label>
            Turma:<br/>
            <select name="turma_id" required>
                <?php foreach ($turmas as $turma): ?>
                    <option value="<?=$turma->getId();?>"><?=$turma->getNome();?></option>
                <?php endforeach; ?>
            </select>
        </label><br/><br/>

        <input type="submit" value="Adicionar" />
    </form>
</body>
</html>
