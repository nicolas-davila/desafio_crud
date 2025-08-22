<?php 

    include("db.php");

    $id = $_GET["id"]; //sempre usar GET no edit e no delete. (NÃO ESQUECER DISSO)
    $result = mysqli_query($conn, "SELECT * FROM atividades WHERE id = $id");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $atividade = $_POST['atividade'];
        $usuario_atribuido = $_POST['usuario_atribuido'];
        $producao = $_POST['producao'];

        $sql = "UPDATE atividades SET atividade='$atividade', usuario_atribuido='$usuario_atribuido', producao='$producao' WHERE id = $id"; // colocar a atividade no id que quiser - lembrar de que o where vai referenciar o item atual;
        mysqli_query($conn, $sql);
        header("Location: index.php");
    }

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Atividade</title>
</head>
<body>
    <form method="post">
        <h2>Cadastrar Atividade</h2>>
        <select name="atividade" placeholder="Atividade" required>
            <option>
                <?php while($row=mysqli_fetch_assoc($result)): ?>
                
                    <?php echo $row['atividade'];?> 
                
                <?php endwhile ;?>
            </option>
            <option>Separar ingredientes</option>
            <option>Bater Ovos</option>
            <option>Misturar ovos para massa homogênea</option>
            <option>Acrescentar leite e farinha</option>
            <option>Acrescentar ovo e fermento na massa</option>
            <option>Untar forma</option>
            <option>Despejar massa na forma</option>
            <option>Colocar para assar em um forno</option>
        </select>
        <select name="usuario_atribuido" required>
            <?php 
                $usuarios = mysqli_query($conn, "SELECT * FROM usuarios"); // Pega os usuários cadastrados e faz uma lista
                while($usuario = mysqli_fetch_assoc($usuarios)) { // Percorre linha por linha(NÃO ESQUECE DISSO!!!)
                    echo "<option value='{$usuario['id']}'>{$usuario['nome']}</option>";
                }
            ?>
        </select>
        <select name="producao" required>
            <option>pendente</option>
            <option>em produção</option>
            <option>pausado</option>
            <option>concluido</option>
        </select>
        <input type="submit" value="Atualizar Atividade">
    </form>
</body>
</html>