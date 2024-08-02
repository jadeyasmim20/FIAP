<?php
require 'config.php';
require 'dao/TurmaDaoMysql.php';

$turmaDao = new TurmaDaoMysql($pdo);

$id = filter_input(INPUT_POST, 'id');
$nome = filter_input(INPUT_POST, 'nome');
$descricao = filter_input(INPUT_POST, 'descricao');
$tipo = filter_input(INPUT_POST, 'tipo');

if($id && $nome && $descricao && $tipo) {
    $turma = new Turma();
    $turma->setId($id);
    $turma->setNome($nome);
    $turma->setDescricao($descricao);
    $turma->setTipo($tipo);

    $turmaDao->update($turma);

    header("Location: index.php");
    exit;
} else {
    header("Location: editarTurma.php?id=".$id);
    exit;
}
?>
