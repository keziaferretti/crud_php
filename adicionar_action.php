<?php 
require 'config.php';

require 'dao/UsuarioDAOMySQL.php';

$usuarioDao = new UsuarioDAOMysql($pdo);

$name = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if($name && $email) {

    if($usuarioDao->findByEmail($email) === false) {
        $usuario = new Usuario();
        $usuario->setNome($name);
        $usuario->setEmail($email);

        $usuarioDao->add($usuario);
        header("Location: index.php");
        exit;
    } else {
        header("Location: adicionar.php");
        exit;
    }

} else {
    header("Location: adicionar.php");
    exit;
}
