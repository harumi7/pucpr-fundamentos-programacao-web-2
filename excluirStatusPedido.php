<?php 
    include 'includes/conectarBD.php';

    try {
        $id = $_GET['id'];

        $sql = "DELETE FROM StatusPedido
            WHERE CodStatusPedido = '$id'";

        $resultado = mysqli_query($conn, $sql);

        header("Location: listarStatusPedidos.php?excluirSucesso=1");
    } catch (Exception $e) {
        header("Location: listarStatusPedidos.php?excluirErro=1");
    }
?>