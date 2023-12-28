<?php
    include 'includes/conectarBD.php';
    
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if (empty($id)) {
        $sql = "INSERT INTO Usuario (Nome, Email, Senha)
                VALUES ('$nome', '$email', md5('$senha'))";

        $resultado = mysqli_query($conn, $sql);

        if ($resultado) {
            header("Location: listarUsuarios.php?incluirSucesso=1");
        } else {
            header("Location: listarUsuarios.php?incluirErro=1");
        }

    } else {
        $sql = "UPDATE Usuario
        SET Nome = '$nome', Email = '$email', Senha = '$senha'
        WHERE CodUsuario = '$id'";
        
        $resultado = mysqli_query($conn, $sql);

        if ($resultado) {
            header("Location: listarUsuarios.php?atualizarSucesso=1");
        } else {
            header("Location: listarUsuarios.php?atualizarErro=1");
        }
    }
?>