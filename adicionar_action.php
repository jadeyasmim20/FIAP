<?php
// require 'config.php';
// require 'dao/UsuarioDaoMysql.php';

// $usuarioDao = new UsuarioDaoMysql($pdo);

// $name = filter_input(INPUT_POST, 'name');
// $data_nascimento = filter_input(INPUT_POST, 'data_nascimento');
// $cpf = filter_input(INPUT_POST, 'cpf');
// $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

// if($name && $data_nascimento && $cpf && $email) {
//     if($usuarioDao->findByEmail($email) === false) {
//         $novoUsuario = new Usuario();
//         $novoUsuario->setNome($name);
//         $novoUsuario->setDataNascimento($data_nascimento);
//         $novoUsuario->setCpf($cpf);
//         $novoUsuario->setEmail($email);

//         $usuarioDao->add($novoUsuario);

//         header("Location: index.php");
//         exit;
//     } else {
//         header("Location: adicionar.php");
//         exit;
//     }
// } else {
//     header("Location: adicionar.php");
//     exit;
// }


require 'config.php';
require 'dao/UsuarioDaoMysql.php';

$usuarioDao = new UsuarioDaoMysql($pdo);

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$data_nascimento = filter_input(INPUT_POST, 'data_nascimento', FILTER_SANITIZE_STRING);
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if ($name && $data_nascimento && $cpf && $email) {
    // Verifique se o e-mail já está cadastrado
    if ($usuarioDao->findByEmail($email) === false) {
        // Crie um novo usuário
        $novoUsuario = new Usuario();
        $novoUsuario->setNome($name);
        $novoUsuario->setDataNascimento($data_nascimento);
        $novoUsuario->setCpf($cpf);
        $novoUsuario->setEmail($email);

        // Adicione o novo usuário ao banco de dados
        $usuarioDao->add($novoUsuario);

        // Redirecione para a página principal
        header("Location: index.php");
        exit;
    } else {
        // Redirecione para a página de adição com mensagem de erro
        header("Location: adicionar.php?error=email_existente");
        exit;
    }
} else {
    // Redirecione para a página de adição com mensagem de erro
    header("Location: adicionar.php?error=dados_invalidos");
    exit;
}
?>