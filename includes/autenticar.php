<?php
    // (Re)iniciar sessão
    session_start();

    // Se não foi criada uma sessão autenticada
    if (!isset($_SESSION['id'])) {
        header("Location: index.php?autentica=1");
    }
?>