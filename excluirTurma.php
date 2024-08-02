<?php
require 'config.php';
require 'dao/TurmaDaoMysql.php';

$turmaDao = new TurmaDaoMysql($pdo);

$id = filter_input(INPUT_GET, 'id');

if($id) {
    $turmaDao->delete($id);
}

header("Location: index.php");
exit;
?>
