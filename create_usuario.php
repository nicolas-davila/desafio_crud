<?php 

    include("db.php");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome'];


        $sql = "INSERT INTO usuarios (nome) VALUES ('$nome')";
        mysqli_query($conn, $sql);
        header("Location: index.php");
    }

    $result = mysqli_query($conn, "SELECT * FROM usuarios")
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
    <table border="1" cellpadding="10">
        <tr>
            <th>Id</th>
            <th>Usuários Cadastrados</th>
            <th>Ações</th>
        </tr>

        <?php if(mysqli_num_rows($result)>0): ?>
            <?php while($row=mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['nome']?></td>
                    <td>
                        <a href="edit_insumos.php?id=<?php echo $row['id']?>">Editar usuário</a><br>
                        <a href="delete_insumos.php?id=<?php echo $row['id']?>" onclick="return confirm('Tem certeza de que deseja exlcuir a atividade?')">Excluir usuário</a>
                    </td>
                </tr>
            <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">Nenhum usuário encontrado!</td>
                </tr>
        <?php endif; ?>

    </table>
</body>
</html>