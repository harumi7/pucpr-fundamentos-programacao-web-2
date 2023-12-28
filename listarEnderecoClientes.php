<?php include 'includes/menu.php'; ?>

<header id="header-cadastro">
    <h1>Cadastro de endereços</h1>
</header>

<section id="tela-gerenciamento">
    <?php include 'includes/sidebar.php' ?>

    <article>
        <table>
            <tr>
                <th>ID</th>
                <th>CEP</th>
                <th>Municipio</th>
                <th></th>
                <th></th>
            </tr>
            <?php
                include 'includes/conectarBD.php';

                $sql = "SELECT * FROM EnderecoCliente";

                $resultado = mysqli_query($conn, $sql);

                if ($resultado) {
                    while ($row = mysqli_fetch_assoc($resultado)) {
                        echo "<tr>
                                <td>" . $row['CodEnderecoCliente'] . "</td>
                                <td>" . $row['CEP'] . "</td>
                                <td>" . $row['Municipio'] . "</td>
                                <td><a href='cadastrarEnderecoCliente.php?id=" . $row['CodEnderecoCliente'] . "'><i class='material-icons'>update</i></a></td>
                                <td><a href='excluirEnderecoCliente.php?id=" . $row['CodEnderecoCliente'] . "'><i class='material-icons'>delete</i></a></td>
                            </tr>";
                    }
                }
            ?>
        </table>
        <?php include 'includes/mensagem.php'; ?>

        <div class="botao-cadastrar"><a href="cadastrarEnderecoCliente.php">Cadastrar novo endereço</a></div>
    </article>
</section>

<?php include 'includes/rodape.php';?>