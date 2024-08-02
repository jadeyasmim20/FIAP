<?php 
require 'config.php';
require 'dao/TurmaDaoMysql.php';

$usuarioDao = new TurmaDaoMysql($pdo);
$lista = $usuarioDao->findAll();

?>

<a href="adicionarTurma.php">ADICIONAR TURMA</a>

<table border="1" width="100%">
    <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>DESCRIÇÃO</th>
        <th>TIPO</th>
        <th>AÇÕES</th>
    </tr>

    <tr>

        </tr>

    <?php foreach( $lista as $turma):?>
        <tr>
                <td><?=$turma->getId();?></td>
                <td><?=$turma->getNome();?></td>
                <td><?=$turma->getDescricao();?></td>
                <td><?=$turma->getTipo();?></td>
            <td>
                <a href="editarTurma.php?id=<?=$turma->getId();?>">[ Editar ]</a>
                <a href="excluirTurma.php?id=<?=$turma->getId();?>" onclick="return confirm('Tem certeza que deseja excluir?')">[ Excluir ]</a>
            </td>
        </tr>
    <?php endforeach; ?>    

</table>