<?php
    include 'includes/conectarBD.php';
    
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $id_cardapio = $_POST['id_cardapio'];

    if (empty($id)) {
        $sql = "INSERT INTO Produto (Nome, Preco, CodCardapio)
                VALUES ('$nome', '$preco', '$id_cardapio')";

        $resultado = mysqli_query($conn, $sql);

        if ($resultado) {
            header("Location: listarProdutos.php?incluirSucesso=1");
        } else {
            header("Location: listarProdutos.php?incluirErro=1");
        }

    } else {
        $sql = "UPDATE Produto
        SET Nome = '$nome', Preco = '$preco', CodCardapio = '$id_cardapio'
        WHERE CodProduto = '$id'";
        
        $resultado = mysqli_query($conn, $sql);

        if ($resultado) {
            header("Location: listarProdutos.php?atualizarSucesso=1");
        } else {
            header("Location: listarProdutos.php?atualizarErro=1");
        }
    }
?>