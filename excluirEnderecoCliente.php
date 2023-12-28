<?php 
    include 'includes/conectarBD.php';
    
    try {
        $id = $_GET['id'];

        $sql = "DELETE FROM EnderecoCliente
            WHERE CodEnderecoCliente = '$id'";

        $resultado = mysqli_query($conn, $sql);

        header("Location: listarEnderecoClientes.php?excluirSucesso=1");
    } catch (Exception $e) {
        header("Location: listarEnderecoClientes.php?excluirErro=1");
    }
?>