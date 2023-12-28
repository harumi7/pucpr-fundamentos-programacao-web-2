<?php include 'includes/menu.php'; ?>

<header id="header-cadastro">
    <h1>Cadastro de pedidos</h1>
</header>

<section id="tela-gerenciamento">
    <?php include 'includes/sidebar.php' ?>

    <article>
        <table>
            <tr>
                <th>ID</th>
                <th>Data de emissão</th>
                <th>Observação</th>
                <th>ID_StatusPedido</th>
                <th>ID_Cliente</th>
                <th></th>
                <th></th>
            </tr>
            <?php
                include 'includes/conectarBD.php';

                $sql = "SELECT * FROM Pedido";

                $resultado = mysqli_query($conn, $sql);

                if ($resultado) {
                    while ($row = mysqli_fetch_assoc($resultado)) {
                        echo "<tr>
                                <td>" . $row['CodPedido'] . "</td>
                                <td>" . $row['DataEmissao'] . "</td>
                                <td>" . $row['Observacao'] . "</td>
                                <td>" . $row['CodStatusPedido'] . "</td>
                                <td>" . $row['CodCliente'] . "</td>
                                <td><a href='cadastrarPedido.php?id=" . $row['CodPedido'] . "'><i class='material-icons'>update</i></a></td>
                                <td><a href='excluirPedido.php?id=" . $row['CodPedido'] . "'><i class='material-icons'>delete</i></a></td>
                            </tr>";
                    }
                }
            ?>
        </table>
        <?php include 'includes/mensagem.php'; ?>

        <div class="botao-cadastrar"><a href="cadastrarPedido.php">Cadastrar novo pedido</a></div>
    </article>
</section>

<?php include 'includes/rodape.php';?>