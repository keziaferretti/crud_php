<?php
require 'config.php';

require 'dao/UsuarioDAOMySQL.php';

$usuarioDao = new UsuarioDAOMysql($pdo);

$id = filter_input(INPUT_GET, 'id');
if ($id) {
    $usuarioDao->delete($id);
}

header("Location: index.php");
exit;
