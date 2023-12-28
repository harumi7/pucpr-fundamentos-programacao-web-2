<?php
    include 'includes/conectarBD.php';

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];

    if (empty($id)) {
        $sql = "INSERT INTO Cardapio (Nome, Descricao)
                VALUES ('$nome', '$descricao')";

        $resultado = mysqli_query($conn, $sql);

        if ($resultado) {
            header("Location: listarCardapios.php?incluirSucesso=1");
        } else {
            header("Location: listarCardapios.php?incluirErro=1");
        }

    } else {
        $sql = "UPDATE Cardapio
        SET Nome = '$nome', Descricao = '$descricao'
        WHERE CodCardapio = '$id'";
        
        $resultado = mysqli_query($conn, $sql);

        if ($resultado) {
            header("Location: listarCardapios.php?atualizarSucesso=1");
        } else {
            header("Location: listarCardapios.php?atualizarErro=1");
        }
    }
?>