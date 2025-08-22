<?php 

    include("db.php");

    $id = $_GET["id"]; // Pega o id que vem pela URL
    mysqli_query($conn, "DELETE FROM insumos WHERE id = $id"); //Executa a query de delete
    header("location: index.php")

?>