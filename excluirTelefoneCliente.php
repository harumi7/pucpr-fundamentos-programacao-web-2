<?php 
    include 'includes/conectarBD.php';

    $numero = $_GET['numero'];
    $id_cliente = $_GET['id'];

    $sql = "DELETE FROM TelefoneCliente
            WHERE Numero = '$numero' AND CodCliente = '$id_cliente'";
    
    $resultado = mysqli_query($conn, $sql);

    header("Location: listarTelefoneClientes.php?excluirSucesso=1");
?>