<?php 

    include("db.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST') { // Dentro do if só vai rodar após o submit do form
        $descricao = $_POST['descricao'];

        $sql = "INSERT INTO insumos (descricao_insumos) VALUES ('$descricao')";
        mysqli_query($conn, $sql);
        header("Location: index.php");

    }

    $result = mysqli_query($conn, "SELECT * FROM insumos"); // Lembra de chamar a consulta aqui fora do if para carregar a tabela sempre

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

    </form><br>
    <table border="1" cellpadding="10">
        <tr>
            <th>Id</th>
            <th>Descrição dos Insumos</th>
            <th>Ações</th>
        </tr>

        <?php if(mysqli_num_rows($result)>0): ?>
            <?php while($row=mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['descricao_insumos']?></td>
                    <td>
                        <a href="edit_insumos.php?id=<?php echo $row['id']?>">Editar Insumos</a><br>
                        <a href="delete_insumos.php?id=<?php echo $row['id']?>" onclick="return confirm('Tem certeza de que deseja exlcuir a atividade?')">Excluir</a>
                    </td>
                </tr>
            <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">Nenhum insumo encontrado!</td>
                </tr>
        <?php endif; ?>

    </table>
</body>
</html>