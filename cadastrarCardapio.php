<?php
    include 'includes/conectarBD.php';

    $id = "";
    $nome = "";
    $descricao = "";

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM Cardapio WHERE CodCardapio = $id";

        $resultado = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($resultado);

        $id = $row['CodCardapio'];
        $nome = $row['Nome'];
        $descricao = $row['Descricao'];
    }

    include 'includes/menu.php';
?>

    <header id="header-cadastro">
        <h1>Cadastro de cardápios</h1>
    </header>
    
    <section id="tela-gerenciamento">
        <?php include 'includes/sidebar.php' ?>

        <article>
            <form action="receberCardapio.php" method="post" autocomplete="off">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <label for="nome">Nome</label>
                <input type="text" name="nome" value="<?php echo $nome; ?>" required>
                <label for="descricao">Descrição</label>
                <textarea name="descricao" value="<?php echo $descricao; ?>" rows="3" required></textarea>

                <button type="submit">Enviar</button>
            </form>
        </article>
    </section>

    <?php include 'includes/rodape.php';?>