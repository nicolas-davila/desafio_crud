<?php 

    include("db.php");

    $id = $_GET["id"]; // Pega o id que vem pela URL
    $result = mysqli_query($conn, "SELECT * FROM atividade_insumos WHERE insumos_id = $id");

    if (mysqli_num_rows($result) > 0) {
        echo "<script>
        
                alert('Não é possível remover insumo, pois ele está atribuido a uma ou mais atividades.);
                window.location.href='create_insumos.php';

            </script>";
    } else {
        mysqli_query($conn, "DELETE FROM insumos WHERE id = $id");
        echo "<script>
        
                alert('Insumo excluido com sucesso!');
                window.loaction.href='create_insumos.php';

            </script>";
    }

?>