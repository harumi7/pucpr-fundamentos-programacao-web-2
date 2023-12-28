<?php
    include 'includes/conectarBD.php';

    $id = "";
    $cep = "";
    $municipio = "";

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM EnderecoCliente WHERE CodEnderecoCliente = $id";

        $resultado = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($resultado);

        $id = $row['CodEnderecoCliente'];
        $cep = $row['CEP'];
        $municipio = $row['Municipio'];
    }

    include 'includes/menu.php';
?>

    <header id="header-cadastro">
        <h1>Cadastro de endereços</h1>
    </header>

    <section id="tela-gerenciamento">
        <?php include 'includes/sidebar.php' ?>

        <article>
            <form action="receberEnderecoCliente.php" method="post" autocomplete="off">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <label for="cep">CEP</label>
                <input type="text" name="cep" value="<?php echo $cep; ?>" required>
                <label for="municipio">Município</label>
                <input type="text" name="municipio" value="<?php echo $municipio; ?>" required>
                <button type="submit">Enviar</button>
            </form>
        </article>
    </section>

    <?php include 'includes/rodape.php';?>