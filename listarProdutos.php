<?php include 'includes/menu.php'; ?>

<header id="header-cadastro">
    <h1>Cadastro de produtos</h1>
</header>

<section id="tela-gerenciamento">
    <?php include 'includes/sidebar.php' ?>

    <article>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>ID_Cardápio</th>
                <th></th>
                <th></th>
            </tr>
            <?php
                include 'includes/conectarBD.php';

                $sql = "SELECT * FROM Produto";

                $resultado = mysqli_query($conn, $sql);

                if ($resultado) {
                    while ($row = mysqli_fetch_assoc($resultado)) {
                        echo "<tr>
                                <td>" . $row['CodProduto'] . "</td>
                                <td>" . $row['Nome'] . "</td>
                                <td>" . $row['Preco'] . "</td>
                                <td>" . $row['CodCardapio'] . "</td>
                                <td><a href='cadastrarProduto.php?id=" . $row['CodProduto'] . "'><i class='material-icons'>update</i></a></td>
                                <td><a href='excluirProduto.php?id=" . $row['CodProduto'] . "'><i class='material-icons'>delete</i></a></td>
                            </tr>";
                    }
                }
            ?>
        </table>
        <?php include 'includes/mensagem.php'; ?>

        <div class="botao-cadastrar"><a href="cadastrarProduto.php">Cadastrar novo produto</a></div>
    </article>
</section>

<?php include 'includes/rodape.php';?>