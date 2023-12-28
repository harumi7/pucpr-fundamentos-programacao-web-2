<?php
    include 'includes/conectarBD.php';

    $id = "";
    $nome = "";
    $preco = "";
    $id_cardapio = "";

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM Produto WHERE CodProduto = $id";

        $resultado = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($resultado);

        $id = $row['CodProduto'];
        $nome = $row['Nome'];
        $preco = $row['Preco'];
        $id_cardapio = $row['CodCardapio'];
    }

    include 'includes/menu.php';
?>

    <header id="header-cadastro">
        <h1>Cadastro de produtos</h1>
    </header>
    
    <section id="tela-gerenciamento">
        <?php include 'includes/sidebar.php' ?>

        <article>
            <form action="receberProduto.php" method="post" autocomplete="off">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <label for="nome">Nome</label>
                <input type="text" name="nome" value="<?php echo $nome; ?>" required>
                <label for="descricao">Preço</label>
                <input type="text" name="preco" value="<?php echo $preco; ?>" required>
                <label for="cardapio">Código do cardápio</label>
                <select name="id_cardapio" required>
                    <option selected="true" disabled>Selecione</option>
                    <?php
                        $sql = "SELECT * FROM Cardapio";
                        $resultado = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($resultado)) {
                            echo "<option ";
                            if ($id_cardapio == $row['CodCardapio']) {
                                echo "selected ";
                            }
                            echo "value='" . $row['CodCardapio'] . "'>" . $row['CodCardapio'] . "</option>";
                        }
                    ?>
                </select>
                <button type="submit">Enviar</button>
            </form>
        </article>
    </section>

    <?php include 'includes/rodape.php';?>