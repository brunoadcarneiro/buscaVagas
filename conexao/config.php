<?php
    $servidor = "localhost"; //caminho do banco de dados
    $dbname = "portalgrau"; // nome do banco de dados
    $dbusuario = "root"; //usuario do banco de dados
    $dbsenha = ""; //senha do usario no banco de dados 
    $conn = mysqli_connect($servidor, $dbusuario, $dbsenha, $dbname); 

    if (!$conn) {
        die ("Conexão fahou: " . mysqli_connect());
    }
    ?>