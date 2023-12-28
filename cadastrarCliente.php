<?php
    include 'includes/conectarBD.php';

    $id = "";
    $nome = "";
    $numero_endereco = "";
    $logradouro = "";
    $complemento_endereco = "";
    $id_endereco_cliente = "";

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM Cliente WHERE CodCliente = $id";

        $resultado = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($resultado);

        $id = $row['CodCliente'];
        $nome = $row['Nome'];
        $numero_endereco = $row['NumeroEndereco'];
        $logradouro = $row['Logradouro'];
        $complemento_endereco = $row['ComplementoEndereco'];
        $id_endereco_cliente = $row['CodEnderecoCliente'];
    }

    include 'includes/menu.php';
?>

    <header id="header-cadastro">
        <h1>Cadastro de clientes</h1>
    </header>
    
    <section id="tela-gerenciamento">
        <?php include 'includes/sidebar.php' ?>

        <article>
            <form action="receberCliente.php" method="post" autocomplete="off">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <label for="nome">Nome</label>
                <input type="text" name="nome" value="<?php echo $nome; ?>" required>
                <label for="logradouro">Logradouro</label>
                <input type="text" name="logradouro" value="<?php echo $logradouro; ?>" required>
                <label for="numero_endereco">Número</label>
                <input type="text" name="numero_endereco" value="<?php echo $numero_endereco; ?>" required>
                <label for="complemento_endereco">Complemento</label>
                <input type="text" name="complemento_endereco" value="<?php echo $complemento_endereco; ?>" required>
                <label for="id_endereco_cliente">Código do endereço</label>
                <select name="id_endereco_cliente" required>
                    <option selected="true" disabled>Selecione</option>
                    <?php
                        $sql = "SELECT * FROM EnderecoCliente";
                        $resultado = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($resultado)) {
                            echo "<option ";
                            if ($id_endereco_cliente == $row['CodEnderecoCliente']) {
                                echo "selected ";
                            }
                            echo "value='" . $row['CodEnderecoCliente'] . "'>" . $row['CodEnderecoCliente'] . "</option>";
                        }
                    ?>
                </select>
                <button type="submit">Enviar</button>
            </form>
        </article>
    </section>

    <?php include 'includes/rodape.php';?>