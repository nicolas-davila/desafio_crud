<?php 

    include("db.php");

    $id = $_GET["id"];
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $insumos_id = $_POST['atribuir_insumos'];

        $result = "INSERT INTO atividade_insumos (atividade_id, insumos_id) VALUES ($id, $insumos_id)";
        mysqli_query($conn, $result);
        header("Location: index.php");
    }
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Insumos</title>
</head>
<body>
    <h2>Atribuir Insumos</h2>
    <form method="post">
        <select name="atribuir_insumos">

            <?php 

                $insumos = mysqli_query($conn, "SELECT * FROM insumos");
                while($insumo = mysqli_fetch_assoc($insumos)) {
                    echo "<option value='{$insumo['id']}'>{$insumo['descricao_insumos']}</option>";
                }

            ?>

        </select>
        
        <input type="submit" value="Atribuir Insumos">
    </form>
</body>
</html>