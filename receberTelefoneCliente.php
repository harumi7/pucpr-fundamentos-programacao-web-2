<?php
    include 'includes/conectarBD.php';
    
    $numero = $_POST['numero'];
    $id_cliente = $_POST['id_cliente'];

    if (empty($numero) && empty($id_cliente)) {
        $sql = "INSERT INTO TelefoneCliente (Numero, CodCliente)
                VALUES ('$numero', '$id_cliente')";

        $resultado = mysqli_query($conn, $sql);

        if ($resultado) {
            header("Location: listarTelefoneClientes.php?incluirSucesso=1");
        } else {
            header("Location: listarTelefoneClientes.php?incluirErro=1");
        }

    } else {
        $sql = "UPDATE TelefoneCliente
        SET Numero = '$numero', CodCliente = '$id_cliente'
        WHERE Numero = '$numero' AND CodCliente = '$id_cliente'";
        
        $resultado = mysqli_query($conn, $sql);

        if ($resultado) {
            header("Location: listarTelefoneClientes.php?atualizarSucesso=1");
        } else {
            header("Location: listarTelefoneClientes.php?atualizarErro=1");
        }
    }
?>