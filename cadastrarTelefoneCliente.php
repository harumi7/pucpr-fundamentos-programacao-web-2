<?php
    include 'includes/conectarBD.php';

    $numero = "";
    $id_cliente = "";

    if (isset($_GET['numero'])) {
        $numero = $_GET['numero'];

        $sql = "SELECT * FROM TelefoneCliente WHERE Numero = $numero";

        $resultado = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($resultado);

        $numero = $row['Numero'];
        $id_cliente = $row['CodCliente'];
    }

    include 'includes/menu.php';
?>

    <header id="header-cadastro">
        <h1>Cadastro de telefones</h1>
    </header>
    
    <section id="tela-gerenciamento">
        <?php include 'includes/sidebar.php' ?>

        <article>
            <form action="receberTelefoneCliente.php" method="post" autocomplete="off">
                <label for="numero">Número</label>
                <input type="text" name="numero" value="<?php echo $numero; ?>" required>
                <label for="id_cliente">Código do cliente</label>
                <select name="id_cliente" required>
                    <option selected="true" disabled>Selecione</option>
                    <?php
                        $sql = "SELECT * FROM Cliente";
                        $resultado = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($resultado)) {
                            echo "<option ";
                            if ($id_cliente == $row['CodCliente']) {
                                echo "selected ";
                            }
                            echo "value='" . $row['CodCliente'] . "'>" . $row['CodCliente'] . "</option>";
                        }
                    ?>
                </select>
                <button type="submit">Enviar</button>
            </form>
        </article>
    </section>

    <?php include 'includes/rodape.php';?>