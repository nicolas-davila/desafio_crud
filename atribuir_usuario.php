<?php 

    include("db.php");

    $id = $_GET["id"]; //sempre usar GET no edit e no delete. (NÃO ESQUECER DISSO)
    $result = mysqli_query($conn, "SELECT * FROM atividades WHERE id = $id");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $atividade = $_POST['atividade'];
        $usuario_atribuido = $_POST['usuario_atribuido'];
        $insumos = "SELECT insumos FROM atividades WHERE id = $id";

        $sql = "INSERT INTO atividades (atividade, usuario_atribuido, insumos) VALUES ('$atividade', '$usuario_atribuido', '$insumos')WHERE id = $id"; // colocar a atividade no id que quiser - lembrar de que o where vai referenciar o item atual;
        mysqli_query($conn, $sql);
        header("Location: index.php");
    }

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atribuir Usuário</title>
</head>
<body>
    <form method="post">
        <h2>Atividade Selecionada:</h2>>
        <p value="atividade">

            <?php if($row=mysqli_fetch_assoc($result)): ?>
                
                    <?php echo $row['atividade'];?> 
                
            <?php endif ;?>

        </p>
        <select name="usuario_atribuido" required>
            <?php 
                $usuarios = mysqli_query($conn, "SELECT * FROM usuarios"); // Pega os usuários cadastrados e faz uma lista
                while($usuario = mysqli_fetch_assoc($usuarios)) { // Percorre linha por linha(NÃO ESQUECE DISSO!!!)
                    echo "<option value='{$usuario['id']}'>{$usuario['nome']}</option>";
                }
            ?>
        </select>
        <input type="submit" value="Atribuir Usuário">
    </form>
</body>
</html>