<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <!-- Link Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">
        <h1>Editar Usuário</h1>

        <?php
        require 'config.php';

        require 'dao/UsuarioDAOMySQL.php';

        $usuarioDao = new UsuarioDAOMysql($pdo);

        $usuario = false;

        $id = filter_input(INPUT_GET, 'id');
        if($id) {
            $usuario = $usuarioDao->findById($id);
        }

        if($usuario === false) {
            header("Location: index.php");
            exit;
        }

        ?>

        <form method="POST" action="editar_action.php" class="mt-3">

            <input type="hidden" name="id" value="<?= $usuario->getID(); ?>" />

            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?= $usuario->getNome(); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $usuario->getEmail(); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>

</body>

</html>