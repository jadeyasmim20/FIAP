<?php
require 'config.php';
require 'dao/MatriculaDaoMysql.php';

$matriculaDao = new MatriculaDaoMysql($pdo);

$aluno_id = filter_input(INPUT_POST, 'aluno_id');
$turma_id = filter_input(INPUT_POST, 'turma_id');

if($aluno_id && $turma_id) {
    $novaMatricula = new Matricula();
    $novaMatricula->setAlunoId($aluno_id);
    $novaMatricula->setTurmaId($turma_id);

    $matriculaDao->add($novaMatricula);

    header("Location: index.php");
    exit;
} else {
    header("Location: adicionarMatricula.php");
    exit;
}
?>
