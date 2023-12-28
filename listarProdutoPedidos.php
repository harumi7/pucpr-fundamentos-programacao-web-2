<?php include 'includes/menu.php'; ?>

<header id="header-cadastro">
    <h1>Cadastro de produtos pedidos</h1>
</header>

<section id="tela-gerenciamento">
    <?php include 'includes/sidebar.php' ?>

    <article>
        <table>
            <tr>
                <th>ID_Produto</th>
                <th>ID_Pedido</th>
                <th>Quantidade</th>
                <th></th>
                <th></th>
            </tr>
            <?php
                include 'includes/conectarBD.php';

                $sql = "SELECT * FROM Produto_has_Pedido";

                $resultado = mysqli_query($conn, $sql);

                if ($resultado) {
                    while ($row = mysqli_fetch_assoc($resultado)) {
                        echo "<tr>
                                <td>" . $row['CodProduto'] . "</td>
                                <td>" . $row['CodPedido'] . "</td>
                                <td>" . $row['Quantidade'] . "</td>
                                <td><a href='cadastrarProdutoPedido.php?produtoId=" . $row['CodProduto'] . "&pedidoId=" . $row['CodPedido'] . "'><i class='material-icons'>update</i></a></td>
                                <td><a href='excluirProdutoPedido.php?produtoId=" . $row['CodProduto'] . "&pedidoId=" . $row['CodPedido'] . "'><i class='material-icons'>delete</i></a></td>
                            </tr>";
                    }
                }
            ?>
        </table>
        <?php include 'includes/mensagem.php'; ?>

        <div class="botao-cadastrar"><a href="cadastrarProdutoPedido.php">Cadastrar novo produto pedido</a></div>
    </article>
</section>

<?php include 'includes/rodape.php';?>