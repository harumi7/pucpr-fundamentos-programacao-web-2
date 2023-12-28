<?php
    if (isset($_GET["excluirErro"])) {
        echo "<p style='color:red; font-size: 14px;'>Erro: ID da linha a ser excluída está associada à outra informação.</p>";
    }

    else if (isset($_GET["excluirSucesso"])) {
        echo "<p style='color:green; font-size: 14px;'>Informação excluída com sucesso!</p>";
    }

    else if (isset($_GET["incluirSucesso"])) {
        echo "<p style='color:green; font-size: 14px;'>Informação cadastrada com sucesso!</p>";
    }

    else if (isset($_GET["incluirErro"])) {
        echo "<p style='color:red; font-size: 14px;'>Erro: Não foi possível incluir a informação.</p>";
    }

    else if (isset($_GET["atualizarSucesso"])) {
        echo "<p style='color:green; font-size: 14px;'>Informação atualizada com sucesso!</p>";
    }

    else if (isset($_GET["atualizarErro"])) {
        echo "<p style='color:red; font-size: 14px;'>Erro: Não foi possível atualizar a informação.</p>";
    }
?>