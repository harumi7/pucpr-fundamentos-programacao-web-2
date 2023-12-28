<?php 
    $conn = mysqli_connect("localhost", "root", "", "Sushimi");

    if ($conn == false) {
        die("ERRO: Não foi possível conectar ao banco de dados.");
    }
?>