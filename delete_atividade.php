<?php 

    include("db.php");

    $id = $_GET["id"];
    mysqli_query($conn, "DELETE FROM atividades WHERE id = $id");
    header("location: index.php")

?>