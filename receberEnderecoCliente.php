<?php
    include 'includes/conectarBD.php';
    
    $id = $_POST['id'];
    $cep = $_POST['cep'];
    $municipio = $_POST['municipio'];

    if (empty($id)) {
        $sql = "INSERT INTO EnderecoCliente (CEP, Municipio)
                VALUES ('$cep', '$municipio')";

        $resultado = mysqli_query($conn, $sql);

        if ($resultado) {
            header("Location: listarEnderecoClientes.php?incluirSucesso=1");
        } else {
            header("Location: listarEnderecoClientes.php?incluirErro=1");
        }

    } else {
        $sql = "UPDATE EnderecoCliente
        SET CEP = '$nome', Municipio = '$descricao'
        WHERE CodEnderecoCliente = '$id'";
        
        $resultado = mysqli_query($conn, $sql);

        if ($resultado) {
            header("Location: listarEnderecoClientes.php?atualizarSucesso=1");
        } else {
            header("Location: listarEnderecoClientes.php?atualizarErro=1");
        }
    }
?>