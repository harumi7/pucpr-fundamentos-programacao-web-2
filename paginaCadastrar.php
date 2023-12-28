<?php
    include 'includes/conectarBD.php';

    $id = "";
    $nome = "";
    $numero_endereco = "";
    $logradouro = "";
    $complemento_endereco = "";
    $id_endereco_cliente = "";

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM Produto WHERE CodProduto = $id";

        $resultado = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($resultado);

        $id = $row['CodCliente'];
        $nome = $row['Nome'];
        $numero_endereco = $row['NumeroEndereco'];
        $logradouro = $row['Logradouro'];
        $complemento_endereco = $row['ComplementoEndereco'];
        $id_endereco_cliente = $row['CodEnderecoCliente'];
    }

    include 'includes/menu.php';
?>

    <header id="header-cadastro">
        <h1>Sushimi - Cadastrar</h1>
    </header>
    
    <section id="tela-gerenciamento">
        <?php include 'includes/sidebar.php' ?>

        <article>
            <h2>Tela de gerenciamento</h2>
            <p>Aqui, você pode incluir, listar, atualizar e deletar as informações do seu negócio. Em breve, novas implementações serão adicionadas para tornar a sua experiência melhor.</p>
        </article>
    </section id="tela-gerenciamento">

    <?php include 'includes/rodape.php';?>