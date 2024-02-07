<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <!-- Link Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<?php
require 'config.php';

$lista = [];
$sql = $pdo->query("SELECT * FROM usuarios");
if($sql->rowCount() > 0) {
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}
?>

<div class="container">
    <a href="adicionar.php" class="btn btn-primary mt-3 mb-3">Adicionar Usuário</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($lista as $usuario):?>
                <tr>
                    <td><?=$usuario['id'];?></td>
                    <td><?=$usuario['nome'];?></td>
                    <td><?=$usuario['email'];?></td>
                    <td>
                        <a href="editar.php?id=<?=$usuario['id'];?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="excluir.php?id=<?=$usuario['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>

</body>
</html>
