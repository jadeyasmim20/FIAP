<!DOCTYPE html>
<html>
<head>
    <title>Matrículas</title>
</head>
<body>
    <h1>Matrículas</h1>
    <a href="adicionarMatricula.php">ADICIONAR MATRÍCULA</a>

    <table border="1" width="100%">
        <tr>
            <th>ID</th>
            <th>ALUNO ID</th>
            <th>TURMA ID</th>
            <th>AÇÕES</th>
        </tr>

        <?php foreach($lista as $matricula): ?>
            <tr>
                <td><?=$matricula->getId();?></td>
                <td><?=$matricula->getAlunoId();?></td>
                <td><?=$matricula->getTurmaId();?></td>
                <td>
                    <a href="excluirMatricula.php?id=<?=$matricula->getId();?>" onclick="return confirm('Tem certeza que deseja excluir?')">[ Excluir ]</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
