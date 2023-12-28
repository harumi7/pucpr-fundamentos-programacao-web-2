<?php include 'includes/menu.php'; ?>

<header id="header-cadastro">
    <h1>Cadastro de status</h1>
</header>

<section id="tela-gerenciamento">
    <?php include 'includes/sidebar.php' ?>

    <article>
        <table>
            <tr>
                <th>ID</th>
                <th>Descrição</th>
                <th></th>
                <th></th>
            </tr>
            <?php
                include 'includes/conectarBD.php';

                $sql = "SELECT * FROM StatusPedido";

                $resultado = mysqli_query($conn, $sql);

                if ($resultado) {
                    while ($row = mysqli_fetch_assoc($resultado)) {
                        echo "<tr>
                                <td>" . $row['CodStatusPedido'] . "</td>
                                <td>" . $row['Descricao'] . "</td>
                                <td><a href='cadastrarStatusPedido.php?id=" . $row['CodStatusPedido'] . "'><i class='material-icons'>update</i></a></td>
                                <td><a href='excluirStatusPedido.php?id=" . $row['CodStatusPedido'] . "'><i class='material-icons'>delete</i></a></td>
                            </tr>";
                    }
                }
            ?>
        </table>
        <?php include 'includes/mensagem.php'; ?>

        <div class="botao-cadastrar"><a href="cadastrarStatusPedido.php">Cadastrar novo status</a></div>
    </article>
</section>

<?php include 'includes/rodape.php';?>