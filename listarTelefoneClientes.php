<?php include 'includes/menu.php'; ?>

<header id="header-cadastro">
    <h1>Cadastro de telefones</h1>
</header>

<section id="tela-gerenciamento">
    <?php include 'includes/sidebar.php' ?>

    <article>
        <table>
            <tr>
                <th>Número</th>
                <th>ID_TelefoneCliente</th>
                <th></th>
                <th></th>
            </tr>
            <?php
                include 'includes/conectarBD.php';

                $sql = "SELECT * FROM TelefoneCliente";

                $resultado = mysqli_query($conn, $sql);

                if ($resultado) {
                    while ($row = mysqli_fetch_assoc($resultado)) {
                        echo "<tr>
                                <td>" . $row['Numero'] . "</td>
                                <td>" . $row['CodCliente'] . "</td>
                                <td><a href='cadastrarTelefoneCliente.php?numero=" . $row['Numero'] . "&id=" . $row['CodCliente'] ."'><i class='material-icons'>update</i></a></td>
                                <td><a href='excluirTelefoneCliente.php?numero=" . $row['Numero'] . "&id=" . $row['CodCliente'] ."'><i class='material-icons'>delete</i></a></td>
                            </tr>";
                    }
                }
            ?>
        </table>
        <?php include 'includes/mensagem.php'; ?>

        <div class="botao-cadastrar"><a href="cadastrarTelefoneCliente.php">Cadastrar novo telefone</a></div>
    </article>
</section>

<?php include 'includes/rodape.php';?>