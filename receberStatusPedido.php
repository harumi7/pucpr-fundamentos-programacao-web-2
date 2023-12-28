<?php
    include 'includes/conectarBD.php';
    
    $id = $_POST['id'];
    $descricao = $_POST['descricao'];

    if (empty($id)) {
        $sql = "INSERT INTO StatusPedido (Descricao)
                VALUES ('$descricao')";

        $resultado = mysqli_query($conn, $sql);

        if ($resultado) {
            header("Location: listarStatusPedidos.php?incluirSucesso=1");
        } else {
            header("Location: listarStatusPedidos.php?incluirErro=1");
        }

    } else {
        $sql = "UPDATE StatusPedido
        SET Descricao = '$descricao'
        WHERE CodStatusPedido = '$id'";
        
        $resultado = mysqli_query($conn, $sql);

        if ($resultado) {
            header("Location: listarStatusPedidos.php?atualizarSucesso=1");
        } else {
            header("Location: listarStatusPedidos.php?atualizarErro=1");
        }
    }
?>