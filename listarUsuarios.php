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
                <th>Email</th>
                <th>Senha</th>
                <th></th>
                <th></th>
            </tr>
            <?php
                include 'includes/conectarBD.php';

                $sql = "SELECT * FROM Usuario";

                $resultado = mysqli_query($conn, $sql);

                if ($resultado) {
                    while ($row = mysqli_fetch_assoc($resultado)) {
                        echo "<tr>
                                <td>" . $row['CodUsuario'] . "</td>
                                <td>" . $row['Nome'] . "</td>
                                <td>" . $row['Email'] . "</td>
                                <td>" . $row['Senha'] . "</td>
                                <td><a href='cadastrarUsuario.php?id=" . $row['CodUsuario'] . "'><i class='material-icons'>update</i></a></td>
                                <td><a href='excluirUsuario.php?id=" . $row['CodUsuario'] . "'><i class='material-icons'>delete</i></a></td>
                            </tr>";
                    }
                }
            ?>
        </table>
        <?php include 'includes/mensagem.php'; ?>

        <div class="botao-cadastrar"><a href="cadastrarUsuario.php">Cadastrar novo usuário</a></div>
    </article>
</section>

<?php include 'includes/rodape.php';?>