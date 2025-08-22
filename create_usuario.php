<?php 

    include("db.php");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome'];


        $sql = "INSERT INTO usuarios (nome) VALUES ('$nome')";
        mysqli_query($conn, $sql);
        header("Location: index.php");
    }

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Usuário para atribuir</title>
</head>
<body>
    <h2>Criar Usuário</h2>
    <form method="post">
        <input type="text" name="nome" placeholder="Nome do Usuário" required>
        <input type="submit" value="Cadastrar Usuário">
    </form>
</body>
</html>