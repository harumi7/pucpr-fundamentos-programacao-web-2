<?php 
    include 'includes/conectarBD.php';

    try {
        $id = $_GET['id'];

        $sql = "DELETE FROM Cliente
            WHERE CodCliente = '$id'";

        $resultado = mysqli_query($conn, $sql);

        header("Location: listarClientes.php?excluirSucesso=1");
    } catch (Exception $e) {
        header("Location: listarClientes.php?excluirErro=1");
    }
?>