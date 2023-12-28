<?php include 'includes/menu.php' ?>

<header id="header-cadastro">
    <h1>Cadastro de cardápios</h1>
</header>

<section id="tela-gerenciamento">
    <?php include 'includes/sidebar.php' ?>
    
    <article>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th></th>
                <th></th>
            </tr>
            <?php
                include 'includes/conectarBD.php';
    
                $sql = "SELECT * FROM Cardapio";
    
                $resultado = mysqli_query($conn, $sql);
    
                if ($resultado) {
                    while ($row = mysqli_fetch_assoc($resultado)) {
                        echo "<tr>
                                <td>" . $row['CodCardapio'] . "</td>
                                <td>" . $row['Nome'] . "</td>
                                <td>" . $row['Descricao'] . "</td>
                                <td><a href='cadastrarCardapio.php?id=" . $row['CodCardapio'] . "'><i class='material-icons'>update</i></a></td>
                                <td><a href='excluirCardapio.php?id=" . $row['CodCardapio'] . "'><i class='material-icons'>delete</i></a></td>
                            </tr>";
                    }
                }
            ?>
        </table>
        <?php include 'includes/mensagem.php'; ?>

        <div class="botao-cadastrar"><a href="cadastrarCardapio.php">Cadastrar novo cardápio</a></div>
    </article>
</section>

<?php include 'includes/rodape.php';?>