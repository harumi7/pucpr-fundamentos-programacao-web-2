<?php
$login = $_POST["login"];
$senha = $_POST["senha"];

include "includes/conectarBD.php";

$sql = "SELECT * FROM Usuario
        WHERE Email = '$login' AND Senha = md5('$senha')";

$resultado = mysqli_query($conn, $sql);

$quantidadeRegistros = mysqli_num_rows($resultado);

if ($quantidadeRegistros > 0) {
    session_start();

    $row = mysqli_fetch_assoc($resultado);

    $_SESSION['id'] = $row['CodUsuario'];
    $_SESSION['nome'] = $row['Nome'];

    header("Location: inicio.php");
} else {
    header("Location: index.php?erro=1");
}
?>