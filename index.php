<?php 

    include("db.php");

    $result = mysqli_query($conn, "SELECT a.id, a.atividade, a.producao, u.nome AS usuario FROM atividades a LEFT JOIN usuarios u ON a.usuario_atribuido = u.id");
    
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar atividade</title>
</head>
<body>
    <h2>Página de Receitas</h2>
    <a href="create_atividade.php">Criar nova atividade</a>
    <a href="create_usuario.php">Criar um novo usuário</a>
    <a href="create_insumos.php">Criar Insumos</a>
    <table border="1" cellpadding="10">
        <tr>
            <th>Id</th>
            <th>Atividade</th>
            <th>Pessoa Atribuida</th>
            <th>Status</th>
            <th>Insumos</th>
            <th>Ações</th>
        </tr>

        <?php if(mysqli_num_rows($result)>0): ?>
            <?php while($row=mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['atividade']?></td>
                    <td><?php echo $row['usuario']; ?></td>
                    <td><?php echo $row['producao']?></td>
                    <td><?php
                    
                            $resultInsumos = mysqli_query($conn, "SELECT * FROM atividade_insumos as ai JOIN insumos as i ON i.id=ai.insumos_id where ai.atividade_id=".$row['id']);
                            while($atvInsumos=mysqli_fetch_assoc($resultInsumos)){
                                echo $atvInsumos['descricao_insumos']."<br>";
                            }
                        ?>

                    </td>
                    <td>
                        <a href="atribuir_insumos.php?id=<?php echo $row['id']?>">Atribuir Insumos</a><br>
                        <a href="atribuir_usuario.php?id=<?php echo $row['id']?>">Atribuir Usuário</a><br>

                        <a href="edit_atividade.php?id=<?php echo $row['id']?>">Editar Atividade</a><br>
                        <a href="delete_atividade.php?id=<?php echo $row['id']?>" onclick="return confirm('Tem certeza de que deseja exlcuir a atividade?')">Excluir Atividade</a>
                    </td>
                </tr>
            <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">Nenhuma atividade encontrada!</td>
                </tr>
        <?php endif; ?>

    </table>
</body>
</html>