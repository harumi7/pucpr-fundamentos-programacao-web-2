<?php 
    include 'includes/conectarBD.php';

    try {
        $id = $_GET['id'];

        $sql = "DELETE FROM Cardapio
            WHERE CodCardapio = '$id'";

        $resultado = mysqli_query($conn, $sql);

        header("Location: listarCardapios.php?excluirSucesso=1");
    } catch (Exception $e) {
        header("Location: listarCardapios.php?excluirErro=1");
    }
?>