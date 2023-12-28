<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <title>Sushimi - Login</title>
</head>
<body id="body-index">
    <style><?php include 'css/style.css'; ?></style>

    <div class="caixa">
        <div id="container">
            <header class="header-index">
                <h1 class="titulo-login">Sushimi - Login</h1>
            </header>
        
            <div id="form-index">
                <form action="login.php" method="post" autocomplete="off">
                    <label for="login">Login</label>
                    <input type="email" name="login" id="login" title="Insira o seu e-mail." required>
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" id="senha" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}" title="A senha deve ser de 6 a 20 caracteres, possuir pelo menos uma letra maiúscula, uma letra minúscula, um caractere especial e um número." required>

                    <div style="display: block;">
                        <input type="checkbox" name="checkbox" onclick="mostrarSenha()">
                        <label style="font-weight: normal;" for="checkbox">Mostrar senha</label>
                    </div>

                    <?php
                        if (isset($_GET["erro"])) {
                            echo "<p style='color: red; font-size: 14px;'>Usuário e/ou senha inválidos.</p>";
                        }
                        if (isset($_GET["autentica"])) {
                            echo "<p style='color: red; font-size: 14px;'>Você não tem permissão de acesso.</p>";
                        }
                    ?>

                    <button type="submit">Autenticar</button>
                </form>
            </div>
        </div>
    </div>
    <script src="js/script.js"></script>
</body>
</html>