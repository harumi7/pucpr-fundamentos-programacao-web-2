<?php
    include 'includes/conectarBD.php';
    
    $id_produto = $_POST['id_produto'];
    $id_pedido = $_POST['id_pedido'];
    $quantidade = $_POST['quantidade'];

    if (empty($id_produto) && empty($id_pedido) && empty($quantidade)) {
        $sql = "INSERT INTO Produto_has_Pedido (CodProduto, CodPedido, Quantidade)
                VALUES ('$id_produto', '$id_pedido', '$quantidade')";

        $resultado = mysqli_query($conn, $sql);

        if ($resultado) {
            header("Location: listarProdutoPedidos.php?incluirSucesso=1");
        } else {
            header("Location: listarProdutoPedidos.php?incluirErro=1");
        }

    } else {
        $sql = "UPDATE Produto_has_Pedido
        SET CodProduto = '$id_produto', CodPedido = '$id_pedido', Quantidade = '$quantidade'
        WHERE CodProduto = '$id_produto' AND CodPedido = '$id_pedido'";
        
        $resultado = mysqli_query($conn, $sql);

        if ($resultado) {
            header("Location: listarProdutoPedidos.php?atualizarSucesso=1");
        } else {
            header("Location: listarProdutoPedidos.php?atualizarErro=1");
        }
    }
?>