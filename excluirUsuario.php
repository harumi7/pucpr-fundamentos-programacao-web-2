<?php 
    include 'includes/conectarBD.php';

    $id = $_GET['id'];

    $sql = "DELETE FROM Usuario
            WHERE CodUsuario = '$id'";
    
    $resultado = mysqli_query($conn, $sql);

    header("Location: listarUsuarios.php?excluirSucesso");
?>