<?php 
    include 'includes/conectarBD.php';

    $id_produto = $_GET['produtoId'];
    $id_pedido = $_GET['pedidoId'];

    $sql = "DELETE FROM Produto_has_Pedido
            WHERE CodProduto = '$id_produto' AND CodPedido = '$id_pedido'";
    
    $resultado = mysqli_query($conn, $sql);

    header("Location: listarProdutoPedidos.php?excluirSucesso=1");
?>