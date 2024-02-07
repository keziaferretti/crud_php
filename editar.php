<!DOCTYPE html>
<html lang="en">
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

    $info = [];

    $id = filter_input(INPUT_GET, 'id');
    if($id){
        $sql = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $info = $sql->fetch(PDO::FETCH_ASSOC);
        } else {
            header("Location: index.php");
            exit;
        }
    }
    else {
        header("Location: index.php");
        exit;
    }
    ?>

    <form method="POST" action="editar_action.php" class="mt-3">

        <input type="hidden" name="id" value="<?=$info['id'];?>" />
        
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?=$info['nome'];?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?=$info['email'];?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>

</body>
</html>
