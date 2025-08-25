<?php 

    include("db.php");

    $id = $_GET["id"];
    $result = mysqli_query($conn, "SELECT * FROM atividades WHERE usuario_atribuido=$id");

    var_dump($result);

    if(mysqli_num_rows($result) > 0) {
        echo "<alert>Usuário não excluido, pois está atribuido a uma atividade!</alert>";
        header("location: create_usuario.php");
    } else {
        mysqli_query($conn, "DELETE FROM usuarios WHERE id = $id");
        header("location: create_usuario.php");
    }

?>