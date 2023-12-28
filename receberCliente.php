<?php
    include 'includes/conectarBD.php';
    
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $numero_endereco = $_POST['numero_endereco'];
    $logradouro = $_POST['logradouro'];
    $complemento_endereco = $_POST['complemento_endereco'];
    $id_endereco_cliente = $_POST['id_endereco_cliente'];

    if (empty($id)) {
        $sql = "INSERT INTO Cliente (Nome, NumeroEndereco, Logradouro, ComplementoEndereco, CodEnderecoCliente)
                VALUES ('$nome', '$numero_endereco', '$logradouro', '$complemento_endereco', '$id_endereco_cliente')";

        $resultado = mysqli_query($conn, $sql);

        if ($resultado) {
            header("Location: listarClientes.php?incluirSucesso=1");
        } else {
            header("Location: listarClientes.php?incluirErro=1");
        }

    } else {
        $sql = "UPDATE Cliente
        SET Nome = '$nome', NumeroEndereco = '$numero_endereco', Logradouro = '$logradouro', ComplementoEndereco = '$complemento_endereco', CodEnderecoCliente = '$id_endereco_cliente'
        WHERE CodCliente = '$id'";
        
        $resultado = mysqli_query($conn, $sql);

        if ($resultado) {
            header("Location: listarClientes.php?atualizarSucesso=1");
        } else {
            header("Location: listarClientes.php?atualizarErro=1");
        }
    }
?>