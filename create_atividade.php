<?php 

    include("db.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $atividade = $_POST['atividade'];
        $usuario_atribuido = $_POST['usuario_atribuido'];

        $sql = "INSERT INTO atividades (atividade, usuario_atribuido) VALUES ('$atividade', '$usuario_atribuido')";
        mysqli_query($conn, query: $sql);
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
        <h2>Cadastrar Atividade</h2>
        <select name="atividade" placeholder="Atividade" required>
            <option value="" disabled selected>Selecione a Atividade</option>
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
                $usuarios = mysqli_query($conn, "SELECT * FROM usuarios"); // busca os usuários (NÃO ESQUECER))
                while($usuario = mysqli_fetch_assoc($usuarios)) {
                    echo "<option value='{$usuario['id']}'>{$usuario['nome']}</option>"; //value é o valor que vai utilizar para alocar no index.php (NÃO ESQUECER DE INVOCAR NO index.php)
                }
            ?>
        </select>
        <input type="submit" value="Cadastrar Atividade">
    </form>
</body>
</html>