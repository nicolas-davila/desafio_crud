<?php 

    include("db.php");

    $id = $_GET["id"];
    mysqli_query($conn, "DELETE FROM usuarios WHERE id = $id");
    header("location: create_usuario.php")

?>