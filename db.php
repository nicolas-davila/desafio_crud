<?php 

    $localhost = "localhost";
    $usuario = "root";
    $senha = "012220";
    $bancoDados = "receitas";

    $conn = mysqli_connect("$localhost","$usuario","$senha","$bancoDados");

    if(!$conn) {
        die("Erro de conexão: " . mysqli_connect_error());
    } 
?>