<?php
require 'config.php';
require 'dao/UsuarioDaoMysql.php';

$usuarioDao = new UsuarioDaoMysql($pdo);

$id = filter_input(INPUT_POST, 'id');
$name = filter_input(INPUT_POST, 'name');
$data_nascimento = filter_input(INPUT_POST, 'data_nascimento');
$cpf = filter_input(INPUT_POST, 'cpf');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if($id && $name && $data_nascimento && $cpf && $email) {
    $usuario = new Usuario();
    $usuario->setId($id);
    $usuario->setNome($name);
    $usuario->setDataNascimento($data_nascimento);
    $usuario->setCpf($cpf);
    $usuario->setEmail($email);

    $usuarioDao->update($usuario);

    header("Location: index.php");
    exit;
} else {
    header("Location: editar.php?id=".$id);
    exit;
}
?>