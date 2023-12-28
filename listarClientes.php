<?php include 'includes/menu.php'; ?>

<header id="header-cadastro">
    <h1>Cadastro de clientes</h1>
</header>

<section id="tela-gerenciamento">
    <?php include 'includes/sidebar.php' ?>

    <article>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Logradouro</th>
                <th>Número</th>
                <th>Complemento</th>
                <th>ID_EnderecoCliente</th>
                <th></th>
                <th></th>
            </tr>
            <?php
                include 'includes/conectarBD.php';
        
                $sql = "SELECT * FROM Cliente";
        
                $resultado = mysqli_query($conn, $sql);
        
                if ($resultado) {
                    while ($row = mysqli_fetch_assoc($resultado)) {
                        echo "<tr>
                                <td>" . $row['CodCliente'] . "</td>
                                <td>" . $row['Nome'] . "</td>
                                <td>" . $row['Logradouro'] . "</td>
                                <td>" . $row['NumeroEndereco'] . "</td>
                                <td>" . $row['ComplementoEndereco'] . "</td>
                                <td>" . $row['CodEnderecoCliente'] . "</td>
                                <td><a href='cadastrarCliente.php?id=" . $row['CodCliente'] . "'><i class='material-icons'>update</i></a></td>
                                <td><a href='excluirCliente.php?id=" . $row['CodCliente'] . "'><i class='material-icons'>delete</i></a></td>
                            </tr>";
                    }
                }
            ?>
        </table>
        <?php include 'includes/mensagem.php'; ?>

        <div class="botao-cadastrar"><a href="cadastrarCliente.php">Cadastrar novo cliente</a></div>
    </article>
</section>

<?php include 'includes/rodape.php';?>