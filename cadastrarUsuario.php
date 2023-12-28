<?php
    include 'includes/conectarBD.php';

    $id = "";
    $nome = "";
    $email = "";
    $senha = "";

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM Usuario WHERE CodUsuario = $id";

        $resultado = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($resultado);

        $id = $row['CodUsuario'];
        $nome = $row['Nome'];
        $email = $row['Email'];
        $senha = $row['Senha'];
    }

    include 'includes/menu.php';
?>

    <header id="header-cadastro">
        <h1>Cadastro de usuários</h1>
    </header>
    
    <section id="tela-gerenciamento">
        <?php include 'includes/sidebar.php' ?>

        <article>
            <form action="receberUsuario.php" method="post" autocomplete="off">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <label for="nome">Nome</label>
                <input type="text" name="nome" value="<?php echo $nome; ?>" required>
                <label for="email">E-mail</label>
                <input type="email" name="email" value="<?php echo $email; ?>" required>
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha" value="<?php echo $senha; ?>" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}" required>

                <div style="display: block;">
                    <input type="checkbox" name="checkbox" onclick="mostrarSenha()">
                    <label style="font-weight: normal;" for="checkbox">Mostrar senha</label>
                </div>

                <button type="submit">Enviar</button>
            </form>
        </article>
    </section>
    <script src="js/script.js"></script>

    <?php include 'includes/rodape.php';?>