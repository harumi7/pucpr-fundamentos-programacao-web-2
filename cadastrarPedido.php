<?php
    include 'includes/conectarBD.php';

    $id = "";
    $data_emissao = "";
    $observacao = "";
    $id_status_pedido = "";
    $id_cliente = "";

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM Pedido WHERE CodPedido = $id";

        $resultado = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($resultado);

        $id = $row['CodPedido'];
        $data_emissao = $row['DataEmissao'];
        $observacao = $row['Observacao'];
        $id_status_pedido = $row['CodStatusPedido'];
        $id_cliente = $row['CodCliente'];
    }

    include 'includes/menu.php';
?>

    <header id="header-cadastro">
        <h1>Cadastro de pedidos</h1>
    </header>
    
    <section id="tela-gerenciamento">
        <?php include 'includes/sidebar.php' ?>

        <article>
            <form action="receberPedido.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <label for="data_emissao">Data de emissão</label>
                <input type="text" name="data_emissao" value="<?php echo $data_emissao; ?>" required>
                <label for="observacao">Observação</label>
                <input type="text" name="observacao" value="<?php echo $observacao; ?>" required>
                <label for="id_status_pedido">Status</label>
                <select name="id_status_pedido" required>
                    <option selected="true" disabled>Selecione</option>
                    <?php
                        $sql = "SELECT * FROM StatusPedido";
                        $resultado = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($resultado)) {
                            echo "<option ";
                            if ($id_status_pedido == $row['CodStatusPedido']) {
                                echo "selected ";
                            }
                            echo "value='" . $row['CodStatusPedido'] . "'>" . $row['CodStatusPedido'] . "</option>";
                        }
                    ?>
                </select>

                <label for="id_status_pedido">Código do cliente</label>
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