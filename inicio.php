<?php
	require "includes/autenticar.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <title>Sushimi - Início</title>
</head>
<body>
    <style><?php include 'css/style.css';?></style>

    <header id="header-geral">
        <nav>
            <a href="inicio.php"><img id="sushimi-logo" src="images/sushimi-logo.png" alt="sushimi logo"></a>
            <ul>
                <li><a class="header-pagina" href="inicio.php">Início</a></li>
                <li><a class="header-pagina" href="paginaCadastrar.php">Cadastrar</a></li>
                <li class="header-pagina" id="logout"><a href="logout.php">Sair</a></li>
            </ul>
        </nav>

        <div class="imagem-logo">
        </div>
    </header>

    <section id="principal">
        <?php echo "<h1>Olá, <span style='font-weight: bold';>" . $_SESSION['nome'] . "</span></h1>"; ?>
        <p class="mensagem-principal">Bem-vindo(a) ao sistema de gerenciamento do Sushimi!</p>
        <div id="caixa-principal">Sushimi - Sistema de gerenciamento</div>
        <p class="texto-principal">Nesse sistema, todas as informações relacionadas ao Sushimi são cadastradas. O acesso é restrito apenas aos responsáveis pelo negócio.<br>Em caso de dúvidas, por favor entre em contato com a desenvolvedora do sistema.</p>
    </section>

    <section id="atualizacoes">
        <h1>Atualizações</h1>
        <h2 style="text-align: justify;">Últimas atualizações</h2>
        <ul style="text-align: justify;">
            <li>26/11/2023 - Modificado o layout da sidebar da tela de gerenciamento.</li>
        </ul>

        <h2 style="text-align: justify;">Próximas atualizações</h2>
        <ul style="text-align: justify;">
            <li>Caixa de confirmação para excluir informação.</li>
            <li>Modificar a criptografia de senha para password_hash.</li>
            <li>Modificar "Data de emissão", da tabela de Pedidos, para formato brasileiro.</li>
            <li>Implementação para facilitar a identificação a que informação se refere o ID da chave estrangeira.</li>
            <li>Correção de bugs identificados:
                <ul style="padding-left: 20px;">
                    <li>Botão de cadastrar nova informação desformatado.</li>
                    <li>Ao atualizar determinada informação em "Cadastro de produtos pedidos", as informações antigas não são preenchidas automaticamente em seus respectivos campos.</li>
                </ul>
            </li>
        </ul>
    </section>
</body>
</html>

<?php include 'includes/rodape.php'; ?>