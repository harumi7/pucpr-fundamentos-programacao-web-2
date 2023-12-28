<?php
    include 'includes/conectarBD.php';
    
    $id_produto = "";
    $id_pedido = "";
    $quantidade = "";

    if (isset($_GET['produtoId']) && isset($_GET['pedidoId'])) {
        $id_produto = $_GET['produtoId'];
        $id_pedido = $_GET['pedidoId'];

        $sql = "SELECT * FROM Produto_has_Pedido WHERE CodPedido = $id_pedido AND CodProduto = $id_produto";

        $resultado = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($resultado);

        $id_produto = $row['CodProduto'];
        $id_pedido = $row['CodPedido'];
        $quantidade = $row['Quantidade'];
    }

    include 'includes/menu.php';
?>

    <header id="header-cadastro">
        <h1>Cadastro de produtos pedidos</h1>
    </header>
    
    <section id="tela-gerenciamento">
        <?php include 'includes/sidebar.php' ?>

        <article>
            <form action="receberProdutoPedido.php" method="post" autocomplete="off">
                <label for="id_produto">Código do produto</label>
                <select name="id_produto" required>
                    <option selected="true" disabled>Selecione</option>
                    <?php
                        $sql = "SELECT * FROM Produto";
                        $resultado = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($resultado)) {
                            echo "<option ";
                            if ($id_produto == $row['CodProduto']) {
                                echo "selected ";
                            }
                            echo "value='" . $row['CodProduto'] . "'>" . $row['CodProduto'] . "</option>";
                        }
                    ?>
                </select>
                <label for="id_pedido">Código do pedido</label>
                <select name="id_pedido" required>
                    <option selected="true" disabled>Selecione</option>
                    <?php
                        $sql = "SELECT * FROM Pedido";
                        $resultado = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($resultado)) {
                            echo "<option ";
                            if ($id_pedido == $row['CodPedido']) {
                                echo "selected ";
                            }
                            echo "value='" . $row['CodPedido'] . "'>" . $row['CodPedido'] . "</option>";
                        }
                    ?>
                </select>
                <label for="quantidade">Quantidade</label>
                <input type="text" name="quantidade" value="<?php echo $quantidade; ?>" required>
                <button type="submit">Enviar</button>
            </form>
        </article>
    </section>

    <?php include 'includes/rodape.php';?>