<?php 
    include 'includes/conectarBD.php';

    try {
        $id = $_GET['id'];

        $sql = "DELETE FROM Pedido
            WHERE CodPedido = '$id'";

        $resultado = mysqli_query($conn, $sql);

        header("Location: listarPedidos.php?excluirSucesso=1");
    } catch (Exception $e) {
        header("Location: listarPedidos.php?excluirErro=1");
    }
?>