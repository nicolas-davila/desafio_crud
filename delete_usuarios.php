<?php 

    include("db.php");

    $id = $_GET["id"];
    $result = mysqli_query($conn, "SELECT * FROM atividades WHERE usuario_atribuido=$id");

    // var_dump($result);

    if(mysqli_num_rows($result) > 0) {
        echo "<script>
                alert('Não é possível excluir o usuário, pois ele está atribuído a uma ou mais atividades.');
                window.location.href='create_usuario.php';
            </script>";
    } else {
        mysqli_query($conn, "DELETE FROM usuarios WHERE id = $id");
        echo "<script>
                alert('Usuário excluido com sucesso.');
                window.location.href='create_usuario.php';
            </script>";
    }

?>