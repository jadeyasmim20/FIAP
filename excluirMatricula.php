<?php
require 'config.php';
require 'dao/MatriculaDaoMysql.php';

$matriculaDao = new MatriculaDaoMysql($pdo);

$id = filter_input(INPUT_GET, 'id');

if($id) {
    $matriculaDao->delete($id);
}

header("Location: index.php");
exit;
?>
