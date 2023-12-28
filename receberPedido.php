<?php
    include 'includes/conectarBD.php';
    
    $id = $_POST['id'];
    $data_emissao = $_POST['data_emissao'];
    $observacao = $_POST['observacao'];
    $id_status_pedido = $_POST['id_status_pedido'];
    $id_cliente = $_POST['id_cliente'];

    if (empty($id)) {
        $sql = "INSERT INTO Pedido (DataEmissao, Observacao, CodStatusPedido, CodCliente)
                VALUES ('$data_emissao', '$observacao', '$id_status_pedido', $id_cliente)";

        $resultado = mysqli_query($conn, $sql);

        if ($resultado) {
            header("Location: listarPedidos.php?incluirSucesso=1");
        } else {
            header("Location: listarPedidos.php?incluirErro=1");
        }

    } else {
        $sql = "UPDATE Pedido
        SET DataEmissao = '$data_emissao', Observacao = '$observacao', CodStatusPedido = '$id_status_pedido', CodCliente = '$id_cliente';
        WHERE CodPedido = '$id'";
        
        $resultado = mysqli_query($conn, $sql);

        if ($resultado) {
            header("Location: listarPedidos.php?atualizarSucesso=1");
        } else {
            header("Location: listarPedidos.php?atualizarErro=1");
        }
    }
?>