<?php 

    include("db.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $descricao = $_POST['descricao'];

        $sql = "INSERT INTO insumos (descricao_insumos) VALUES ('$descricao')";
        mysqli_query($conn, $sql);
        header("Location: index.php");

    }

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar insumos</title>
</head>
<body>
    <h2>Cadastrar Insumos</h2>
    <form method="post">

        <input type="text" name="descricao" placeholder="Ex: Açucar" required>
        <input type="submit" value="Cadastrar Insumos">

    </form>
</body>
</html>