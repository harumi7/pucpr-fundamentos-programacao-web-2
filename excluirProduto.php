<?php 
    include 'includes/conectarBD.php';

    try {
        $id = $_GET['id'];

        $sql = "DELETE FROM Produto
            WHERE CodProduto = '$id'";

        $resultado = mysqli_query($conn, $sql);

        header("Location: listarProdutos.php?excluirSucesso=1");
    } catch (Exception $e) {
        header("Location: listarProdutos.php?excluirErro=1");
    }
?>