<?php
require 'config.php';
require 'dao/TurmaDaoMysql.php';

$turmaDao = new TurmaDaoMysql($pdo);

$nome = filter_input(INPUT_POST, 'nome');
$descricao = filter_input(INPUT_POST, 'descricao');
$tipo = filter_input(INPUT_POST, 'tipo');

if($nome && $descricao && $tipo) {
    $novaTurma = new Turma();
    $novaTurma->setNome($nome);
    $novaTurma->setDescricao($descricao);
    $novaTurma->setTipo($tipo);

    $turmaDao->add($novaTurma);

    header("Location: index.php");
    exit;
} else {
    header("Location: adicionarTurma.php");
    exit;
}
?>
