<?php
    include 'includes/conectarBD.php';

    $id = "";
    $descricao = "";

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM StatusPedido WHERE CodStatusPedido = $id";

        $resultado = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($resultado);

        $id = $row['CodStatusPedido'];
        $descricao = $row['Descricao'];
    }

    include 'includes/menu.php';
?>

    <header id="header-cadastro">
        <h1>Cadastro de status</h1>
    </header>
    
    <section id="tela-gerenciamento">
        <?php include 'includes/sidebar.php' ?>

        <article>
            <form action="receberStatusPedido.php" method="post" autocomplete="off">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <label for="descricao">Descrição</label>
                <input type="text" name="descricao" value="<?php echo $descricao; ?>" required>
                <button type="submit">Enviar</button>
            </form>
        </article>
    </section>

    <?php include 'includes/rodape.php';?>